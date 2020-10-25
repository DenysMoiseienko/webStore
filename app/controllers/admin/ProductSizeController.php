<?php

namespace app\controllers\admin;

use app\models\admin\ProductSize;
use RedBeanPHP\R;

class ProductSizeController extends AppController {

    public function viewAction() {
        $id = $this->getRequestID();
        $product = R::findOne('product', 'id = ?', [$id]);
        $all_sizes = R::findAll('size', 'ORDER BY value');
        $product_sizes = R::getAll("SELECT `size`.`value`, `product_size`.`qty` FROM `size` JOIN `product_size` 
            ON`size`.`id` = `product_size`.`size_id` WHERE `product_size`.`product_id` = ? ORDER BY `size`.`value`", [$id]);

        if (!empty($_POST)) {
            $size = $_POST['size'];
            $quantity = !empty($_POST['quantity']) ? $_POST['quantity'] : 0;
            $id_size = R::findOne('size', 'value = ?', [$size]);

            ProductSize::addSizeAndQuantity($id_size['id'], $quantity, $id);
            $_SESSION['success'] = 'Changes saved';
            redirect();
        }
        $this->setMeta('Product');
        $this->set(compact('product', 'product_sizes', 'all_sizes'));

    }

}