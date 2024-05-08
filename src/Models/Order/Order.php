<?php 
namespace Src\Models\Order;
use Src\Models\Articles\ActiveRecordEntity;
use Src\Exceptions\InvalidArgumentException;
use Src\Services\Db;
class Order extends ActiveRecordEntity {
    protected $name;
    protected $email;
    protected $phone;
    protected $address;
    protected $note;
    protected $createdAt;
    protected $updatedAt;
    protected $qty;
    protected $total;
    protected $status;


    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getNote() {
        return $this->note;
    }
    public function getUpdatedAt() {
        return $this->updatedAt;
    }
    public function getCreatedAt() {
        return $this->createdAt;
    }
    public function getTotal() {
        return $this->total;
    } 
    public function getEmail() {
        return $this->email;
    }
    public function getQty() {
        return $this->qty;
    }
    public function getStatus() {
        return $this->status;
    }
    protected static function getTableName(): string {
        return 'orders';
    }
    public function setStatus($status): void {
        $this->status = $status;
    }

    public static function getOrdersByEmail(string $email): array {
        $db = DB::getInstance();
        return $db->query(
            'SELECT * FROM `' . Order::getTableName() . '` WHERE email=:email;', [':email' => $email], static::class
        );
    }

    public static function saveOrder(array $userData) {
        if (empty($userData['name'])) {
            throw new InvalidArgumentException('Не передано ФИО');
        }
        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('email некорректен');
        }
        if (!preg_match('/^[0-9]+$/', $userData['phone'])) {
            throw new InvalidArgumentException('Телефон неккоректен');
        }
        if (empty($userData['address'])) {
            throw new InvalidArgumentException('Не передан Адрес');
        }
        if (empty($userData['note'])) {
            throw new InvalidArgumentException('Не передан Текст');
        }
        $totalQty = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $totalQty += $value['qty'];
        }


        $order = new Order();
        $order->name = $userData['name'];
        $order->email = $userData['email'];
        $order->phone = $userData['phone'];
        $order->address = $userData['address'];
        $order->note = $userData['note'];
        $order->total = $_SESSION['cart.sum'];
        $order->qty = $totalQty;
        session_destroy();
        $order->save();
        return $order;
    }

    public function updateOrder(array $fields): Order{
        $this->name = $this->getName();
        $this->phone = $this->getPhone();
        $this->address = $this->getAddress();
        $this->note = $this->getNote();
        $this->updatedAt = $this->getUpdatedAt();
        $this->createdAt = $this->getCreatedAt();
        $this->total = $this->getTotal();
        $this->email = $this->getEmail();
        $this->qty = $this->getQty();
        $this->setStatus($fields['status']);
        $this->save();
        return $this;
    }

}