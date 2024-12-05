<div class="dialog">
<!-- dialog edit sp -->
<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
    <form id="editProductForm" class="needs-validation" action="index.php?page=admin&controller=product&action=edit" method="POST" enctype="multipart/form-data" novalidate>
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductLabel">Sửa thông tin sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editproductId" name="productId">
                    <div class="mb-3">
                        <label for="editname" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="editname" name="name" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên sản phẩm!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editdescription" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="editdescription" name="description" rows="6" required></textarea>
                        <div class="invalid-feedback">
                            Vui lòng nhập mô tả sản phẩm!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editimageUrl" class="form-label">URL ảnh</label>
                        <input type="text" class="form-control" id="editimageUrl" name="imageUrl" required>
                        <div class="invalid-feedback">
                            Vui lòng thêm hình ảnh cho sản phẩm!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editprice" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="editprice" name="price" required min="0">
                        <div class="invalid-feedback">
                            Vui lòng nhập giá sản phẩm!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editcategoryId" class="form-label">Danh mục</label>
                        <select class="form-select" id="editcategoryId" name="categoryId" required>
                            <option value="">Chọn danh mục</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category->getCategoryId(); ?>"><?php echo $category->getCategoryName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Vui lòng chọn danh mục!
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<!-- end dialog edit sp -->