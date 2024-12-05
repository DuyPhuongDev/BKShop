<?php
  require_once('views/main/navbar.php');
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active align-center">
            <img src="public/img/slides/slide1.png" class="d-block w-100 imageChance" alt="banner1">
            </div>
            <div class="carousel-item">
            <img src="https://i.pinimg.com/564x/54/a5/b2/54a5b213c3887a3459fe22b83a474e8c.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
            <img src="https://i.pinimg.com/564x/09/bc/a9/09bca94d568f6985f23c1586eb3c33b4.jpg" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
</div>

<section class="topProduct-banner spad container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" style ="padding-top: 40px;">
                <div class="filter-control">
                </div>
                <div class="product-slider owl-carousel">
                <?php foreach($products as $product) : ?>
                    <div class='product-item d-none d-md-block' style="height: 500px;">
                        <div class='pi-pic' style='max-height:300px'>
                            <img src='<?php echo htmlspecialchars($product->getImageUrl()); ?>' alt='<?php echo htmlspecialchars($product->getProductName()); ?>' style='height: 300px'>
                        </div>
                        <div class='pi-text'>
                            <a href='#'>
                                <h5><?php echo htmlspecialchars($product->getProductName()); ?></h5>
                            </a>
                            <div class='product-price'>
                                <?php echo number_format($product->getPrice(), 0, ',', '.') . " VND"; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1"  style ="padding-top: 30px;">
                <div class="product-large set-bg m-large">
                    <h2 style ="color:white;font-size: xxx-large;">Some Product</h2>
                    <a href="index.php?page=main&controller=products&action=index"style="font-size: xx-large;">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
  require_once('views/main/footer.php');
?>
