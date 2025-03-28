<?php

namespace models;

use core\Core;
use core\Utils;

class Product
{
    public static $tableName = 'product';

    /**
     * Додає новий продукт до бази даних.
     *
     * @param array $row Дані продукту
     * @param string|null $photoPath Шлях до фото продукту
     * @return void
     */
    public static function addProduct($row, $photoPath = null)
    {
        $fileName = null;

        // Обробка фото продукту
        if (!empty($photoPath)) {
            do {
                $fileName = uniqid() . '.jpg';
                $newPath = "files/product/{$fileName}";
            } while (file_exists($newPath));

            if (!move_uploaded_file($photoPath, $newPath)) {
                throw new \Exception("Помилка завантаження файлу.");
            }
        }

        // Фільтрація даних
        $fieldsList = ['name', 'category_id', 'price', 'count', 'short_description', 'description', 'visible'];
        $row = Utils::filterArray($row, $fieldsList);

        $row['photo'] = $fileName;

        // Вставка продукту в базу даних
        Core::getInstance()->db->insert(self::$tableName, $row);
    }

    /**
     * Видаляє продукт із бази даних та пов'язане фото.
     *
     * @param int $id Ідентифікатор продукту
     * @return void
     */
    public static function deleteProduct($id)
    {
        if (!self::getProductById($id)) {
            throw new \Exception("Продукт із ID {$id} не знайдено.");
        }

        self::deletePhotoFile($id);
        Core::getInstance()->db->delete(self::$tableName, [
            'id' => $id
        ]);
    }

    /**
     * Оновлює інформацію про продукт.
     *
     * @param int $id Ідентифікатор продукту
     * @param array $row Дані продукту
     * @param string|null $photoPath Шлях до нового фото
     * @return void
     */
    public static function updateProduct($id, $row, $photoPath = null)
    {
        if (!self::getProductById($id)) {
            throw new \Exception("Продукт із ID {$id} не знайдено.");
        }

        // Оновлення фото продукту
        if (!empty($photoPath)) {
            self::changePhoto($id, $photoPath);
        }

        // Фільтрація даних
        $fieldsList = ['name', 'category_id', 'price', 'count', 'short_description', 'description', 'visible'];
        $row = Utils::filterArray($row, $fieldsList);

        // Оновлення в базі даних
        Core::getInstance()->db->update(self::$tableName, $row, [
            'id' => $id
        ]);
    }

    /**
     * Отримує продукт за ID.
     *
     * @param int $id Ідентифікатор продукту
     * @return array|null
     */
    public static function getProductById($id)
    {
        $row = Core::getInstance()->db->select(self::$tableName, '*', [
            'id' => $id
        ]);

        return !empty($row) ? $row[0] : null;
    }

    /**
     * Отримує всі продукти у заданій категорії.
     *
     * @param int $category_id Ідентифікатор категорії
     * @return array
     */
    public static function getProductsInCategory($category_id)
    {
        return Core::getInstance()->db->select(self::$tableName, '*', [
            'category_id' => $category_id
        ]);
    }

    /**
     * Отримує всі продукти.
     *
     * @return array
     */
    public static function getProducts()
    {
        return Core::getInstance()->db->select(self::$tableName);
    }

    /**
     * Змінює фото продукту.
     *
     * @param int $id Ідентифікатор продукту
     * @param string $newPhoto Нове фото
     * @return void
     */
    public static function changePhoto($id, $newPhoto)
    {
        self::deletePhotoFile($id);

        do {
            $fileName = uniqid() . '.jpg';
            $newPath = "files/product/{$fileName}";
        } while (file_exists($newPath));

        if (!move_uploaded_file($newPhoto, $newPath)) {
            throw new \Exception("Помилка завантаження нового фото.");
        }

        Core::getInstance()->db->update(self::$tableName, [
            'photo' => $fileName
        ], [
            'id' => $id
        ]);
    }

    /**
     * Видаляє файл фото продукту.
     *
     * @param int $id Ідентифікатор продукту
     * @return void
     */
    public static function deletePhotoFile($id)
    {
        $row = self::getProductById($id);

        if ($row && !empty($row['photo'])) {
            $photoPath = "files/product/" . $row['photo'];
            if (is_file($photoPath) && !unlink($photoPath)) {
                throw new \Exception("Не вдалося видалити файл фото: {$photoPath}");
            }
        }
    }
}
