<?php
require_once('controllers/admin/base_controller.php');
require_once('models/News.php');
class NewsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'news';
    }
    public function index()
    {
        session_start();
        $newslist = News::getAll();
        $data = array('newses' => $newslist);
        $this->render('index', $data);
    }
    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['news-title'];
            $topic = $_POST['news-topic'];
            $content = $_POST['content'];
            $image = $_FILES['image-url'];
            $status = $_POST['status'];
            $target_dir = "public/img/news/";
            $fileName = $_FILES['image-url']['name'];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            //echo $fileType;
            // genearte filename
            $fileId = (string)date("Y_m_d_h_i_sa") . "." . $fileType;
            //echo $fileId;
            $target_url = $target_dir.basename($fileId);
            echo $target_url;
            if (file_exists($target_url)) {
                echo "Sorry, file already exists.";
            }
            // Check file type
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            if(!move_uploaded_file($_FILES["image-url"]["tmp_name"], $target_url)) {
                echo "Sorry, there was an error uploading your file.";
            }

            $res = News::save($title, $topic, $content, $target_url, $status);
            if($res){
                echo "
                <script>
                    alert('Thêm bài viết thành công!');
                    window.location.replace('index.php?page=admin&controller=news&action=index');
                </script>";
            }else{
                echo "
                <script>
                    alert('Thêm bài viết thất bại!');
                    window.location.replace('index.php?page=admin&controller=news&action=add');
                </script>";
            }
        }else{
            $this->index();
        }
    }
    public function edit()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['news-id'];
            $title = $_POST['news-title'];
            $topic = $_POST['news-topic'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $news = News::getNewsById(intval($id));
            // set new values
            $news->setTitle($title);
            $news->setTopic($topic);
            $news->setContent($content);
            $news->setStatus($status);
            // update
            $res = News::updateNews($news);
            $data = ['news_id' => $news->getNewsId(), 'title' => $news->getTitle(), 'topic' => $news->getTopic(), 'content' => $news->getContent(), 'status' => $news->getStatus()];
            if($res){
                echo json_encode(array('status' => 200, 'message' => 'Sửa bài viết thành công!', 'data' => $data));
            }else{
                echo json_encode(array('status' => 500, 'message' => 'Sửa bài viết thất bại!'));
            }
        }else{
            echo json_encode(array('status' => 400, 'message' => 'Yêu cầu không hợp lệ!'));
        }
    }
    public function delete()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['news-id'];
            $res = News::deleteNews(intval($id));
            if($res){
                echo json_encode(array('status' => 200, 'message' => 'Xoá bài viết thành công!', 'data' => $id));
            }else{
                echo json_encode(array('status' => 500, 'message' => 'Xoá bài viết thất bại!'));
            }
        }else{
            echo json_encode(array('status' => 400, 'message' => 'Yêu cầu không hợp lệ!'));
        }
    }
}
?>