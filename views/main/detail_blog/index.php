<?php
include_once('views/main/navbar.php');
// tach content thanh nhieu phan
$docs = explode("\r\n", $news->getContent());
$id = intval($_GET['id']);
// foreach ($docs as $content) {
//     if(strpos($content, "-h4") !== false){
//         $content = str_replace("-h4", "", $content);
//     }
//     echo $content."<br>";
// }
?>
<div class="container my-5">
    <h1 class="article-title"><?php echo htmlspecialchars($news->getTitle()); ?></h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=main&controller=blog&action=index" style="color: #000; font-weight: 700">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
      </ol>
    </nav>
    <p class="article-meta"><?php echo htmlspecialchars(date("F j, Y, g:i a", strtotime($news->getCreatedAt()))); ?></p>
    <hr>
    <div class="row">
      <div class="article-content col-md-8">
          <?php foreach($docs as $doc):?>
            <?php if(strpos($doc, "-h4") !== false):?>
              <h4><?php echo str_replace("-h4", "", $doc);?></h4>
            <?php elseif($doc=="<img>") :?>
              <img src="<?php echo $news->getImgUrl(); ?>" class="img-fluid mb-2" alt="Responsive image">
            <?php else:?>
              <p><?php echo htmlspecialchars($doc); ?></p>
            <?php endif;?>
          <?php endforeach;?>
      </div>
      <?php if(isset($_GET['topic']) && $_GET['topic'] == 'sales'): ?>
        <div class="col-md-4 news-container">
          <div class="h3 ms-2 ms-md-0">Tin liên quan</div>
          <div class="row">
            <?php foreach ($salesNews as $news) { ?>
              <?php if ($news->getNewsId() == $id) continue; ?>
              <div class="row col-12 mx-auto mb-md-3">
                <div class="col-4">
                  <img style="width:100%" class="float-start" src="<?php echo $news->getImgUrl(); ?>" alt="<?php echo $news->getNewsId(); ?>">
                </div>
                <div class="col-8">
                  <div class="card-wrapper">
                    <h5 class="card-title mb-1"><a href="index.php?page=main&controller=detail_blog&action=index&id=<?php echo htmlspecialchars($news->getNewsId()) ?>&topic=sales"><?php echo $news->getTitle(); ?></a></h5>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php else: ?>
        <div class="col-md-4 comment-site">
          <div class="h3 ms-3">Bình luận</div>
          <div>
            <?php if (count($comments) > 0): ?>
                <ul class="list-group" id="list-cmt" data-id="<?php echo $id; ?>">
                    <?php foreach($comments as $cmt): ?>
                        <li class="list-group-item">
                            <strong class="me-2"><?php echo htmlspecialchars($cmt->getUser()->getFullName()); ?></strong> 
                            <small class="text-muted"><?php echo $cmt->getCreatedAt(); ?></small>
                            <p><?php echo nl2br(htmlspecialchars($cmt->getContent())); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Chưa có bình luận nào.</p>
            <?php endif; ?>
          </div>

          <div class="mt-3 mx-3">
            <form action="index.php?page=main&controller=detail_blog&action=comment" method="post">
              <input type="hidden" name="news_id" value="<?php echo $news->getNewsId(); ?>">
              <div class="mb-3">
                <label for="content" class="form-label">Bình luận</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
          </div>
        </div>
      <?php endif; ?>
    </div>
</div>


<?php
include_once('views/main/footer.php');
?>