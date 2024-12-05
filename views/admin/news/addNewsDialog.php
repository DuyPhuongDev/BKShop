<!-- dialog them blog -->
<div class="dialog">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addNews">Thêm bài viết mới</button>

    <!-- Modal -->
    <div class="modal fade" id="addNews" tabindex="-1" aria-labelledby="addNewsLabel" aria-hidden="true">
        <form id="addNewsForm" class="needs-validation" action="index.php?page=admin&controller=news&action=add" method="POST" enctype="multipart/form-data" novalidate>
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewsLabel">Thêm bài viết mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="news-title" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="news-title" name="news-title" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập tiêu đề!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="news-topic" class="form-label">Chủ đề</label>
                            <select class="form-select" id="news-topic" name="news-topic" required>
                                <option value="">Chọn chủ đề</option>
                                <option value="news">Tin tức</option>
                                <option value="sales">Tin giảm giá</option>
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn chủ đề!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
                            <div class="invalid-feedback">
                                Vui lòng nhập nội dung!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image-url" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" id="image-url" name="image-url" required>
                            <div class="invalid-feedback">
                                Vui lòng thêm hình ảnh cho bài viết!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="">Chọn trạng thái</option>
                                <option value="visible">Hiện bài viết</option>
                                <option value="hidden">Ẩn bài viết</option>
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn trạng thái!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu bài viết</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end dialog them san pham -->