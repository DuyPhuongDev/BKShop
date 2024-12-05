<!-- dialog xoa san pham -->
<div class="dialog">
    <!-- Modal -->
    <div class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="deleteProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductLabel">Xoá sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteProductForm" action="index.php?page=admin&controller=product&action=delete" method="POST">
                    <div class="modal-body">
                        <div class="content">Bạn có chắc muốn xoá sản phẩm này không?</div>
                        <input type="hidden" name="productId" id="productId">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger" id="btn-delete-product">Xoá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end dialog xoa san pham -->