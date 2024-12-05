<?php
include_once('views/main/navbar.php');
?>
<!-- Contact -->
<div class="container contact-section">
  <h1 class="text-center mb-5">Liên Hệ Với Chúng Tôi</h1>
  <div class="row">
      <!-- Contact Information -->
      <div class="col-md-6">
          <h3 class="mb-4">Thông Tin Liên Hệ</h3>
          <ul class="list-unstyled contact-details">
              <li><strong>Địa chỉ:</strong> Khu phố Tân Lập, Phường Đông Hòa, TP. Dĩ An, Tỉnh Bình Dương</li>
              <li><strong>Số điện thoại:</strong> <a href="tel:+84383811208">+84 383811208</a></li>
              <li><strong>Email:</strong> <a href="mailto:BKshop@hcmut.edu.vn">BKshop@hcmut.edu.vn</a></li>
              <li><strong>Giờ làm việc:</strong> Thứ 2 - Thứ 7: 9:00 - 18:00</li>
          </ul>
          <div class="map-container">
              <!-- Google Maps Embed -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.092567882666!2d106.80281137553996!3d10.880563757263202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d8a5568c997f%3A0xdeac05f17a166e0c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJBIUUcgVFAuSENN!5e0!3m2!1svi!2s!4v1733216558194!5m2!1svi!2s" 
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
      </div>
      <!-- Contact Form -->
      <div class="col-md-6">
          <h3 class="mb-4">Gửi Tin Nhắn</h3>
          <form>
              <div class="mb-3">
                  <label for="name" class="form-label">Tên của bạn</label>
                  <input type="text" class="form-control" id="name" placeholder="Nhập tên của bạn">
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn">
              </div>
              <div class="mb-3">
                  <label for="message" class="form-label">Tin nhắn</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Nhập tin nhắn của bạn"></textarea>
              </div>
              <button type="submit" class="btn btn-dark w-100">Gửi</button>
          </form>
      </div>
  </div>
</div>

<?php
include_once('views/main/footer.php');
?>