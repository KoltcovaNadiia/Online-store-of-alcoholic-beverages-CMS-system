<?php

namespace core;

use controllers\MainController;
use models\Category;
use Core\DB;

class Core
{
    private static $instance = null;
    public $app;
    public $pageParams;
    public $db;
    public $requestMethod;
    private function __construct()
    {
        global $pageParams;
        $this->app = [];
        $this->pageParams = $pageParams;
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function Initialize()
    {
        session_start();
        $this->db = new DB(DATABASE_HOST, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE_BASENAME);
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function Run()
    {
        if(isset($_GET['route']))
            $route = $_GET['route'];
        else
            $route = '';
        $routeParts = explode('/', $route);
        $moduleName = strtolower(array_shift($routeParts));
        $actionName = strtolower(array_shift($routeParts));
        if (empty($moduleName))
            $moduleName = "main";
        if (empty($actionName))
            $actionName = "index";
        $this->app['moduleName'] = $moduleName;
        $this->app['actionName'] = $actionName;
        $controllerName = '\\controllers\\' . ucfirst($moduleName) . 'Controller';
        $controllerActionName = $actionName . 'Action';
        $statusCode = 200;
        if (class_exists($controllerName)) {
            $controller = new $controllerName();

            if (method_exists($controller, $controllerActionName)) {
                $actionResult = $controller->$controllerActionName($routeParts);
                if ($actionResult instanceof Error)
                    $statusCode = $actionResult->code;
                $this->pageParams['content'] = $actionResult;
            } else {
                $statusCode = 404;
            }
        } else {
            $statusCode = 404;
        }
        $statusCodeType = intval($statusCode / 100);
        if ($statusCodeType == 4 || $statusCodeType == 5) {
            $mainController = new MainController();
            $this->pageParams['content'] = $mainController->errorAction($statusCode);
        }

        $this->pageParams['categories'] = Category::getCategories();
        $this->pageParams['cart'] = $_SESSION['cart'];
    }

    public function Done()
    {
        $pathToLayout = 'public/layout.php';
        $tpl = new Template($pathToLayout);
        $tpl->setParams($this->pageParams);
        $html = $tpl->getHTML();
        echo $html;
    }
}