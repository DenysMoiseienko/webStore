<?php

namespace app\controllers;

use RedBeanPHP\R;
use store\App;
use store\libs\Pagination;

class SearchController extends AppController {

    public function typeaheadAction() {
        if ($this->isAjax()) {
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query) {
                $products = R::getAll(
                   "SELECT id, title, color, img FROM product WHERE title LIKE ? AND status = '1' LIMIT 9",
                    ["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die;
    }

    public function indexAction() {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query) {
            // pagination
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perPage = App::$app->getProperty('pagination');
            $count = R::count('product', "title LIKE ? AND status = '1'", ["%{$query}%"]);
            $pagination = new Pagination($page, $perPage, $count);
            $start = $pagination->getStart();

            $products = R::find('product', "title LIKE ? AND status = '1' LIMIT $start, $perPage", ["%{$query}%"]);
            $this->setMeta('Search by: ' . h($query));
            $this->set(compact('products', 'query', 'pagination', 'count', 'start', 'page', 'perPage'));
        }
    }
}