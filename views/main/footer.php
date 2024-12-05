<footer class="bg-dark text-light pt-5 pb-4">
    <div class="container text-center text-md-start">
        <div class="row">
            <!-- Company Information -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                <h5 class="text-uppercase fw-bold text-danger">BKSHOP Co.</h5>
                <p>+84 3213352126</p>
                <p>BKshop@hcmut.edu.vn</p>
                <p>Đông Hoà, Dĩ An, Bình Dương</p>
                <div class="mt-3">
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>

            <!-- Information Links -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Information</h6>
                <p><a href="#" class="text-light text-decoration-none">About Us</a></p>
                <p><a href="#" class="text-light text-decoration-none">Contact</a></p>
                <p><a href="#" class="text-light text-decoration-none">Privacy Policy</a></p>
            </div>

            <!-- Account Links -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Account</h6>
                <p><a href="#" class="text-light text-decoration-none">Shopping Cart</a></p>
                <p><a href="#" class="text-light text-decoration-none">Check Out</a></p>
            </div>

            <!-- Newsletter -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase fw-bold">Keep in touch</h6>
                <p>Get E-mail updates about our latest special offers.</p>
                <form class="d-flex">
                    <input type="email" class="form-control me-2" placeholder="Enter Your Mail">
                    <button class="btn btn-danger" type="submit">SUBSCRIBE</button>
                </form>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery Zoom -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
<script src="<?php echo $folderPath."/script.js" ?>"></script>
<script> 
    var cartItems = <?php echo json_encode($data['cartItems']); ?>;
    if (cartItems === null) {
        cartItems = [];
    }
    function renderCart(cartItems){
        $("#product-list").html('');
        html = '';
        totalPrice = 0;
        cartItems.forEach(item => {
            console.log(item);
            html += `
                <tr>
                    <td class="si-pic">
                    <img src="${item.image}" alt="${item.productName}" style="max-height:70px">
                    </td>
                    <td class="si-text">
                        <div class="product-selected">
                        <h6>${item.productName.length > 20 ? item.productName.slice(0, 20) + '...' : item.productName}</h6>
                        <span>Size: ${item.size}</span>
                        <p>${new Intl.NumberFormat('vi-VN').format(item.price)} vnđ X ${item.quantity}</p>
                        </div>
                    </td>
                    <td class="si-close">
                        <!-- <a href="index.php?page=main&controller=cart&action=deleteItem&id=${item.cartItemId}"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a> -->
                        <button class="btn deleteBtn" data-id="${item.cartItemId}"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button>
                    </td>
                </tr>
            `;
            totalPrice += item.price * item.quantity;
        });
        $("#product-list").append(html);
        // console.log(totalPrice);
        // console.log($("#total-price"));
        $("#total_price").text(new Intl.NumberFormat('vi-VN').format(totalPrice) + " VNĐ");
    }

    $(document).ready(function(){
        renderCart(cartItems);
    });

    
    $(document).on('click', '.deleteBtn', function(event) {
        event.preventDefault();
        var cartItemId = $(this).data('id'); // Lấy data-id từ nút bấm
        console.log(cartItemId);
        $.ajax({
            url: 'index.php?page=main&controller=cart&action=deleteItem&id=' + cartItemId,
            type: 'GET',
            success: function(response) {
                response = JSON.parse(response);
                if (response.status === 200) {
                    // Tải lại giỏ hàng sau khi xóa
                    cartItems = cartItems.filter(item => item.cartItemId !== cartItemId); // Cập nhật cartItems
                    renderCart(cartItems); // Render lại giỏ hàng
                } else {
                    alert('Xoá thất bại');
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
</script>
</body>
</html>