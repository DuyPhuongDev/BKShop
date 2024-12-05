<!-- dialog tk-->
<div class="dialog">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUser">Tạo tài khoản mới</button>

    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <form id="addUserForm" class="needs-validation" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserLabel">Tạo tài khoản mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row g-3 modal-body">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="fullName" class="form-label">Họ và tên</label>
                            <input type="text" name="fullName" id="fullName" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="avatar" class="form-label">Ảnh đại diện</label>
                            <input type="file" name="avatar" id="avatar" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="roleId" class="form-label">Vai trò</label>
                            <select name="roleId" id="roleId" class="form-select">
                                <option value="">Chọn vai trò</option>
                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?php echo $role['roleId']; ?>"><?php echo $role['roleName']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tạo</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end dialog them tk -->