<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use app\widgets\filter\Filter;
use RedBeanPHP\R;
use store\App;
use store\Cache;
use store\libs\Pagination;

class CategoryController extends AppController {

    public function viewAction() {
        $alias = $this->route['alias'];
        $category = R::findOne('category', 'alias = ?', [$alias]);
        if (!$category) {
            throw new \Exception("Page {$alias} not found", 404);
        }

        // breadcrumbs
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        // pagination
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('pagination');

        // filters
        $sql_part = '';
        if (!empty($_GET['filter'])) {
            $filter = Filter::getFilter();
            if ($filter) {
                $count = Filter::getCountGroups($filter);
                $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter)
                GROUP BY product_id HAVING COUNT(product_id) = $count)";
            }
        }

        $total = R::count('product', "category_id IN ($ids) $sql_part");
        //$total = R::count('product', "category_id IN ($ids)");
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();

        // sort by price
        $data = !empty($_GET['sort']) ? $_GET['sort'] : null;
        $orderBy = '';
        if ($data) {
            $orderBy .= "ORDER BY price {$data}";
        }
        $products = R::find('product', "status = '1' AND category_id IN ($ids) $sql_part $orderBy LIMIT $start, $perPage");
        if ($this->isAjax()) {
            $this->loadView('filter', compact('products', 'pagination', 'total'));
        }

        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total'));
    }
}