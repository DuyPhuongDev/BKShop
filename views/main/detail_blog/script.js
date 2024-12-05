
// $(document).ready(function () {
//     // Hàm tải danh sách bình luận
//     function loadComments() {
//         $.ajax({
//             url: 'index.php?page=main&controller=detail_blog&action=index&blog_id=' + $('#blog_id').val(),
//             method: 'GET',
//             dataType: 'json',
//             success: function (data) {
//                 const commentList = $('#commentList');
//                 commentList.empty(); // Xóa danh sách cũ
//                 data.forEach(comment => {
//                     const commentDiv = `
//                         <div class="comment">
//                             <strong>${comment.name}</strong> 
//                             <small class="text-muted">${comment.created_at}</small>
//                             <p>${comment.comment}</p>
//                         </div>
//                     `;
//                     commentList.append(commentDiv);
//                 });
//             }
//         });
//     }

//     // Tải bình luận ban đầu
//     loadComments();

//     // Xử lý gửi bình luận qua AJAX
//     $('#commentForm').on('submit', function (e) {
//         e.preventDefault(); // Ngăn form tải lại trang
//         const formData = $(this).serialize();
//         $.ajax({
//             url: 'add_comment.php',
//             method: 'POST',
//             data: formData,
//             dataType: 'json',
//             success: function (response) {
//                 if (response.success) {
//                     $('#commentForm')[0].reset(); // Xóa nội dung trong form
//                     loadComments(); // Tải lại danh sách bình luận
//                 } else {
//                     alert('Đã xảy ra lỗi khi thêm bình luận.');
//                 }
//             },
//             error: function () {
//                 alert('Không thể gửi bình luận.');
//             }
//         });
//     });
// });