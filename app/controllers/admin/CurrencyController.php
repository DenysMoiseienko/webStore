<?php

namespace app\controllers\admin;

use app\models\admin\Currency;
use RedBeanPHP\R;

class CurrencyController extends AppController {

    public function indexAction() {
        $currencies = R::findAll('currency');
        $this->setMeta('Currencies');
        $this->set(compact('currencies'));
    }

    public function addAction() {
        if (!empty($_POST)) {
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
            if (!$currency->validate($data)) {
                $currency->getErrors();
                redirect();
            }
            if ($currency->save('currency')) {
                $_SESSION['success'] = 'Currency added';
                redirect();
            }
        }
        $this->setMeta('New currency');
    }

    public function editAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
            if (!$currency->validate($data)) {
                $currency->getErrors();
                redirect();
            }
            if ($currency->update('currency', $id)) {
                $_SESSION['success'] = 'Changes saved';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $currency = R::load('currency', $id);
        $this->setMeta("Edit currency: {$currency->title}");
        $this->set(compact('currency'));
    }

    public function deleteAction() {
        $id = $this->getRequestID();
        R::hunt('currency', 'id = ?', [$id]);
        $_SESSION['success'] = 'Currency deleted';
        redirect();
    }
}