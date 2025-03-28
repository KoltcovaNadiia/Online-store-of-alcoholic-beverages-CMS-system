<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Address;
use models\Cart;
use models\Order;
use models\User;

class CartController extends Controller
{
    public function indexAction($params)
    {
        // Обробка видалення товару
        if (isset($params[0]) && $params[0] === 'remove' && isset($params[1])) {
            $id = intval($params[1]);
            Cart::deleteProduct($id); // Видаляємо товар
            return $this->redirect('/cart'); // Повернення до сторінки кошика
        }

        // Отримуємо дані кошика
        $cart = Cart::getProductsInCart();

        // Обробка зміни кількості товарів
        if (Core::getInstance()->requestMethod === 'POST') {
            Cart::changeProductsCount();
            return $this->redirect('/cart/information');
        }

        // Відображення кошика
        return $this->render(null, ['cart' => $cart]);
    }

    public function informationAction()
    {
        $cart = Cart::getProductsInCart();
        if (empty($cart)) {
            return $this->redirect('/cart');
        }

        $address = Address::getAddress();
        if (User::isUserAuthenticated()) {
            $user = User::getCurrentAuthenticatedUser();
            $id = $user['id'];
            if (empty($address)) {
                $address = Address::getAddressByUserId($id);
            }

            if (Core::getInstance()->requestMethod === 'POST') {
                $errors = [];
                $_POST['firstname'] = trim($_POST['firstname']);
                $_POST['lastname'] = trim($_POST['lastname']);

                // Валідація
                if (empty($_POST['firstname'])) $errors['firstname'] = 'This field cannot be empty';
                if (empty($_POST['lastname'])) $errors['lastname'] = 'This field cannot be empty';
                if (empty($_POST['login']) || !filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
                    $errors['login'] = 'Invalid email';
                }
                if (empty($_POST['address'])) $errors['address'] = 'Please enter your shipping address';
                if (empty($_POST['country'])) $errors['country'] = 'This field cannot be empty';
                if (empty($_POST['city'])) $errors['city'] = 'This field cannot be empty';
                if (empty($_POST['zip'])) $errors['zip'] = 'Postal code required';
                if ($_COOKIE['shipment'] != '15' && $_COOKIE['shipment'] != '25') {
                    $errors['shipment'] = 'Invalid shipping value';
                }

                // Якщо є помилки, повертаємо форму
                if (!empty($errors)) {
                    $model = $_POST;
                    return $this->render(null, [
                        'errors' => $errors,
                        'user' => $user,
                        'model' => $model,
                        'cart' => $cart,
                        'address' => $address
                    ]);
                } else {
                    Address::setAddress($_POST);
                    if ($_POST['save_info'] == 'on') {
                        if ($address != null) {
                            Address::updateAddress($user['id'], $_POST);
                        } else {
                            Address::addAddress($_POST, $user['id']);
                        }
                    }
                    $email = $user['login'];
                    $address = Address::getAddress();
                    $totalPrice = $cart['total_price'] + $_COOKIE['shipment'];
                    $shipment = $_COOKIE['shipment'];
                    $products = $cart['products'];
                    $comment = empty($_COOKIE['comment']) ? null : $_COOKIE['comment'];

                    $_SESSION['order_id'] = Order::makeOrder($email, $totalPrice, $products, $address, $shipment, $comment, $id);
                    return $this->redirect('/cart/success');
                }
            }
            return $this->render(null, ['user' => $user, 'address' => $address, 'cart' => $cart]);
        }
        return $this->render(null, ['cart' => $cart]);
    }

    public function successAction()
    {
        $orderId = $_SESSION['order_id'];
        Cart::unsetSession();
        return $this->render(null, ['order_id' => $orderId]);
    }
}
