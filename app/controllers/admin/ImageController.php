<?php

namespace app\controllers\admin;

use RedBeanPHP\R;

class ImageController extends AppController {

    public function indexAction() {
        $dir = WWW . "/images/";
        $files = $this->get_the_files($dir);
        $files = array_filter($files);
        $quantityInDir = count($files);

        $product = R::count('product');
        $gallery = R::count('gallery');
        $quantityInDb = $product + $gallery;

        $this->setMeta('Images');
        $this->set(compact('quantityInDir', 'quantityInDb'));
    }

    public function syncAction() {
        $dir = WWW . "/images/";
        $files = $this->get_the_files($dir);

        foreach ($files as $file) {
            $product = R::count('product', 'img = ?', [$file]);
            $gallery = R::count('gallery', 'img = ?', [$file]);
            $result = $product + $gallery;
            if ($result == 0) {
                @unlink($dir . $file);
            }
        }
        redirect();
    }

    private function get_the_files($dir) {
        return array_slice(array_diff(scandir($dir), array('..', '.', '.DS_Store')), 0);
    }
}