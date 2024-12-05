<!-- dialog tk-->
<div class="dialog">
        <!-- Modal -->
    <div class="modal fade" id="deleteNews" tabindex="-1" aria-labelledby="deleteNewsLabel" aria-hidden="true">
        <form id="deleteNewsForm" class="needs-validation" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteNewsLabel">Xoá tài khoản</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xoá bài viết này không?</p>
                        <input type="text" name="news-id" id="del-news-id">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Xoá</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end dialog them tk -->