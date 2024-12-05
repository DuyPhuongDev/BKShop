
$("#dec-qtybtn").click(function () {
    var qty = parseInt($("#product-qty").val());
    if (qty > 1) {
        $("#product-qty").val(qty - 1);
    } else {
        $("#product-qty").val(1);
    }
});

$("#inc-qtybtn").click(function () {
    var qty = parseInt($("#product-qty").val());
    $("#product-qty").val(qty + 1);
});

$(".pd-size-choose .sc-item label").on('click', function () {
    $(".pd-size-choose .sc-item label").removeClass('active');
    $(this).addClass('active');
});

// zoom image
$(document).ready(function () {
    $('.product-pic-zoom').zoom(); // Áp dụng zoom cho ảnh
});

function addCart(productId) {
    // get size
    const scItems = Array.from(document.querySelectorAll('.sc-item')); // Chuyển NodeList thành mảng
    const activeSize = scItems.filter(item =>
        item.querySelector('label').classList.contains('active')
    );
    const msg = document.getElementById('msg');
    if (activeSize.length === 0) {
        // Kiểm tra xem thông báo đã có lớp 'show' chưa
        if (!msg.classList.contains('show')) {
            // Thêm class 'show' để hiển thị thông báo và áp dụng hiệu ứng rung
            msg.classList.add('show');
        }
        return;
    } else {
        // remove class show
        msg.classList.remove('show');
    }
    const size = activeSize[0].querySelector('input').value;
    console.log(size);

    // get qty
    const qty = document.getElementById('product-qty').value;
    console.log(qty);

    // product id
    console.log(productId);


    //window.location.href = 'index.php?page=main&controller=products&action=addtocart&productId=' + productId + '&size=' + size + '&qty=' + qty;

    // send data to server
    $.ajax({
        url: 'index.php?page=main&controller=products&action=addtocart',
        type: 'POST',
        data: {
            productId: productId,
            size: size,
            qty: qty
        },
        success: function (response) {
            response = JSON.parse(response);
            if (response.status === 401) {
                alert(response.message);
                window.location.href = 'index.php?page=main&controller=login&action=index';
            } else if (response.status === 200) {
                alert('Thêm sản phẩm vào giỏ hàng thành công');
                // update cart
                cartItems = response.data.cartItems;
                // render cart
                renderCart(cartItems);
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}