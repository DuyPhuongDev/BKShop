<?php
require_once('models/Category.php');
require_once('./connection.php');
include_once('views/main/navbar.php');
?>
<main>
   <div class="container">
      <!-- Breadcrumb Section Begin -->
      <div class="breacrumb-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="breadcrumb-text">
                     <a href="index.php"><i class="fa fa-home"></i> Home</a>
                     <a href="index.php?page=main&controller=products&action=index">Shop</a>

                     <?php

                     if (isset($link)) {
                        echo "<span> {$link[0]->getCategoryName()} </span>";
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <section class="product-shop spad">
         <div class="container">
            <div class="row">
               <div class="d-none d-md-block col-lg-3 col-md-12 col-sm-8 order-1 order-lg-1 produts-sidebar-filter">
                  <div class="filter-widget">
                     <h4 class="fw-title">Danh mục</h4>
                     <ul class="filter-catagories ">
                        <a href="index.php?page=main&controller=products&action=index">
                           <li class="hovclass"> Tất cả </li>
                        </a>
                        <?php
                        if (!empty($p_cat)) {
                           foreach ($p_cat as $p_cat_items) {
                              echo '<a href="index.php?page=main&controller=products&action=index&cat_id=' . $p_cat_items->getCategoryId() . '">
                                       <li class="hovclass">' . $p_cat_items->getCategoryName() . '</li>
                                    </a>';
                           }
                        } else {
                           echo '<a href="index.php?page=main&controller=products&action=index&cat_id=' . $p_cat_items->getCategoryId() . '">
                                    <li class="hovclass">' . $p_cat_items->getCategoryName() . '</li>
                                 </a>';
                        }
                        ?>

                     </ul>
                  </div>
               </div>


               <div class="col-lg-9 col-md-12 order-2 order-lg-2">
                  <div class="product-list">
                     <div class="row">
                        <?php foreach ($products as $product) : ?>
                           <div class='col-lg-4 col-sm-6'>
                              <div class='product-item'>
                                 <div class='pi-pic' style='max-height:350px'>
                                    <img src='<?php echo $product->getImageUrl() ?>' alt='$product_title'
                                       style="width: 100px; object-fit: cover; object-position: center;">

                                    <ul>
                                       <li class='quick-view'>
                                          <a href="index.php?page=main&controller=products&action=viewdetail&id=<?php echo $product->getProductId(); ?>"
                                             style="background:#fe4231; color:white;">Xem chi tiết</a>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class='pi-text'>
                                    <div class='catagory-name'></div>
                                    <a href='product.php?product_id=$products_id'>
                                       <h5><?php echo htmlspecialchars($product->getProductName()); ?></h5>
                                    </a>
                                    <div class='product-price'>
                                       <?php echo number_format($product->getPrice(), 0, ',', '.') . " VND"; ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
      </section>
   </div>
</main>

<?php
include_once('views/main/footer.php');
?>