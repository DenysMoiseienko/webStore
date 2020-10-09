<?php

namespace app\controllers;

use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction() {
        $hits = R::find('product', "hit = '1' AND status = '1' LIMIT 8");

        $this->setMeta('Main page',
            'Good description', 'php, tutorial, DIY');
        $this->set(compact( 'hits'));
    }
}