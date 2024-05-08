<?php
namespace Src\Controllers;
use Src\Models\Users\User;
use Src\Models\Users\UserAuthService as GlobalUserAuthService;
use Src\Exceptions\InvalidArgumentException;

class UsersController extends Controller {
    public function signUp() {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHTML('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }
            if ($user instanceof User) {
                $this->view->renderHTML('users/signUpSuccesful.php');
                return;
            }
        }
        $this->view->renderHTML('users/signUp.php');
    }

    public function login() {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                GlobalUserAuthService::createToken($user);
                header('Location: /myProject2.loc/');
                exit;
            } catch (InvalidArgumentException $e) {
                $this->view->renderHTML('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
            $this->view->renderHTML('users/login.php');
        }
        $this->view->renderHTML('users/login.php');
    }

    public function logout() {
        setcookie('token', '', -1, '/', '', false, true);
        header('Location: /myProject2.loc/' );
    }   
}