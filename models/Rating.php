<?php
require_once("./Enum.php");
class Ratings {
    private $rating_id;
    private $user_id;
    private $product_id;
    private $content;
    private $rating;
    private $created_at;
    private RatingsStatusEnum $status;

    public function __construct($rating_id, $user_id, $product_id, $content, $rating, $created_at, RatingsStatusEnum $status) {
        $this->rating_id = $rating_id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->content = $content;
        $this->rating = $rating;
        $this->created_at = $created_at;
        $this->status = $status;
    }

    public function save() {
        // Save or update rating in database
    }

    public function delete() {
        // Delete rating from database
    }
}
?>
