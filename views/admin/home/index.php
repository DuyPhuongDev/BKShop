<?php 
 //print_r($data['revenueOf6Months']);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="views/admin/home/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/6fc5ccf10e.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header-section">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mx-auto" href="#">Admin Page</a>
                <?php if (!isset($_SESSION['username'])): ?>
                    <div class="login me-2">
                        <a href="index.php?page=main&controller=login&action=index" class="text-dark" style="text-decoration: none;"><i class="fas fa-user"></i> Login</a>
                    </div>
                <?php else: ?>
                    <div class="logout me-2">
                        <a href='index.php?page=main&controller=login&action=logout' class="text-light btn btn-danger" style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <div class="container-fluid row">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar collapse d-lg-block bg-light col-2">
            <div class="sidebar-header text-center mt-5">
                <span><i class="fa-solid fa-circle-user fa-2xl"></i></span>
                <h3>Admin</h3>
            </div>
            <div class="list-group list-group-flush">
                <a href="index.php?page=admin&controller=dashboard&action=index" class="list-group-item list-group-item-action"><i class="fa-solid fa-house"></i> Dashboard</a>
                <a href="index.php?page=admin&controller=user&action=index" class="list-group-item list-group-item-action"><i class="fa-solid fa-users"></i> Quản lý tài khoản</a>
                <a href="index.php?page=admin&controller=product&action=index" class="list-group-item list-group-item-action"><i class="fa-solid fa-cart-shopping"></i> Quản lý sản phẩm</a>
                <a href="index.php?page=admin&controller=news&action=index" class="list-group-item list-group-item-action"><i class="fa-solid fa-newspaper"></i> Quản lý bài viết</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="container-fluid p-4 col-10">
            <h1 class="text-center">Welcome to the Admin Dashboard</h1>
            <!-- Statistics Cards -->
            <div class="row my-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Doanh thu</h5>
                            <p class="card-text fs-3"><?php echo number_format($data['revenue'], 0, ',', '.') . " VND"; ?></p>
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Tổng sản phẩm</h5>
                            <p class="card-text fs-3"><?php echo number_format($data['totalProduct'], 0, ',', '.'); ?></p>
                            <i class="fas fa-tshirt fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Đơn hàng mới</h5>
                            <p class="card-text fs-3"><?php echo number_format($data['totalOrder'], 0, ',', '.'); ?></p>
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Số lượnh thành viên</h5>
                            <p class="card-text fs-3"><?php echo number_format($data['totalUser'], 0, ',', '.'); ?></p>
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sales Overview</h5>
                            <canvas id="salesChart" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Top Products</h5>
                            <canvas id="topProductsChart" width="500" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danh Sách Đơn Hàng -->
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5>Danh Sách Đơn Hàng</h5>
                </div>
                <div class="card-body">
                    <table id="table-orders" class="table table-bordered table-striped">
                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày Đặt</th>
                                <th>Tổng Tiền</th>
                                <th>Phương thức thanh toán</th>
                                <th>Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody id="list-orders" data-orders='<?php echo json_encode($data['orders']); ?>'>
                            <!-- data in here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <?php require_once 'views/admin/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2Ee6IS/Q9KNy0xk5LRQnv6pPbP4mxlc1ZZ8jn4rJ7DLVxFqPOsmPU9YfUCr" crossorigin="anonymous"></script>
    <!-- Include Chart.js Library -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var revenueOf6Months = <?php echo json_encode($data['revenueOf6Months']); ?>;
        console.log(revenueOf6Months);
        const salesData = {
            labels: revenueOf6Months.map(item => item.month),
            datasets: [{
                label: 'Doanh thu (VND)',
                data: revenueOf6Months.map(item => item.total_revenue),
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const salesConfig = {
            type: 'bar',
            data: salesData,
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Monthly Sales Overview' }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        };

        const salesChart = new Chart(
            document.getElementById('salesChart'),
            salesConfig
        );


        // Data for the chart
        const productData = {
            labels: ['T-shirt', 'Jeans', 'Jacket', 'Shoes', 'Hats'], // Product names
            datasets: [{
                label: 'Units Sold',
                data: [150, 200, 120, 170, 90], // Units sold for each product
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', // T-shirt
                    'rgba(54, 162, 235, 0.2)', // Jeans
                    'rgba(255, 206, 86, 0.2)', // Jacket
                    'rgba(75, 192, 192, 0.2)', // Shoes
                    'rgba(153, 102, 255, 0.2)'  // Hats
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Configuration for the chart
        const productConfig = {
            type: 'line', // Doughnut chart
            data: productData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top', // Legend position
                    },
                    title: {
                        display: true,
                        text: 'Top Products Performance' // Title text
                    }
                }
            }
        };

        // Render the chart
        const topProductsChart = new Chart(
            document.getElementById('topProductsChart'),
            productConfig
        );

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
         

        // datatables
        $('#table-orders').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "dom": '<"row mb-3"<"col-md-6"l><"col-md-6"f>>' +
                       'rt' +
                       '<"row my-2"<"col-md-6"i><"col-md-6"p>>',
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ hàng",
                    "info": "Đang hiển thị _START_ đến _END_ trong tổng số _TOTAL_ hàng",
                    "infoEmpty": "Không có dữ liệu",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": "Tiếp",
                        "previous": "Trước"
                    },
                    "search": "Tìm kiếm:"
                }
            });

            // Thay đổi các tùy chọn trong dropdown lengthChange
            $('#table-orders_length select')
                .empty() // Xóa các tùy chọn hiện tại
                .append('<option value="5">5</option>') // Thêm các tùy chọn mới
                .append('<option value="10">10</option>')
                .append('<option value="15">15</option>')
                .append('<option value="20">20</option>');

            // Thiết lập giá trị mặc định là 20
            $('#table-orders_length select').val('10');
        });
    </script>
</body>
</html>
