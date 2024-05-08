<?php 
namespace Src\Models\Order;
use Src\Models\Articles\ActiveRecordEntity;
use Src\Exceptions\InvalidArgumentException;
use Src\Models\Products\Product;
use Src\Services\Db;

class OrderProduct extends ActiveRecordEntity {
    protected $order_id;
    protected $product_id;
    protected $title;
    protected $price;
    protected $qty;
    protected $total;

    public function getTitle() {
       return $this->title;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getQty() {
        return $this->qty;
    }
    public function getTotal() {
        return $this->total;
    }
    
    public function getProductId() {
        return $this->product_id;
    }
    public function getOrderId() {
        return $this->order_id;
    }

    public static function getOrdersByCategoryId(int $category_id): array {
        $db = DB::getInstance();
        return $db->query(
            'SELECT * FROM `' . OrderProduct::getTableName() . '` WHERE order_id=:id;', [':id' => $category_id], static::class
        );
    }

    public static function saveOrderProducts(array $products, $orderId) {
        if($products) {
            foreach($products as $product) {
                $orderProduct = new OrderProduct;
                $orderProduct->order_id = $orderId;
                $orderProduct->product_id = $product['id'];
                $orderProduct->title = $product['title'];
                $orderProduct->price = $product['price'];
                $orderProduct->qty = $product['qty'];
                $orderProduct->total = $product['qty'] * $product['price'];
                $orderProduct->save();
            }
            return true;
        } else return false;

    }

    protected static function getTableName(): string {
        return 'order_product';
    }

}