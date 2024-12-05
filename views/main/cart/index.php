<?php require_once('views/main/navbar.php'); ?>
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table" style="min-height: 150px;">
                    <table>
                        <thead style='font-size: larger;'>
                            <tr>
                                <th>Hình ảnh</th>
                                <th class='p-name'>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Kích cỡ</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead> 
                        <tbody id="list-cart-items">
                        </tbody>
                    </table>
                    <div id="cart-empty" class="mt-3"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="index.php?page=main&controller=products&action=index" class="primary-btn continue-shop">Tiếp tục mua sắm</a>
                        </div>

                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="cart-total">Total <span><?php echo number_format($data['total'], 0, ',', '.') . " VND"; ?></span> </li>
                            </ul>
                            <a href="index.php?page=main&controller=cart&action=payment" class="proceed-btn">XÁC NHẬN THANH TOÁN</a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
<?php require_once('views/main/footer.php'); ?>