<?php

namespace app\controllers\admin;

use app\models\User;
use RedBeanPHP\R;
use store\App;
use store\libs\Pagination;

class UserController extends AppController {

    public function indexAction() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('adminPagination');
        $count = R::count('user');
        $pagination = new Pagination($page, $perPage, $count);
        $start = $pagination->getStart();
        $users = R::findAll('user', "LIMIT $start, $perPage");
        $this->setMeta('Users list');
        $this->set(compact('users', 'pagination', 'count'));
    }

    public function viewAction() {
        $user_id = $this->getRequestID();
        $user = R::load('user', $user_id);
        $orders = $this->getAllOrdersByUser($user_id);

        $this->setMeta($user->name);
        $this->set(compact('user', 'orders'));
    }

    public function editAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $user = new \app\models\admin\User();
            $data = $_POST;
            $user->load($data);

            if (!$user->attributes['password']) {
                unset($user->attributes['password']);
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if (!$user->validate($data) || !$user->isUnique()) {
                $user->getErrors();
                redirect();
            }
            if ($user->update('user', $id)) {
                $_SESSION['success'] = 'Changes saved';
            }
            redirect();
        }

        $user_id = $this->getRequestID();
        $user = R::load('user', $user_id);

        $this->setMeta('User profile editing');
        $this->set(compact('user'));
    }

    public function addAction() {
        $this->setMeta('New user');
    }

    public function loginAdminAction() {
        if (!empty($_POST)) {
            $user = new \app\models\admin\User();
            if (!$user->login(true)) {
                $_SESSION['error'] = 'Login/Password entered incorrectly!';
            }
            if (User::isAdmin()) {
                redirect(ADMIN);
            } else {
                redirect();
            }
        }
        $this->layout = 'login';
    }

    private function getAllOrdersByUser($user_id) {
        return R::getAll("SELECT `order`.`id`,
            `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_at`,
            `order`.`currency`, ROUND(SUM(`order_product`.`price` * `order_product`.`qty`), 2) AS `sum` 
            FROM `order` JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
            WHERE `user_id` = {$user_id} GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` DESC");
    }
}