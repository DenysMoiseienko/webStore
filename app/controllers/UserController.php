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
                    redirect(PATH . 'user/login');
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
            redirect(PATH . 'user/myaccount');
        }
        $this->setMeta('LogIn');
    }

    public function logoutAction() {
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect(PATH . 'user/login');
    }

    public function myAccountAction() {
        $this->checkUser();
        $this->setMeta('My account');
    }

    public function editAction() {
        $this->checkUser();
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
        $this->checkUser();
        $orders = R::findAll('order', 'user_id = ? ORDER BY date DESC',  [$_SESSION['user']['id']]);
        $this->setMeta('Order history');
        $this->set(compact('orders'));
    }

    public function contactAction() {
        $this->checkUser();
        if (!empty($_POST['message']) && !empty($_POST['subject'])) {
            $user_email = $_SESSION['user']['email'];
            $user_name = $_SESSION['user']['name'];
            $subject = h($_POST['subject']);
            $message = h($_POST['message']);
            User::sendMail($subject, $user_name, $user_email, $message);
            redirect(PATH . '/user/myaccount');
        }
        $this->setMeta('Contact form');
    }

    private function checkUser() {
        if (!User::checkAuth()) {
            redirect(PATH . 'user/login');
        }
    }
}