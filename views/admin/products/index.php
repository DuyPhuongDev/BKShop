<?php
    $products = $data['products'];
    $categories = $data['categories'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="views/admin/home/style.css">
    <script src="https://kit.fontawesome.com/6fc5ccf10e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .cell {
            max-width: 150px;         /* Đặt chiều rộng tối đa cho ô */
            white-space: nowrap;      /* Không xuống dòng */
            overflow: hidden;         /* Ẩn phần nội dung thừa */
            text-overflow: ellipsis;  /* Thêm dấu ... nếu nội dung quá dài */
        }
    </style>
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
        <main class="content-wrapper col-10 mb-2">
            <section class="content-header">
                <div class="container-fluid">
                    <!-- <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
                        </ol>
                    </div> -->
                    <div class="container-fluid row">
                        <div class="my-2">
                            <p class="row">
                            <h1 class="text-center">Quản lý Sản phẩm</h1>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <hr>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="shadow p-2 rounded">
                            <?php 
                                require_once 'views/admin/products/addProductDialog.php';
                                require_once 'views/admin/products/editProductDialog.php';
                                require_once 'views/admin/products/deleteProductDialog.php';
                            ?>
                            <!-- table -->
                            <table id="table-product" class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope="col" class="d-none d-lg-table-cell">STT</th>
                                        <th scope="col" >Tên sản phẩm</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Giá</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Loại</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Mô tả</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Hình ảnh</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $key => $product) : ?>
                                        <tr class="text-center">
                                            <td class="d-none d-lg-table-cell"><?php echo $key + 1; ?></td>
                                            <td class="cell"><?php echo $product->getProductName(); ?></td>
                                            <td class="d-none d-lg-table-cell"><?php echo number_format($product->getPrice(), 0, ',', '.'); ?> VNĐ</td>
                                            <td class="d-none d-lg-table-cell"><?php echo $product->getCategoryName(); ?></td>
                                            <td class="d-none d-lg-table-cell"><?php echo str_replace("\r\n", "<br>", $product->getDescription()); ?></td>
                                            <td class="d-none d-lg-table-cell"><img src="<?php echo $product->getImageUrl(); ?>" alt="<?php echo $product->getProductName(); ?>" style="width: 100px;"></td>
                                            <td class="d-none d-lg-table-cell">
                                                <div class="btn-group" role="group">
                                                    <button 
                                                        class="btn btn-warning me-2" id="edit-btn"
                                                        data-bs-id = "<?php echo $product->getProductId(); ?>"
                                                        data-bs-name="<?php echo $product->getProductName(); ?>"
                                                        data-bs-description="<?php echo $product->getDescription(); ?>"
                                                        data-bs-imageurl="<?php echo $product->getImageUrl(); ?>"
                                                        data-bs-price="<?php echo $product->getPrice(); ?>"
                                                        data-bs-category="<?php echo $product->getCategoryId(); ?>"
                                                        data-bs-toggle="modal" data-bs-target="#editProduct"  
                                                    >
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-id="<?php echo $product->getProductId(); ?>" data-bs-target="#deleteProduct" id="delete-btn">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php require_once 'views/admin/footer.php'; ?>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        // render table with pagination
        $(document).ready(function() {
            $('#table-product').DataTable({
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
            $('#table-product_length select')
                .empty() // Xóa các tùy chọn hiện tại
                .append('<option value="5">5</option>') // Thêm các tùy chọn mới
                .append('<option value="10">10</option>')
                .append('<option value="15">15</option>')
                .append('<option value="20">20</option>');

            // Thiết lập giá trị mặc định là 20
            $('#table-product_length select').val('10');
        });
        // edit product
        $(document).on('click', '#edit-btn', function() {
            var productId = $(this).data('bs-id');
            var name = $(this).data('bs-name');
            var description = $(this).data('bs-description');
            var imageUrl = $(this).data('bs-imageurl');
            var price = $(this).data('bs-price');
            var category = $(this).data('bs-category');

            $('#editproductId').val(productId);
            $('#editname').val(name);
            $('#editdescription').val(description);
            $('#editprice').val(price);
            $('#editimageUrl').val(imageUrl);
            $('#editcategoryId').val(category);
            
        });

        // delete product
        $(document).on('click', '#delete-btn', function() {
            var productId = $(this).data('bs-id');
            $('#productId').val(productId);
        });
    </script>
</body>
</html>
