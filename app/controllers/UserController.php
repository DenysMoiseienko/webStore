<?php

namespace app\controllers;

use app\models\User;
use RedBeanPHP\R;

class UserController extends AppController {

    public function signupAction() {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->isUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['password'] =
                    password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if ($user->save('user')) {
                    $_SESSION['success'] = 'OK';
                    /////////
                } else {
                    $_SESSION['error'] = 'Error!';
                }
            }
            redirect();
        }
        $this->setMeta('Sign up');
    }

    public function loginAction() {
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login()) {
                $_SESSION['success'] = 'You are logged successfully';
            } else {
                $_SESSION['error'] = 'Login/Password entered incorrectly';
            }
            redirect();
        }
        $this->setMeta('LogIn');
    }

    public function logoutAction() {
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/webStore/user/login');
    }

    public function myAccountAction() {
        if (!User::checkAuth()) {
            redirect('/webStore/user/login');
        }
        $this->setMeta('My account');
    }

    public function editAction() {
        if (!User::checkAuth()) {
            redirect('/webStore/user/login');
        }
        if (!empty($_POST)) {
            $user = new \app\models\admin\User();
            $data = $_POST;
            $data['id'] = $_SESSION['user']['id'];
            $data['role'] = $_SESSION['user']['role'];
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
            if ($user->update('user', $_SESSION['user']['id'])) {
                foreach ($user->attributes as $k => $v) {
                    if ($k != 'password') {
                        $_SESSION['user'][$k] = $v;
                    }
                }
                $_SESSION['success'] = 'Changes saved';
            }
            redirect();
        }
        $this->setMeta('Update info');
    }

    public function ordersAction() {
        if (!User::checkAuth()) {
            redirect('/webStore/user/login');
        }
        $orders = R::findAll('order', 'user_id = ?',  [$_SESSION['user']['id']]);
        $this->setMeta('Order history');
        $this->set(compact('orders'));
    }
}