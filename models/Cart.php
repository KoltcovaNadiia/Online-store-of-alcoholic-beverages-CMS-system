<?php

namespace models;

class Cart
{
    public static function addProduct($product_id, $count = 1) {
        if (!is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $count;
        } else {
            $_SESSION['cart'][$product_id] = $count;
        }
    }

    public static function getProductsInCart() {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            $result = [];
            $products = [];
            $totalPrice = 0;
            foreach ($_SESSION['cart'] as $product_id => $count) {
                $product = Product::getProductById($product_id);
                if ($product) {
                    $totalPrice += $product['price'] * $count;
                    $products[] = ['product' => $product, 'count' => $count];
                }
            }
            $result['products'] = $products;
            $result['total_price'] = $totalPrice;
            return $result;
        }
        return null;
    }

    public static function changeProductsCount() {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product_id => $count) {
                if (isset($_COOKIE['count' . $product_id])) {
                    $_SESSION['cart'][$product_id] = intval($_COOKIE['count' . $product_id]);
                }
            }
        }
    }

    public static function deleteProduct($id) {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }

        // Якщо кошик порожній, видаляємо сесію
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }

    public static function unsetSession() {
        unset($_SESSION['cart']);
        unset($_COOKIE['comment']);
        unset($_COOKIE['shipment']);
        unset($_SESSION['order_id']);
    }
}
