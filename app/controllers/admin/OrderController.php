<?php

namespace app\controllers\admin;

use DateTime;
use DateTimeZone;
use RedBeanPHP\R;
use store\App;
use store\libs\Pagination;

class OrderController extends AppController {

    public function indexAction() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('adminPagination');
        $count = R::count('order');
        $pagination = new Pagination($page, $perPage, $count);
        $start = $pagination->getStart();

        $orders = $this->getAllOrders($start, $perPage);

        $this->setMeta('Orders list');
        $this->set(compact('orders', 'pagination', 'count', 'start', 'page', 'perPage'));
    }

    public function viewAction() {
        $order_id = $this->getRequestID();
        $order = $this->getOrderById($order_id);

        if (!$order) {
            throw new \Exception("Page not found", 404);
        }
        $order_products = R::findAll('order_product', "order_id = ?", [$order_id]);

        $this->setMeta("Order nr{$order_id}");
        $this->set(compact('order', 'order_products'));
    }

    public function editAction() {
        $order_id = $this->getRequestID();
        $status = !empty($_GET['status']) ? '1' : '0';
        $order = R::load('order', $order_id);
        if (!$order) {
            throw new \Exception("Page not found", 404);
        }
        $order->status = $status;
        $order->update_at = $this->getDate();
        R::store($order);
        $_SESSION['success'] = 'Changes saved';
        redirect();
    }

    public function deleteAction() {
        $order_id = $this->getRequestID();
        $order = R::load('order', $order_id);
        R::trash($order);
        $_SESSION['success'] = 'Order has been removed';
        redirect(ADMIN . '/order');
    }

    private function getAllOrders($start, $perPage) {
        return R::getAll("SELECT `order`.`id`,
            `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_at`,
            `order`.`currency`, `user`.`name`, ROUND(SUM(`order_product`.`price` * `order_product`.`qty`), 2) AS `sum` 
            FROM `order` JOIN `user` ON `order`.`user_id` = `user`.`id`
            JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
            GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` DESC LIMIT $start, $perPage");
    }

    private function getOrderById($order_id) {
            return R::getRow("SELECT `order`.*, `user`.`name`,
            ROUND(SUM(`order_product`.`price` * `order_product`.`qty`), 2) AS `sum` 
            FROM `order`
            JOIN `user` ON `order`.`user_id` = `user`.`id`
            JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
            WHERE `order`.`id` = ?
            GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1", [$order_id]);
    }

    private function getDate() {
        $timeZone = 'Europe/Warsaw';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($timeZone));
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
        return $dt->format('Y-m-d H:i:s');
    }
}