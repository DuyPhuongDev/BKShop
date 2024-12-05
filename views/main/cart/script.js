function showCartItem(cartItems) {
    html = '';
    if (cartItems.length == 0) {
        html = `<div class='card col-md-3 col-10' style='margin:0 auto; border-radius:25px 5px;box-shadow: inset -12px -8px 40px #e5e5e5;'>
                    <div class='card-body'>
                    <h5 style='text-align:center;font-weight:500'> Hiện tại không có sản phẩm nào trong giỏ hàng </h5>
                    </div>
                </div>
            `;
        $("#cart-empty").html(html);
    } else {
        cartItems.forEach(item => {
            let price = new Intl.NumberFormat('vi-VN').format(item.price) + " VNĐ";
            let pro_total_p = new Intl.NumberFormat('vi-VN').format(item.price * item.quantity) + " VNĐ";
            html += `
            <tr style='border-bottom: 0.5px solid #ebebeb'>
                <td class='cart-pic first-row'><img src='${item.image}' alt='${item.productName}' style='max-height:100px'></td>
                <td class='cart-title first-row'>
                    <h5><a href='index.php?page=main&controller=products&action=viewdetail&id=${item.productId}' style='color:black;font-weight:bold'>${item.productName}</h5>
                </td>
                <td class='p-price first-row'>${price}</td>
                <td class='qua-col first-row'>
                ${item.quantity}
                </td>
                <td class='p-size first-row h5'>${item.size}</td>
                <td class='total-price first-row'>${pro_total_p}</td>
                <td class='close-td first-row'><a href='shopping-cart.php?del=$pro_id'><i class='ti-close' style='color:black'></i></a></td>
            </tr>
            `;
        });
        $('#list-cart-items').html(html);
    }

}

$(document).ready(function () {
    showCartItem(cartItems);
});
$("#btn-payment").on("click", function (e) {
    e.preventDefault();
    cartItemsId = [];
    totalPrices = 0;
    paymentMethod = $("#paymentMethod").val();
    cartItems.forEach(item => {
        cartItemsId.push(item.cartItemId);
        totalPrices += item.price * item.quantity;
    });
    console.log(cartItemsId);
    $.ajax({
        url: "index.php?page=main&controller=cart&action=makepayment",
        type: "POST",
        data: {
            cartItemsId: JSON.stringify(cartItemsId),
            paymentMethod: paymentMethod,
            totalPrices: totalPrices
        },
        success: function (response) {
            response = JSON.parse(response);
            console.log(response);
            if (response.status == 200) {
                if (paymentMethod == '2')
                    window.location.href = response.data;
                //window.open(response.data, "_blank");
                else {
                    alert("Đặt hàng thành công");
                    window.location.href = "index.php?page=main&controller=products&action=index";
                }
            } else {
                alert("Đặt hàng thất bại");
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});