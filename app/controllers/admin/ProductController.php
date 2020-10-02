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

    public function addImageAction() {
        if (isset($_GET['upload'])) {
            if ($_POST['name'] == 'single'){
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            } else {
                $wmax = App::$app->getProperty('gallery_width');
                $hmax = App::$app->getProperty('gallery_height');
            }
            $name = $_POST['name'];
            $product = new Product();
            $product->uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? 1 : 0;
            $product->attributes['hit'] = $product->attributes['hit'] ? 1 : 0;
            $product->attributes['old_price'] = $product->attributes['old_price'] ?: 0;
            $product->getImg();
            if (!$product->validate($data)) {
                $product->getErrors();
                redirect();
            }
            if ($product->update('product', $id)) {
                $product->editFilter($id, $data);
                $product->editRelatedProduct($id, $data);
                $product->saveGallery($id);
                $alias = AppModel::createAlias('product', 'alias', data['title'], $id);
                $product = R::load('product', $id);
                $product->alias = $alias;
                R::store($product);
                $_SESSION['success'] = 'Updated product';
                redirect();
            }
        }

        $id = $this->getRequestID();
        $product = R::load('product', $id);
        App::$app->setProperty('parent_id', $product->category_id);
        $filter = R::getCol('SELECT attr_id FROM attribute_product WHERE product_id = ?', [$id]);
        $related_product = $this->getRelatedProductById($id);
        $gallery = R::getCol('SELECT img FROM gallery WHERE product_id = ?', [$id]);

        $this->setMeta("Edit product {$product->title}");
        $this->set(compact('product', 'filter', 'related_product', 'gallery'));
    }

    public function addAction() {
        if (!empty($_POST)) {
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? 1 : 0;
            $product->attributes['hit'] = $product->attributes['hit'] ? 1 : 0;
            $product->attributes['old_price'] = $product->attributes['old_price'] ?: 0;
            $product->getImg();
            if (!$product->validate($data)) {
                $product->getErrors();
                $_SESSION['form-data'] = $data;
                redirect();
            }
            if ($id = $product->save('product')) {
                $product->saveGallery($id);
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

    private function getRelatedProductById($id) {
        return R::getAll("SELECT related_product.related_id, product.title
            FROM related_product JOIN product ON product.id = related_product.related_id 
            WHERE related_product.product_id = ?", [$id]);
    }

    public function deleteGalleryAction() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if (!$id || !$src) {
            return;
        }
        if (R::exec("DELETE FROM gallery WHERE product_id = ? AND img = ?", [$id, $src])) {
            @unlink(WWW . "/images/$src");
            exit('1');
        }
        return;
    }
}