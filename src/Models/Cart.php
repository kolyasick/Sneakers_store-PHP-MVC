<?php 

namespace Src\Models;
use Src\Models\Products;
class Cart {
    public function addToCart($product, $qty = 1){

        if(isset($_SESSION['cart'][$product->getId()])) {
            $_SESSION['cart'][$product->getId()]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$product->getId()] = [
                'title' => $product->getTitle(),
                'price' => $product->getPrice(),
                'qty' => $qty,
                'img' => $product->getImg(),
                'id' => $product->getId()
            ];
        }
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->getPrice() : $qty * $product->getPrice();
        header('Location: /myProject2.loc/cart');
    }

    public function delete(int $id): void {
        unset($_SESSION['cart'][$id]);
    }

}