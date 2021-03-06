<?php

namespace app\models;

use RedBeanPHP\R;
use store\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class User extends AppModel {

    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
        'role' => 'user',
        'status' => '0',
        'email_token' => '',
        'email_verified' => null
     ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['name'],
            ['email'],
            ['address']
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6]
        ],
        'lengthMax' => [
            ['password', 16]
        ]
    ];

    public function isUnique() {
        $user = R::findOne('user', 'login = ? OR email = ?',
            [$this->attributes['login'], $this->attributes['email']]);

        if ($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['unique'][]= 'this username already exists';
            }
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = 'this email already exists';
            }
            return false;
        }
        return true;
    }

    public function login($isAdmin = false) {
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;

        if ($login && $password) {
            if ($isAdmin) {
                $user = R::findOne('user', "login = ? AND role = 'admin' AND status = 1", [$login]);
            } else {
                $user = R::findOne('user', 'login = ? AND status = 1', [$login]);
            }
            if ($user) {
                if (password_verify($password, $user->password)) {
                    foreach($user as $k => $v) {
                        if ($k != 'password') {
                            $_SESSION['user'][$k] = $v;
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public static function checkAuth() {
        return isset($_SESSION['user']);
    }

    public static function isAdmin() {
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }

    public static function sendMail($subject, $user_name, $user_email, $message) {
        $transport = (new Swift_SmtpTransport(
            App::$app->getProperty('smtp_host'),
            App::$app->getProperty('smtp_port'),
            App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'));

        $mailer = new Swift_Mailer($transport);

        // create a message
        $message_admin = (new Swift_Message($subject))
            ->setFrom([App::$app->getProperty('smtp_login') => $user_name])
            ->setTo(App::$app->getProperty('admin'))
            ->setBody($message . "\n\nUser: " . $user_name . "\nEmail: " . $user_email);

        $result = $mailer->send($message_admin);
        if($result > 0) {
            $_SESSION['success'] = 'Thanks for your mail:)';
        } else {
            $_SESSION['error'] = 'Something went wrong:(';
        }
    }

    public static function sendConfirmationRegistration($token, $email) {
        $transport = (new Swift_SmtpTransport(
            App::$app->getProperty('smtp_host'),
            App::$app->getProperty('smtp_port'),
            App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'));

        $mailer = new Swift_Mailer($transport);
        $link = "<a href='" . PATH . "user/confirm?key=".$email."&amp;token=".$token."'>here</a>";

        $message_client = (new Swift_Message('Confirm your email'))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo($email)
            ->setBody('To verify your Email, click '. $link, 'text/html');

        $result = $mailer->send($message_client);

        if ($result > 0) {
            $_SESSION['success'] = 'Thanks for the registration:) We have sent you an email to confirm your registration';
        } else {
            $_SESSION['error'] = 'Something went wrong:(';
        }
    }
}