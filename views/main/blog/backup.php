<?php
include_once('views/main/navbar.php');
?>

  <section id="blog" class="mt-2">
    <div class="text-center fs-2 fw-bold">TIN TỨC</div>
      <div class="container mt-2">
        <div class="row">
          <div class="col-lg-12" id="new">

            <?php foreach ($newses as $news): ?>
                <!-- <li class="card-subtitle"><i class="bi bi-chat-dots"> </i>' . count($news->comments) . ' Bình luận</li> -->
                  <article class="card mb-5">
                    <div class="row mx-2">
                        <div class="col-9">
                            <h6 class="card-title mt-3 fw-bold">
                            <a class="text-dark" href="index.php?page=main&controller=detail_blog&id=<?php echo $news->getNewsId(); ?>&action=index"><?php echo $news->getTitle(); ?></a>
                            </h6>
                            <div class="card-subtitle mt-2 text-muted">
                                <small>
                                    <ul style="list-style-type: square">
                                        <li class="card-subtitle"><i class="bi bi-clock"></i> <time><?php echo date("F j, Y, g:i a", strtotime($news->getCreatedAt())); ?></time></li>
                                        <li class="card-subtitle"><i class="bi bi-clock-history"></i> <time><?php echo date("F j, Y, g:i a", strtotime($news->getUpdatedAt())); ?></time></li>
                                        
                                    </ul>
                                </small>
                            </div>
                        </div>
                        <div class="col-3 text-center mt-3">
                            <a class="btn btn-dark" href="index.php?page=main&controller=detail_blog&id=<?php echo $news->getNewsId(); ?>&action=index">Bình luận</a>
                        </div>
                    </div>
                    <div class="mx-3 mb-3">
                      <div class="fs-6 justify-content">
                          <?php echo str_replace("\r\n", "<br>", $news->getContent()); ?>
                      </div>
                  </div>
                </article><!-- End blog entry -->
              <?php endforeach; ?>
            ?>
          </div>

        </div>
      </div>
  </section>

<?php
include_once('views/main/footer.php');
?>