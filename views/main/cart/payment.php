<?php require_once('views/main/navbar.php'); 
    $user = $data['user'];
?>
<div class="container mt-5">
    <div class="address-card">
        <div class="address-header">
            <i class="bi bi-geo-alt-fill"></i>
            Địa Chỉ Nhận Hàng
        </div>
        <div class="address-details d-flex">
            <div class="user-info me-4">
                <span><?php echo htmlspecialchars($user->getFullName()." (+84) ".$user->getPhone());?></span>
            </div>
            <div class="addr-info">
                <span><?php echo htmlspecialchars($user->getAddress());?></span>
            </div>
            <div class="addr-change">
                <span class="default-badge">Mặc Định</span>
            </div>
        </div>
    </div>

    <div class="cart-info">
        <div class="cart-header">
            <i class="bi bi-cart"></i>
            Sản phẩm
        </div>
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
    </div>

    <div class="payment-card mt-4">
        <div class="payment-header">
            <i class="bi bi-credit-card-fill"></i>
            Phương Thức Thanh Toán
        </div>
        <div class="mb-3">
            <select class="form-select rounded" id="paymentMethod">
                <option selected value="1">Thanh toán khi nhận hàng (COD)</option>
                <option value="2">Chuyển khoản ngân hàng</option>
            </select>
        </div>
        <div class="payment-footer d-flex justify-content-end">
            <div class="submit-payment">
                <div class="total-price" id="total-price">Tổng tiền: <span> <?php echo number_format($data['total'], 0, ',', '.') . " VND"; ?></span></div>
                <button class="btn btn-custom" id="btn-payment">ĐĂT HÀNG</button>
            </div>
        </div>
    </div>
</div>
<?php require_once('views/main/footer.php'); ?>