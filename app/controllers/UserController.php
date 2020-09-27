<?php

namespace app\controllers;

use app\models\User;

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
        redirect();
    }
}