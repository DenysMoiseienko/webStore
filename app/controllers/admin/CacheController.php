<?php

namespace app\controllers\admin;

use store\Cache;

class CacheController extends AppController {

    public function indexAction() {
        $this->setMeta('Clear cache');
    }

    public function deleteAction() {
        $key  = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch ($key) {
            case 'category':
                $cache->delete('cats');
                $cache->delete('store_menu');
                break;
            case 'filter':
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
                break;
        }
        $_SESSION['success'] = 'Selected cache deleted';
        redirect();
    }
}