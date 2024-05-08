<?php

namespace Src\Controllers;

use Src\Models\Products\Product;
use Src\Exceptions\NotFoundException;
use Src\Models\Cart;
use Src\Models\Order\Order;
use Src\Models\Order\OrderProduct;
use Src\Exceptions\InvalidArgumentException;

class CartController extends Controller {
    public function add($id){
        $product = Product::getById($id);
        if(empty($product)){
            return false;
        }
        $cart = new Cart();
        $cart->addToCart($product);
        header('Location: /cart');
    } 

    public function addInCart($id){
        $product = Product::getById($id);
        if(empty($product)){
            return false;
        }
        $cart = new Cart();
        $cart->addToCart($product);
        header('Location: /product/all');
    } 

    public function delItem($id){
        $cart = new Cart();
        $product = Product::getById($id);
        if(empty($product)){
            return false;
        }
        $cart = new Cart();
        $cart->addToCart($product, -1);
        if ($_SESSION['cart'][$id]['qty'] < 1) {
            unset($_SESSION['cart'][$id]);
        } 
        header('Location: /cart');
    }

    public function deleteInCart($id) {
        $product = Product::getById($id);
        $cart = new Cart();
        $cart->addToCart($product, -$_SESSION['cart'][$id]['qty']);
        unset($_SESSION['cart'][$id]);
        header('Location: /cart');
    }

    public function deleteInProducts($id) {
        unset($_SESSION['cart'][$id]);
        header('Location: /');
    }

    public function clear() {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        header('Location: /cart');
    }
    public function view() {
        
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $this->view->renderHtml('Cart/view.php', ['cart' => $_SESSION['cart'], 'cart.sum' => $_SESSION['cart.sum']]);
        } else {
            $this->view->renderHtml('Cart/view.php');
        }
       
    }
    public function order() {
        if(isset($_SESSION['cart'])) {
        $this->view->renderHtml('Cart/order.php', ['cart' => $_SESSION['cart'], 'cart.sum' => $_SESSION['cart.sum']]);
        } else {
            $this->view->renderHtml('Cart/order.php');
        } 
    }
    public function orderPost() {
        
        if(!empty($_POST)) {
            try {
                $order= Order::saveOrder($_POST);
                if(OrderProduct::saveOrderProducts($_SESSION['cart'], $order->getId())) {
                    $this->view->renderHtml('Cart/orderSuccesful.php', ['orderId' => $order->getId()]);
                    
                    unset($_SESSION['cart']);
                    unset($_SESSION['cart.sum']);
                    return;
                }
            } catch (InvalidArgumentException $e) {
                    $this->view->renderHtml('Cart/order.php', ['cart' => $_SESSION['cart'], 'cart_sum' => $_SESSION['cart_sum'], 'error' => $e->getMessage()]);
                    return;
            }
            
        } $this->view->renderHtml('Cart/order.php', ['cart' => $_SESSION['cart'], 'cart_sum' => $_SESSION['cart.sum']]);
    } 

}