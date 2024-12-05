<!-- dialog them blog -->
<div class="dialog">
    <!-- Modal -->
    <div class="modal fade" id="editNews" tabindex="-1" aria-labelledby="editNewsLabel" aria-hidden="true">
        <form id="editNewsForm" class="needs-validation" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editNewsLabel">Thêm bài viết mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="news-id" name="news-id">
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
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Lưu bài viết</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end dialog them san pham -->