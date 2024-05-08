<?php

namespace Src\Controllers;

use InvalidArgumentException;
use Src\Models\Users\UserAuthService;
use Src\Views\View;
use Src\Models\Articles\Article;
use Src\Models\Users\User;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorizedException;
use UnderflowException;

class ArticlesController extends Controller {
    public function all() {
        $articles = Article::findAll();
        $this->view->renderHtml('Articles/all.php',
        ['articles' => $articles,
         'user' => UserAuthService::getUserByToken()
        ]);
    }
    public function sayHello(string $name) {
        $this->view->renderHtml('Main/hello.php', ['name' => $name]);
    } 
    public function echoNew(string $add) {
        echo $add;
    }
    public function view(int $articleId) {
        $article = Article::getByID($articleId);
        if ($article === null) { // обработка ошибкок
            $this->view->renderHtml('Errors/404.php', [], '404');
            return; 
        } 
        $this->view->renderHtml('Articles/view.php', ['article' => $article]);
    }   

    public function edit(int $articleId): void {
        $article = Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException();
        } 
        if (!empty($_POST)) {
            try {
                $article->updateArticle($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error'
                => $e->getMessage(), 'article' => $article]);
                return;
            }
            header('Location: /myProject2.loc/articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function add(): void {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!empty($_POST)) {
            try{
                $article = Article::createArticle($_POST,
                $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error'
                => $e->getMessage()]);
                return;
            }
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHtml('articles/add.php');
    }

    public function delete(int $articleId): void {
        $article = Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }
        $article->delete();
    }

}