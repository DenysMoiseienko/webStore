<?php

namespace app\controllers;

use app\models\admin\ProductSize;
use app\models\Cart;
use app\models\Order;
use app\models\User;
use RedBeanPHP\R;

class CartController extends AppController {

    public function addAction() {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        $size = !empty($_GET['size']) ? (int)$_GET['size'] : null;
        $size_id = !empty($_GET['size_id']) ? (int)$_GET['size_id'] : null;
        $available_qty = !empty($_GET['available_qty']) ? (int)$_GET['available_qty'] : null;

        if($id) {
            $product = R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
        }
        if ($qty > $available_qty) {
            return false;
        }

        if ($size) {
            $cart = new Cart();
            $cart->addToCart($product, $qty, $size, $available_qty, $size_id);

            if ($this->isAjax()) {
                $this->loadView('cart_modal');
            }
            redirect();
        }
        return false;
    }

    public function recalculateAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? $_GET['qty'] : null;

        for ($i = 0; $i < count($id); $i++){
            $cart = new Cart();
            $cart->recalculateItem($id[$i], $qty[$i]);
        }
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function showAction() {
        $this->loadView('cart_modal');
    }

    public function deleteAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if (isset($_SESSION['cart'][$id])) {
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function clearAction() {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);

        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function viewAction() {
        $this->setMeta('Cart');
    }

    public function checkoutAction() {
        if (!$_SESSION['cart']) {
            redirect();
        }
        // user registration
        if (!User::checkAuth()) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->isUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            } else {
                $user->attributes['password'] =
                    password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if (!$user_id = $user->save('user')) {
                    $_SESSION['error'] = 'Error!';
                    redirect();
                }
            }
        }
        //save order
        $data['user_id'] = isset($user_id) ? $user_id : $_SESSION['user']['id'];
        $user_email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : $_POST['email'];
        $order_id = Order::saveOrder($data);
        ProductSize::updateSizeAndQuantity();
        Order::mailOrder($order_id, $user_email);

        redirect();
    }
}