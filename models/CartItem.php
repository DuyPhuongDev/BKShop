<?php
require_once('connection.php');
class CartItem {
    private $cart_item_id;
    private $cart_id;
    private $product_id;
    private $quantity;
    private $size;
    private $added_at;

    public function __construct($cart_item_id, $cart_id, $product_id, $quantity, $size, $added_at) {
        $this->cart_item_id = $cart_item_id;
        $this->cart_id = $cart_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->size = $size;
        $this->added_at = $added_at;
    }

    // getters and setters
    public function getCartItemId() {
        return $this->cart_item_id;
    }

    public function getCartId() {
        return $this->cart_id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getSize() {
        return $this->size;
    }

    public function getAddedAt() {
        return $this->added_at;
    }

    public function setCartItemId($cart_item_id) {
        $this->cart_item_id = $cart_item_id;
    }

    public function setCartId($cart_id) {
        $this->cart_id = $cart_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setAddedAt($added_at) {
        $this->added_at = $added_at;
    }

    // toString
    public function __toString() {
        return $this->cart_item_id . ' - ' . $this->cart_id . ' - ' . $this->product_id . ' - ' . $this->quantity . ' - ' . $this->size . '.' . $this->added_at;
    }

    public static function save($cart_id, $product_id, $quantity, $size) {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO cart_items (cart_id, product_id, quantity, size) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('iiis', $cart_id, $product_id, $quantity, $size);
        $req = $stmt->execute();
        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    // update quantity
    public static function updateQuantity($cart_item_id, $quantity) {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE cart_items SET quantity = ? WHERE cart_item_id = ?');
        $stmt->bind_param('ii', $quantity, $cart_item_id);
        $req = $stmt->execute();
        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    // get cart_item by cart_id and product_id and size
    public static function getCartItemByCartIdAndProductIdAndSize($cart_id, $product_id, $size) {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM cart_items WHERE cart_id = ? AND product_id = ? AND size = ?');
        $stmt->bind_param('iis', $cart_id, $product_id, $size);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return null;
        }
        $result = $result->fetch_assoc();
        $cart_item = new CartItem($result['cart_item_id'], $result['cart_id'], $result['product_id'], $result['quantity'], $result['size'], $result['added_at']);
        return $cart_item;
    }

    // get all cart_items by cart_id
    public static function getCartItemsByCartId($cart_id) {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM cart_items WHERE cart_id = ?');
        $stmt->bind_param('i', $cart_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $cart_items = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $cart_item = new CartItem($row['cart_item_id'], $row['cart_id'], $row['product_id'], $row['quantity'], $row['size'], $row['added_at']);
                $cart_items[] = $cart_item;
            }
        }
        return $cart_items;
    }

    // delete cart_item by cart_item_id
    public static function deleteCartItemById($cart_item_id) {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM cart_items WHERE cart_item_id = ?');
        $stmt->bind_param('i', $cart_item_id);
        $req = $stmt->execute();
        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    // delete cart_item by cart_id
    public static function deleteCartItemByCartId($cart_id) {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM cart_items WHERE cart_id = ?');
        $stmt->bind_param('i', $cart_id);
        $req = $stmt->execute();
        if ($req) {
            return true;
        } else {
            return false;
        }
    }
}
?>
