<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\Category;
use RedBeanPHP\R;
use store\App;

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

    public function addAction() {
        if (!empty($_POST)) {
            $category = new Category();
            $data =$_POST;
            $category->load($data);
            if (!$category->validate($data)) {
                $category->getErrors();
                redirect();
            }
            if ($id = $category->save('category')) {
                $alias = AppModel::createAlias('category', 'alias', $data['title'], $id);
                $cat = R::load('category', $id);
                $cat->alias = $alias;
                R::store($cat);
                $_SESSION['success'] = 'Category added';
            }
            redirect();
        }
        $this->setMeta('New category');
    }

    public function editAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $category = new Category();
            $data =$_POST;
            $category->load($data);
            if (!$category->validate($data)) {
                $category->getErrors();
                redirect();
            }
            if ($category->update('category', $id)) {
                $alias = AppModel::createAlias('category', 'alias', $data['title'], $id);
                $category = R::load('category', $id);
                $category->alias = $alias;
                R::store($category);
                $_SESSION['success'] = 'Category updated';
            }
            redirect();
        }
        $id = $this->getRequestID();
        $category = R::load('category', $id);
        App::$app->setProperty('parent_id', $category->parent_id);



        $this->setMeta("Editing a category {$category->title}");
        $this->set(compact('category'));
    }

}