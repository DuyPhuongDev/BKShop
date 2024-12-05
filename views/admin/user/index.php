<?php
    $users = [];
    foreach ($data['users'] as $user) {
        $users[] = [
            'userId' => $user->getUserId(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
            'fullName' => $user->getFullName(),
            'avatarUrl' => $user->getAvatarUrl(),
            'phone' => $user->getPhone(),
            'address' => $user->getAddress(),
            'status' => $user->getStatus(),
            'roleId' => $user->getRoleId(),
            'createdAt' => $user->getCreatedAt(),
            'updatedAt' => $user->getUpdatedAt()
        ];
    }
    $roles = [];
    foreach ($data['roles'] as $role) {
        $roles[] = [
            'roleId' => $role->getRoleId(),
            'roleName' => $role->getRoleName()
        ];
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
        <!-- toast -->
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="success-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1000" style="background-color: #00FF00;">
                <div class="d-flex">
                    <div class="toast-body"></div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <div id="error-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1000" style="--bs-toast-bg: #FF0000;">
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
                            <h1 class="text-center">Quản lý tài khoản</h1>
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
                                require_once 'views/admin/user/addUserDialog.php';
                                require_once 'views/admin/user/editUserDialog.php';
                                require_once 'views/admin/user/deleteUserDialog.php';
                            ?>
                            <!-- table -->
                            <table id="table-users" class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope="col" class="d-none d-lg-table-cell">STT</th>
                                        <th scope="col" >Tài khoản</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Họ và tên</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Email</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Số điện thoại</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Địa chỉ</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Vai trò</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Trạng thái</th>
                                        <th scope="col" class="d-none d-lg-table-cell">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="user-list">
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
        function renderTable(users, roles) {
            let html = '';
            users.forEach((user, index) => {
                let status = user.status == 'active' ? '<i class="fa-solid fa-check fa-2xl" style="color: #00ff00;"></i>' :'<i class="fa-solid fa-ban fa-2xl" style="color: #ff0000;"></i>';
                let statusBtn = user.status == 'active' ? `<button id="change-status" class="change-status btn btn-warning me-2" data-id="${user.userId}"><i class="fa-solid fa-ban"></i></button>` : `<button id="change-status" class="change-status btn btn-success me-2" data-id="${user.userId}"><i class="fa-solid fa-check"></i></button>`;
                html += `
                    <tr class="text-center">
                        <td class="d-none d-lg-table-cell">${index + 1}</td>
                        <td>${user.username}</td>
                        <td class="d-none d-lg-table-cell">${user.fullName}</td>
                        <td class="d-none d-lg-table-cell">${user.email}</td>
                        <td class="d-none d-lg-table-cell">${user.phone}</td>
                        <td class="d-none d-lg-table-cell">${user.address}</td>
                        <td class="d-none d-lg-table-cell">${roles.find(role => role.roleId === user.roleId).roleName}</td>
                        <td class="d-none d-lg-table-cell">${status}</td>
                        <td class="d-none d-lg-table-cell">
                            <div class="d-flex">
                                <button id="edit-user-btn" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#editUser" data-id="${user.userId}"><i class="fa-solid fa-pen-to-square"></i></button>
                                ${statusBtn}
                                <button id="delete-user-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser" data-id="${user.userId}"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                `;
            });
            $('#user-list').html(html);
        }
        
        var users = <?php echo json_encode($users); ?>;
        const roles = <?php echo json_encode($roles); ?>;
        $(document).ready(function() {
            renderTable(users, roles);
            // datatable
            $('#table-users').DataTable({
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
            $('#table-users_length select')
                .empty() // Xóa các tùy chọn hiện tại
                .append('<option value="5">5</option>') // Thêm các tùy chọn mới
                .append('<option value="10">10</option>')
                .append('<option value="15">15</option>')
                .append('<option value="20">20</option>');

            // Thiết lập giá trị mặc định là 20
            $('#table-users_length select').val('10');
        });

        // handle add user
        $('#addUserForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            
            $.ajax({
                url: 'index.php?page=admin&controller=user&action=add',
                method: 'POST',
                data: formData,
                processData: false, // Tắt xử lý dữ liệu mặc định
                contentType: false, // Để trình duyệt tự động thiết lập
                success: function(response) {
                    var data = JSON.parse(response); // convert string to json
                    if(data.status == 200) {
                        console.log(data);
                        showToastSuccess("Thêm tài khoản thành công");
                        renderTable(data.data.users, data.data.roles);
                        users = data.data.users; // update users
                    } else {
                        showToastError("Thêm tài khoản thất bại");
                    }
                },
                error: function() {
                    //showToastError("Có lỗi xảy ra");
                    alert("Có lỗi xảy ra");
                }
            })
        });
        

        // handle edit user
        $(document).on('click', '#edit-user-btn', function() {
            let userId = $(this).data('id');
            let user = users.find(user => user.userId == userId);
            $('#editUserId').val(user.userId);
            $('#editusername').val(user.username);
            $('#editfullName').val(user.fullName);
            $('#editemail').val(user.email);
            $('#editphone').val(user.phone);
            $('#editaddress').val(user.address);
            $('#editroleId').val(user.roleId);
        });

        $('#editUserForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: 'index.php?page=admin&controller=user&action=edit',
                method: 'POST',
                data: formData,
                processData: false, // Tắt xử lý dữ liệu mặc định
                contentType: false, // Để trình duyệt tự động thiết lập
                success: function(response) {
                    var response = JSON.parse(response); // convert string to json
                    console.log(response);
                    console.log(roles);
                    if(response.status == 200) {
                        showToastSuccess("Chỉnh sửa tài khoản thành công");
                        renderTable(response.data, roles);
                        users = response.data; // update users
                    } else {
                        showToastError("Chỉnh sửa tài khoản thất bại");
                    }
                },
                error: function() {
                    showToastError("Có lỗi xảy ra");
                }
            })
        });

        // handle change status
        $(document).on('click', '#change-status', function() {
            let userId = $(this).data('id');
            let user = users.find(user => user.userId == userId);
            let status = user.status;
            let newStatus = status == 'active' ? 'banned' : 'active';
            console.log('clicked');
            console.log(user);
            $.ajax({
                url: 'index.php?page=admin&controller=user&action=changeStatus',
                method: 'POST',
                data: {
                    userId: userId,
                    status: newStatus
                },
                success: function(response) {
                    var data = JSON.parse(response); // convert string to json
                    if(data.status == 200) {
                        showToastSuccess("Cập nhật trạng thái thành công");
                        renderTable(data.data.users, roles);
                        users = data.data.users; // update users
                    } else {
                        showToastError("Cập nhật trạng thái thất bại");
                    }
                },
                error: function() {
                    showToastError("Có lỗi xảy ra");
                }
            })
        });

        // handle delete user
        $(document).on('click', '#delete-user-btn', function() {
            let userId = $(this).data('id');
            $('#deleteUserForm input[name="userId"]').val(userId);
        });

        $("#deleteUserForm").on('submit', function(e) {
            e.preventDefault();
            let userId = $('#deleteUserForm input[name="userId"]').val();
            $.ajax({
                url: 'index.php?page=admin&controller=user&action=delete',
                method: 'POST',
                data: {
                    userId: userId
                },
                success: function(response) {
                    var data = JSON.parse(response); // convert string to json
                    if(data.status == 200) {
                        showToastSuccess("Xoá tài khoản thành công");
                        renderTable(data.data.users, roles);
                        users = data.data.users; // update users
                    } else {
                        showToastError("Xoá tài khoản thất bại");
                    }
                },
                error: function() {
                    showToastError("Có lỗi xảy ra");
                }
            })
        });
    </script>
</body>
</html>
