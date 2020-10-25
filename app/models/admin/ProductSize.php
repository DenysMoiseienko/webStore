<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class ProductSize extends AppModel {

    public static function addSizeAndQuantity($size_id, $qty, $product_id) {
        $data = R::findOne('product_size', 'size_id = ? AND product_id = ?', [$size_id, $product_id]);

        // delete
        if ($data && $qty == 0) {
            R::exec("DELETE FROM product_size WHERE size_id = ? AND product_id = ?", [$size_id, $product_id]);
        }
        // update
        if ($data && $qty > 0) {
            R::exec("DELETE FROM product_size WHERE size_id = ? AND product_id = ?", [$size_id, $product_id]);
            R::exec("INSERT INTO product_size (size_id, qty, product_id) VALUES ($size_id, $qty, $product_id)");
        }
        // insert
        if (!$data && $qty > 0) {
            R::exec("INSERT INTO product_size (size_id, qty, product_id) VALUES ($size_id, $qty, $product_id)");
        }
    }

    public static function updateSizeAndQuantity() {

        foreach ($_SESSION['cart'] as $product_id => $product) {
            $product_id = (int) $product_id;
            $size_id = $product['size_id'];
            $qty = $product['available_qty'] - $product['qty'];
            // delete
            if ($qty == 0) {
                R::exec("DELETE FROM product_size WHERE size_id = ? AND product_id = ?", [$size_id, $product_id]);
            }
            // update
            if ($qty > 0) {
                R::exec("DELETE FROM product_size WHERE size_id = ? AND product_id = ?", [$size_id, $product_id]);
                R::exec("INSERT INTO product_size (size_id, qty, product_id) VALUES ($size_id, $qty, $product_id)");
            }
        }
    }

}