<?php

namespace Src\Controllers;

use InvalidArgumentException;
use Src\Models\Users\UserAuthService;
use Src\Views\View;
use Src\Models\Categories\Category;
use Src\Models\Users\User;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorizedException;
use Src\Models\Products\Product;
use UnderflowException;

class CategoriesController extends Controller {

    public function view(int $id) {
        $category = Category::getByID($id);
        $categories = Category::getCategories();
        $subcategories = Category::getSubcategories();
        $products = Product::getProductsByCategoryId($id);
        if ($category === null) { // обработка ошибкок
            $this->view->renderHtml('Errors/404.php', [], '404');
            return; 
        } 
        $this->view->renderHtml('Categories/view.php', ['category' => $category, 'products' => $products , 'categories' => $categories, 'subcategories' => $subcategories]);
    }   

    public function search() {
        if (!empty($_GET)){
            if (!isset($_GET['q'])) {
                $this->view->renderHtml('Categories/search.php', ['q' => $_GET['q']]);
                return;
            }
            $searchProducts = Product::search($_GET['q']);
            $this->view->renderHtml('Categories/search.php', ['searchProducts' => $searchProducts, 'q' => $_GET['q']]);
        }
       

    }

}