
$(document).ready(function () {
    var orders = $('#list-orders').data('orders');
    html = '';
    orders.forEach((order, index) => {
        price = new Intl.NumberFormat('vi-VN').format(order.total) + " VNĐ";
        method = order.payment_method == "COD" ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng';
        orderStatus = order.status === "Đang vận chuyển" ? '<span class="badge bg-warning text-dark">Đang vận chuyển</span>' : '<span class="badge bg-success">Đã giao hàng</span>';
        html += `
            <tr>
                <td>${index + 1}</td>
                <td>ORD${order.payment_id}</td>
                <td>${order.payment_date}</td>
                <td>${price}</td>
                <td>${method}</td>
                <td>${orderStatus}</td>
            </tr>
        `;
    });
    $('#list-orders').html(html);
});

// handle edit user
$(document).on('click', '#btn-edit-user', function () {
    let userId = $(this).data('id');
    let fullName = $(this).data('fullname');
    let email = $(this).data('email');
    let phone = $(this).data('phone');
    let address = $(this).data('address');
    // gan gia tri vao form
    $('#editUserForm #editUserId').val(userId);
    $('#editUserForm #editfullName').val(fullName);
    $('#editUserForm #editemail').val(email);
    $('#editUserForm #editphone').val(phone);
    $('#editUserForm #editaddress').val(address);
});

$('#editUserForm').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: 'index.php?page=main&controller=account&action=edit',
        method: 'POST',
        data: formData,
        processData: false, // Tắt xử lý dữ liệu mặc định
        contentType: false, // Để trình duyệt tự động thiết lập
        success: function (response) {
            var response = JSON.parse(response); // convert string to json
            console.log(response);
            if (response.status == 200) {
                window.location.reload();
            } else {
                console.log(response.message);
            }
        },
        error: function () {
            showToastError("Có lỗi xảy ra");
        }
    })
});