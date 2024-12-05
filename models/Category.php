<?php
class Category {
    private $category_id;
    private $category_name;

    public function __construct($category_id, $category_name) {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
    }

    // Getter and Setter for category_id
    public function getCategoryId() {
        return $this->category_id;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    // Getter and Setter for category_name
    public function getCategoryName() {
        return $this->category_name;
    }

    public function setCategoryName($category_name) {
        $this->category_name = $category_name;
    }

    public static function getAll() {
        $db = DB::getInstance();
        $sql = "SELECT * FROM categories";
        $result = $db->query($sql);
        $categories = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $category = new Category($row['category_id'], $row['category_name']);
                $categories[] = $category;
            }
        }
        return $categories;
    }

    public static function get($id) {
        $db = DB::getInstance(); // Giả sử DB::getInstance() trả về kết nối MySQLi
        $result = $db->query("SELECT * FROM categories WHERE category_id = $id");

        $categories = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $category = new Category($row['category_id'], $row['category_name']);
                $categories[] = $category;
            }
        }
        return $categories;
    }

    // get category by id
    public static function getCategoryById($id) {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM categories WHERE category_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = null;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $category = new Category($row['category_id'], $row['category_name']);
            }
        }
        return $category;
    }
}
?>
