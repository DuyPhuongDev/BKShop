<?php
include_once('views/main/navbar.php');
?>
<!-- Blog List -->
<div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
          <h4 class="title-wrapper">
            <span>BÀI VIẾT MỚI NHẤT</span>
          </h4>
          <div class="row">
            <?php foreach ($newses as $news) { ?>
              <div class="row col-12 mb-3">
                <div class="col-md-3 mb-md-0 mb-2">
                  <img src="<?php echo $news->getImgUrl(); ?>" class="float-start" style="width: 100%;" alt="<?php echo $news->getTitle(); ?>">
                </div>
                <div class="col-md-9">
                  <div class="card-wrapper">
                    <h5 class="card-title mb-1"><a href="index.php?page=main&controller=detail_blog&action=index&id=<?php echo htmlspecialchars($news->getNewsId()) ?>"><?php echo $news->getTitle(); ?></a></h5>
                    <h6 class="card-sub-title mb-1">
                      <small><?php echo htmlspecialchars(date("F j, Y, g:i a", strtotime($news->getCreatedAt()))); ?></small>
                    </h6>
                    <p class="card-text mb-1"><?php echo substr($news->getContent(), 0, 150).'...'; ?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
      </div>
      <div class="col-md-4">
        <h4 class="title-wrapper">
          <span>KHUYẾN MÃI</span>
        </h4>
        <div class="row mx-auto">
        <?php foreach ($salesNews as $news) { ?>
              <div class="row col-12 mb-3">
                <div class="col-12">
                  <div class="card-wrapper">
                    <h5 class="card-title mb-1"><a href="index.php?page=main&controller=detail_blog&action=index&id=<?php echo htmlspecialchars($news->getNewsId()) ?>&topic=sales"><?php echo $news->getTitle(); ?></a></h5>
                    <h6 class="card-sub-title mb-1">
                      <span class="badge bg-secondary"><?php echo htmlspecialchars($news->getCreatedAt()); ?></span>
                    </h6>
                  </div>
                </div>
              </div>
            <?php } ?>
        </div>
      </div>
    </div>
    <div class="video-container mb-5">
      <iframe style="width:100%;" height="600" src="https://www.youtube.com/embed/Wbu8WzG8vkM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

</div>

<?php
include_once('views/main/footer.php');
?>