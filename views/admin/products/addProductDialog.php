<!-- dialog them san pham -->
<div class="dialog">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">Thêm sản phẩm</button>

    <!-- Modal -->
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
        <form id="addProductForm" class="needs-validation" action="index.php?page=admin&controller=product&action=add" method="POST" enctype="multipart/form-data" novalidate>
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductLabel">Thêm sản phẩm mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="productName" name="product_name" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập tên sản phẩm!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                Vui lòng nhập mô tả sản phẩm!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">URL ảnh</label>
                            <input type="file" class="form-control" id="imageUrl" name="image_url" required>
                            <div class="invalid-feedback">
                                Vui lòng thêm hình ảnh cho sản phẩm!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" class="form-control" id="price" name="price" required min="0" step="0.01">
                            <div class="invalid-feedback">
                                Vui lòng nhập giá sản phẩm!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="categoryId" class="form-label">Danh mục</label>
                            <select class="form-select" id="categoryId" name="category_id" required>
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
<!-- end dialog them san pham -->