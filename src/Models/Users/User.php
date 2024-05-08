<?php 
namespace Src\Models\Users;
use Src\Models\Articles\ActiveRecordEntity;
use Src\Exceptions\InvalidArgumentException;

class User extends ActiveRecordEntity {
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public function getNickName() {
        return $this->nickname;
    }

    public function setNickName($nickname): Void {
        $this->nickname = $nickname;
    }

    public function setRole($role): Void {
        $this->role = $role;
    }

    public function setPasswordHash($passwordHash): Void {
        $this->passwordHash = $passwordHash;
    }

    public function setEmail($email): Void {
        $this->email = $email;
    }
    public function getIsConfirmed() {
        return $this->isConfirmed;
    }

    public function getRole() {
        return $this->role;
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

    public function getAuthToken() {
        return $this->authToken;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getEmail() {
        return $this->email;
    }

    protected static function getTableName(): string {
        return 'users';
    }

    public static function signUp(array $userData) {
        if (empty($userData['nickname'])) {
            throw new InvalidArgumentException('Не передан nickname');
        }
        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname'])) {
            throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита и цифр');
        }
        if (static::findByOneColumn('nickname', $userData['nickname']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким nickname уже существует');
        }
        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('email некорректен');
        }
        if (static::findByOneColumn('email', $userData['email']) !== null) {
            throw new InvalidArgumentException('Такой email уже зарегистрирован');
        }
        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        if (mb_strlen($userData['password'] < 8)) {
            throw new InvalidArgumentException('Пароль не должен быть менее 8 символов');
        }
        if ($userData['password'] !== $userData['repeat_password']) {
            throw new InvalidArgumentException('Пароли не совпадают');
        }
        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->role = 'user';
        $user->isConfirmed = true;
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();
        return $user;
    }

    public static function login(array $loginData): User {
        if (empty($loginData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (empty($loginData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        $user = User::findByOneColumn('email', $loginData['email']);
        if ($user == null) {
            throw new InvalidArgumentException('Нет пользователя с таким email');
        }
        if (!password_verify($loginData['password'], $user->passwordHash)) {
            throw new InvalidArgumentException('Неправильный пароль');
        }
        if (!$user->getIsConfirmed()) {
            throw new InvalidArgumentException('Пользователь не подтверждён');
        }
        $user->refreshAuthToken();
        $user->save();
        return $user;
    }

    public function refreshAuthToken() {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }

    public function updateUserPass(array $userData): User {
        if (!empty($userData['password']) && !password_verify($userData['password'], $this->passwordHash)) {
            throw new InvalidArgumentException('Неправильный старый пароль');
        }
        if ($userData['new_password'] !== $userData['repeat_password']) {
            throw new InvalidArgumentException('Пароли не совпадают');
        }
        if (!empty($userData['password']) && 
            $userData['new_password'] == $userData['repeat_password'] && 
            password_verify($userData['password'], $this->passwordHash)){
                
            $this->setPasswordHash(password_hash($userData['new_password'], PASSWORD_DEFAULT));
        }
        
        $this->save();
        return $this;
    }
    public function updateUser(array $userData): User {
        if (empty($userData['nickname'])) {
            throw new InvalidArgumentException('Не передан nickname');
        }
        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname'])) {
            throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита и цифр');
        }
        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('email некорректен');
        }
        if((($userData['nickname'] !== $this->getNickName()) || ($userData['email'] !== $this->getEmail() 
            && static::findByOneColumn('email', $userData['email']) == null)) 
            && password_verify($userData['password'], $this->passwordHash)) {

            $this->setEmail($userData['email']);
            $this->setNickName($userData['nickname']);
        }  
        else if (($userData['nickname'] == $this->getNickName()) && ($userData['email'] == $this->getEmail())) {
            throw new InvalidArgumentException('Данные не менялись');
        } 
        else if (empty($userData['password'])) {
            throw new InvalidArgumentException('Подтвердите пароль');
        } 
        else if (!password_verify($userData['password'], $this->passwordHash)) {
            throw new InvalidArgumentException('Неправильный пароль');
        } 
        else if (static::findByOneColumn('email', $userData['email']) !== null) {
            throw new InvalidArgumentException('Такой email уже зарегистрирован');
        }

        $this->save();
        return $this;
    }
}