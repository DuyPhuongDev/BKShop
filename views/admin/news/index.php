<?php
    $newses = [];
    foreach ($data['newses'] as $news) {
        $newses[] = array(
            'news_id' => $news->getNewsId(),
            'title' => $news->getTitle(),
            'topic' => $news->getTopic(),
            'content' => str_replace("\r\n", "<br>", $news->getContent()),
            'status' => $news->getStatus(),
        );
    }
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
                <button class="navbar-toggler"`>
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
        <!-- toast -->
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="success-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000" style="border: 2px solid #00FF00;">
                <div class="d-flex">
                    <div class="toast-body"></div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <div id="error-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000" style="border: 2px solid #ff0000;">
                <div class="d-flex">
                    <div class="toast-body"></div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <!-- end toast -->
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
                    <div class="container-fluid row">
                        <div class="my-2">
                            <p class="row">
                            <h1 class="text-center">Quản lý tin tức</h1>
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
                                // dialog add
                                require_once 'views/admin/news/addNewsDialog.php';
                                require_once 'views/admin/news/editNewsDialog.php';
                                require_once 'views/admin/news/deleteNewsDialog.php';
                            ?>
                            <!-- table -->
                            <table id="table-news" class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope="col" class="d-none d-lg-table-cell">STT</th>
                                        <th scope="col" >Title</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Chủ đề</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Nội dung</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Trạng thái</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="news-list">
                                    <!-- data in here -->
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
        // function show toast
        function showToastSuccess(message) {
            const toast = bootstrap.Toast.getOrCreateInstance(document.getElementById('success-toast'));
            const toastBody = document.querySelector('.toast-body');
            toastBody.innerHTML = message;
            toast.show();
        }
        function showToastError(message) {
            const toast = bootstrap.Toast.getOrCreateInstance(document.getElementById('error-toast'));
            const toastBody = document.querySelector('.toast-body');
            toastBody.innerHTML = message;
            toast.show();
        }
        
        // render data
        function renderTable(newses) {
            let html = '';
            newses.forEach((news, index) => {
                html += `
                    <tr class="text-center">
                        <td class="d-none d-lg-table-cell">${index + 1}</td>
                        <td>${news.title}</td>
                        <td class="d-none d-lg-table-cell">${news.topic}</td>
                        <td class="d-none d-lg-table-cell">${news.content}</td>
                        <td class="d-none d-lg-table-cell">${news.status}</td>
                        <td class="d-none d-lg-table-cell">
                            <div class="d-flex">
                                <button id="edit-news-btn" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#editNews" data-id="${news.news_id}"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button id="delete-news-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteNews" data-id="${news.news_id}"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                `;
            });
            $('#news-list').html(html);
        }
        
        var newses = <?php echo json_encode($newses); ?>;
        $(document).ready(function() {
            renderTable(newses);
            // datatable
            $('#table-news').DataTable({
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
            $('#table-news_length select')
                .empty() // Xóa các tùy chọn hiện tại
                .append('<option value="5">5</option>') // Thêm các tùy chọn mới
                .append('<option value="10">10</option>')
                .append('<option value="15">15</option>')
                .append('<option value="20">20</option>');

            // Thiết lập giá trị mặc định là 20
            $('#table-news_length select').val('10');
        });

        // edit news
        $(document).on('click', '#edit-news-btn', function() {
            const newsId = $(this).data('id');
            const news = newses.find(news => news.news_id == newsId);
            var content = news.content.replace(/<br>/g, "\r\n");
            $('#editNewsForm #news-id').val(news.news_id);
            $('#editNewsForm #news-title').val(news.title);
            $('#editNewsForm #news-topic').val(news.topic);
            $('#editNewsForm #content').val(content);
            $('#editNewsForm #status').val(news.status);
        });

        $('#editNewsForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: 'index.php?page=admin&controller=news&action=edit',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    const res = JSON.parse(response);
                    console.log(res);
                    if (res.status === 200) {
                        showToastSuccess(res.message);
                        const newsId = res.data.news_id;
                        const index = newses.findIndex(news => news.news_id == newsId);
                        newses[index] = {
                            news_id: newsId,
                            title: res.data.title,
                            topic: res.data.topic,
                            content: res.data.content.replace(/\r\n/g, "<br>"),
                            status: res.data.status
                        };
                        renderTable(newses);
                    } else {
                        showToastError(res.message);
                    }
                },
                error: function() {
                    showToastError('Có lỗi xảy ra!');
                }
            });
        });

        // handle delete news
        $(document).on('click', '#delete-news-btn', function() {
            const newsId = $(this).data('id');
            $('#del-news-id').val(newsId);
        });

        $("#deleteNewsForm").submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: 'index.php?page=admin&controller=news&action=delete',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    const res = JSON.parse(response);
                    if (res.status === 200) {
                        showToastSuccess(res.message);
                        newses = newses.filter(news => news.news_id != res.data);
                        renderTable(newses);
                    } else {
                        showToastError(res.message);
                    }
                },
                error: function() {
                    showToastError('Có lỗi xảy ra!');
                }
            });
        });

    </script>
</body>
</html>
