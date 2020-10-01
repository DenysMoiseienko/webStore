<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use app\models\AppModel;
use RedBeanPHP\R;
use store\App;
use store\libs\Pagination;

class ProductController extends AppController {

    public function indexAction() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('adminPagination');
        $count = R::count('product');
        $pagination = new Pagination($page, $perPage, $count);
        $start = $pagination->getStart();

        $products = $this->getAllProducts($start, $perPage);

        $this->setMeta('Products list');
        $this->set(compact('products', 'pagination', 'count', 'start', 'page', 'perPage'));
    }

    public function addAction() {
        if (!empty($_POST)) {
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? 1 : 0;
            $product->attributes['hit'] = $product->attributes['hit'] ? 1 : 0;
            if (!$product->validate($data)) {
                $product->getErrors();
                $_SESSION['form-data'] = $data;
                redirect();
            }
            if ($id = $product->save('product')) {
                $alias = AppModel::createAlias('product', 'alias', $data['title'], $id);
                $p = R::load('product', $id);
                $p->alias = $alias;
                R::store($p);
                $product->editFilter($id, $data);
                $product->editRelatedProduct($id, $data);
                $_SESSION['success'] = 'Product added';
            }
            redirect();
        }


        $this->setMeta('New product');
    }

    private function getAllProducts($start, $perPage) {
        return R::getAll("SELECT product.id, product.title, 
            product.price, product.status, category.title AS cat FROM product
            JOIN category ON category.id = product.category_id ORDER BY product.title
            LIMIT $start, $perPage");
    }

    public function relatedProductAction(){
        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $data['items'] = [];
        $products = R::getAssoc(
            'SELECT id, title FROM product WHERE title LIKE ? LIMIT 10', ["%{$q}%"]);
        if ($products) {
            $i = 0;
            foreach ($products as $id => $title) {
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }
        echo json_encode($data);
        die;
    }


}