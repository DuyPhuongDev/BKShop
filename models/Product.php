<?php
require_once('connection.php');
require_once('models/Category.php');
class Product {
    private $product_id;
    private $product_name;
    private $description;
    private $image_url;
    private $price;
    private $category_id;
    private $created_at;
    private $updated_at;

    public function __construct($product_name, $description, $image_url, $price, $category_id) {
        $this->product_name = $product_name;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->price = $price;
        $this->category_id = $category_id;
    }

    // Getter and Setter for product_id
    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    // Getter and Setter for product_name
    public function getProductName() {
        return $this->product_name;
    }

    public function setProductName($product_name) {
        $this->product_name = $product_name;
    }

    // Getter and Setter for description
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    // Getter and Setter for image_url
    public function getImageUrl() {
        return $this->image_url;
    }

    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }

    // Getter and Setter for price
    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    // Getter and Setter for category_id
    public function getCategoryId() {
        return $this->category_id;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    // Getter and Setter for created_at
    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    // Getter and Setter for updated_at
    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
    
    // toString method
    public function __toString() {
        return "Product ID: {$this->product_id}, Product Name: {$this->product_name}, Description: {$this->description}, Image URL: {$this->image_url}, Price: {$this->price}, Category ID: {$this->category_id}, Created At: {$this->created_at}, Updated At: {$this->updated_at}";
    }

    public function addProduct() {
        // Gọi kết nối MySQLi từ DB::getInstance() 
        $db = DB::getInstance();
        
    
        // Kiểm tra kết nối
        if ($db->connect_error) {
            error_log("Connection failed: " . $db->connect_error);
            return false;
        }
    
        // Chuẩn bị câu truy vấn SQL
        $stmt = $db->prepare(
            "INSERT INTO products (product_name, description, image_url, price, category_id)
            VALUES (?, ?, ?, ?, ?)"
        );
    
        // Kiểm tra nếu việc chuẩn bị truy vấn thất bại
        if ($stmt === false) {
            error_log("Statement prepare failed: " . $db->error);
            return false;
        }
    
        // Gán các giá trị vào câu truy vấn với các tham số theo thứ tự
        $stmt->bind_param(
            "sssdi",               // Loại dữ liệu của từng tham số
            $this->product_name,      // s: string
            $this->description,       // s: string
            $this->image_url,         // s: string
            $this->price,             // d: double (decimal)
            $this->category_id,       // i: integer
        );
    
        // Thực thi câu truy vấn
        if (!$stmt->execute()) {
            error_log("Execute failed: " . $stmt->error);
            return false;
        }
    
        // Đóng statement và kết nối sau khi thực hiện xong
        $stmt->close();
        return true;
    }
    
    public static function getAll(){

        $db = DB::getInstance();
        $sql = "SELECT * FROM products";
        $result = $db->query($sql);
        $products = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $product = new Product($row['product_name'], $row['description'], $row['image_url'], $row['price'], $row['category_id']);
                $product->product_id = $row['product_id'];
                $product->created_at = $row['created_at'];
                $product->updated_at = $row['updated_at'];
                $products[] = $product;
            }
        }

        return $products;
    }
    
    public function getCategoryName() {
        $db = DB::getInstance();
        $sql = "SELECT category_name FROM categories WHERE category_id = $this->category_id";
        $result = $db->query($sql);
        $category_name = "";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $category_name = $row['category_name'];
            }
        }
        return $category_name;
    }

    public static function deleteProduct($product_id) {
        $db = DB::getInstance();
        $sql = "DELETE FROM products WHERE product_id = $product_id";
        if ($db->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public static function getProductById($id){
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = null;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $product = new Product($row['product_name'], $row['description'], $row['image_url'], $row['price'], $row['category_id']);
                $product->product_id = $row['product_id'];
                $product->created_at = $row['created_at'];
                $product->updated_at = $row['updated_at'];
            }
        }
        return $product;
    }

    // Phương thức static để lấy thông tin một sản phẩm theo id
    public static function get($id)
    {
        $db = DB::getInstance(); // Giả sử DB::getInstance() trả về kết nối MySQLi
        $req = $db->query("SELECT * FROM products WHERE product_id = $id");
        // $req = $db->query("SELECT * FROM products");
        $products = [];

        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $item = new Product(
                $product['product_name'],
                $product['description'],
                $product['image_url'],
                $product['price'],
                $product['category_id'],
            );

            $item->product_id = $product['product_id'];
            $item->created_at = $product['created_at'];
            $item->updated_at = $product['updated_at'];
            $products[] = $item;
        }
        return $products;
    }

    public static function getcate($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $cat_id = $result['category_id'];
        $category = Category::getCategoryById($cat_id);
        return $category;
    }

    // get products by category id
    public static function getProductsByCategoryId($id) {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM products WHERE category_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $product = new Product($row['product_name'], $row['description'], $row['image_url'], $row['price'], $row['category_id']);
                $product->product_id = $row['product_id'];
                $product->created_at = $row['created_at'];
                $product->updated_at = $row['updated_at'];
                $products[] = $product;
            }
        }
        return $products;
    }

    // count all products
    public static function countAllProducts() {
        $db = DB::getInstance();
        $sql = "SELECT COUNT(*) as total FROM products";
        $result = $db->query($sql);
        $total = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $total = $row['total'];
            }
        }
        return $total;
    }

    // update product
    public static function updateProduct($product){
        $db = DB::getInstance();
        $stmt =  $db->prepare("UPDATE products SET product_name = ?, description = ?, image_url = ?, price = ?, category_id = ? WHERE product_id = ?");
        $stmt->bind_param("sssdii", $product->product_name, $product->description, $product->image_url, $product->price, $product->category_id, $product->product_id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>
