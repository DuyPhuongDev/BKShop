<?php
require_once('connection.php');
class News {
    private $news_id;
    private $title;
    private $topic;
    private $content;
    private $img_url;
    private $status;
    private $created_at;
    private $updated_at;

    public function __construct($title, $topic, $content, $img_url, $status) {
        $this->title = $title;
        $this->topic = $topic;
        $this->content = $content;
        $this->img_url = $img_url;
        $this->status = $status;
    }

    
    // Getters and Setters
    public function getNewsId() {
        return $this->news_id;
    }

    public function setNewsId($news_id) {
        $this->news_id = $news_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTopic() {
        return $this->topic;
    }

    public function setTopic($topic) {
        $this->topic = $topic;
    }

    public function getImgUrl() {
        return $this->img_url;
    }

    public function setImgUrl($img_url) {
        $this->img_url = $img_url;
    }
    
    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    // toString
    public function __toString() {
        return $this->news_id . " - " . $this->title . ' - ' . $this->content . ' - ' . $this->status . ' - ' . $this->topic . ' - ' . $this->img_url;
    }

    // Get all news
    public static function getAll() {
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM news ORDER BY created_at DESC');

        $list = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $item) {
            $news = new News($item['title'], $item['topic'], $item['content'], $item['img_url'], $item['status']);
            $news->setNewsId($item['news_id']);
            $news->setCreatedAt($item['created_at']);
            $news->setUpdatedAt($item['updated_at']);
            $list[] = $news;
        }
        return $list;
    }

    // Get news by topic
    public static function getNewsByTopic($topic) {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM news WHERE topic = ? ORDER BY created_at DESC LIMIT 5");
        $stmt->bind_param("s", $topic);
        $stmt->execute();
        $result = $stmt->get_result();
        $list = [];
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $item) {
            $news = new News($item['title'], $item['topic'], $item['content'], $item['img_url'], $item['status']);
            $news->setNewsId($item['news_id']);
            $news->setCreatedAt($item['created_at']);
            $news->setUpdatedAt($item['updated_at']);
            $list[] = $news;
        }
        return $list;
    }

    // Get news by id
    public static function getNewsById($news_id) {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM news WHERE news_id = ?");
        $stmt->bind_param("i", $news_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $news = null;
        if ($result->num_rows > 0) {
            $item = $result->fetch_assoc();
            $news = new News($item['title'], $item['topic'], $item['content'], $item['img_url'], $item['status']);
            $news->setNewsId($item['news_id']);
            $news->setCreatedAt($item['created_at']);
            $news->setUpdatedAt($item['updated_at']);
        }
        return $news;
    }

    // save news
    public static function save($title, $topic, $content, $img_url, $status) {
        $db = DB::getInstance();
        $stmt = $db->prepare("INSERT INTO news (title, topic, content, img_url, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $topic, $content, $img_url, $status);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // update news
    public static function updateNews($news){
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE news SET title = ?, topic = ?, content = ?, img_url = ?, status = ? WHERE news_id = ?');    
        $stmt->bind_param("sssssi", $news->getTitle(), $news->getTopic(), $news->getContent(), $news->getImgUrl(), $news->getStatus(), $news->getNewsId()); 
        $stmt->execute();   
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // delete news by id
    public static function deleteNews($news_id) {
        $db = DB::getInstance();
        $stmt = $db->prepare("DELETE FROM news WHERE news_id = ?");
        $stmt->bind_param("i", $news_id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
?>
