<?php
require_once('connection.php');
require_once('models/User.php');
require_once('models/News.php');
class Comment {
    private $comment_id;
    private $content;
    private $status;
    private $created_at;
    private $user;
    private $news;

    public function __construct($content, $status) {
        $this->content = $content;
        $this->status = $status;
    }

    // Getters and Setters
    public function getCommentId() {
        return $this->comment_id;
    }

    public function setCommentId($comment_id) {
        $this->comment_id = $comment_id;
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

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getNews() {
        return $this->news;
    }

    public function setNews($news) {
        $this->news = $news;
    }

    // toString
    public function __toString() {
        return "Comment: [comment_id: {$this->comment_id}, content: {$this->content}, status: {$this->status}, created_at: {$this->created_at}]";
    }

    public static function getAll()
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM comment ORDER BY created_at DESC;");
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = [];
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $comment) {
            $item = new Comment($comment['content'], $comment['status']);
            $item->setCommentId($comment['comment_id']);
            $item->setCreatedAt($comment['created_at']);
            $user = User::getUserById($comment['user_id']);
            $news = News::getNewsById($comment['news_id']);
            $item->setUser($user);
            $item->setNews($news);
            $comments[] = $item;
        }
        return $comments;
    }

    // get comment by news
    public static function getCommentsByNewsId($newsId){
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM comment WHERE news_id = ? ORDER BY created_at DESC;");
        $stmt->bind_param("i", $newsId);
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = [];
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $comment) {
            $item = new Comment($comment['content'], $comment['status']);
            $item->setCommentId($comment['comment_id']);
            $item->setCreatedAt($comment['created_at']);
            $user = User::getUserById($comment['user_id']);
            $news = News::getNewsById($comment['news_id']);
            $item->setUser($user);
            $item->setNews($news);
            $comments[] = $item;
        }
        return $comments;
    }

    // static function getCommentByUser($user_id)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("SELECT 
    //     C.comment_id AS comment_id,
    //     C.created_at AS created_at,
    //     C.content AS content,
    //     C.news_id AS news_id,
    //     C.user_id AS user_id,
    //     N.title AS title,
    //     U.fname AS fname,
    //     U.lname AS lname,
    //     C.status AS status
    //     FROM comment AS C, user AS U, news AS N WHERE C.news_id = N.news_id AND C.user_id = U.email AND C.user_id = $user_id ORDER BY C.created_at DESC;");
    //     $comments = [];
    //     foreach ($req->fetch_all(MYSQLI_ASSOC) as $comment) {
    //         $comments[] = new Comment(
    //             $comment['comment_id'],
    //             $comment['created_at'],
    //             $comment['content'],
    //             $comment['news_id'],
    //             $comment['user_id'],
    //             $comment['title'],
    //             $comment['fname'] . ' ' . $comment['lname'],
    //             $comment['status']
    //         );
    //     }
    //     return $comments;
    // }


    public static function insert($content, $news_id, $username)
    {
        //$approved = true;
        $db = DB::getInstance();
        $user = User::getUserByUsername($username);
        $news = News::getNewsById($news_id);
        $stmt = $db->prepare(
            "INSERT INTO comment (content, news_id, user_id) VALUES (?, ?, ?);"
        );
        $stmt->bind_param("sis", $content, $news_id, $user->getUserId());
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // static function reply($content, $news_id, $user_id)
    // {
    //     $approved = true;
    //     $db = DB::getInstance();
    //     $req = $db->query(
    //         "
    //         INSERT INTO comment (created_at, content, news_id, user_id)
    //         VALUES (NOW(), '$content', $news_id, '$user_id')
    //         ;"
    //     );
    //     return $req;
    // }

    // static function getReply($id)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("SELECT 
    //     C.comment_id AS comment_id,
    //     C.created_at AS created_at,
    //     C.content AS content,
    //     C.news_id AS news_id,
    //     C.user_id AS user_id,
    //     N.title AS title,
    //     U.fname AS fname,
    //     U.lname AS lname,
    //     C.status AS status
    //     FROM comment AS C, user AS U, news AS N WHERE C.news_id = N.news_id AND C.user_id = U.email;");
    //     $replies = [];
    //     foreach ($req->fetch_all(MYSQLI_ASSOC) as $reply) {
    //         $replies[] = new Comment(
    //             $reply['comment_id'],
    //             $reply['created_at'],
    //             $reply['content'],
    //             $reply['news_id'],
    //             $reply['user_id'],
    //             $reply['title'],
    //             $reply['fname'] . ' ' . $reply['lname'],
    //             $reply['status']
    //         );
    //     }
    //     return $replies;
    // }

    // static function delete($id)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("DELETE FROM comment WHERE comment_id = $id;");
    //     return $req;
    // }

    // static function update($id, $content)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("UPDATE comment SET content = '$content' WHERE comment_id = $id;");
    //     return $req;
    // }

    // static function block($id)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("UPDATE comment SET status = 'hidden' WHERE comment_id = $id;");
    //     return $req;
    // }

    // static function unblock($id)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("UPDATE comment SET status = 'visible' WHERE comment_id = $id;");
    //     return $req;
    // }
}
?>
