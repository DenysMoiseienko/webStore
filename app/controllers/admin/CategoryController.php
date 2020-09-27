<?php

namespace app\controllers\admin;

use RedBeanPHP\R;

class CategoryController extends AppController {

    public function indexAction() {
        $this->setMeta('Category list');
    }

    public function deleteAction() {
        $id = $this->getRequestID();
        $children = R::count('category', 'parent_id = ?', [$id]);
        $errors = '';
        if ($children) {
            $errors .= '<li>Unable to delete, there are nested categories</li>';
        }
        $products = R::count('product', 'category_id = ?', [$id]);
        if ($products) {
            $errors .= '<li>Unable to delete, there are products in the category</li>';
        }
        if ($errors) {
            $_SESSION['error'] = "<ul>$errors</ul>";
            redirect();
        }

        $category = R::load('category', $id);
        R::trash($category);
        $_SESSION['success'] = 'Category has been removed';
        redirect();
    }

}