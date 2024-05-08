<?php

namespace Src\Controllers;

use InvalidArgumentException;
use Src\Models\Users\UserAuthService;
use Src\Views\View;
use Src\Models\Products\Product;
use Src\Models\Categories\Category;
use Src\Models\Users\User;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorizedException;
use UnderflowException;

class ProductController extends Controller {

    public function view(int $id) {
        $products = Product::getByID($id);
        $categories = Category::getById($products->getCategoryId());
        if ($products === null) { // обработка ошибкок
            $this->view->renderHtml('Errors/404.php', [], '404');
            return; 
        } 
        $this->view->renderHtml('Products/view.php', ['products' => $products, 'categories' => $categories]);
    }   

    public function all() {
        $products = Product::findAll();
        $categories = Category::getCategories();
        $this->view->renderHtml('Products/all.php', ['products' => $products, 'categories' => $categories]);
    }

}