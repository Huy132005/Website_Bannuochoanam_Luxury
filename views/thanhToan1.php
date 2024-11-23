
<?php require_once './views/layout/header.php'; ?>
    <!-- Start Header Area -->
 <?php require_once './views/layout/menu.php'; ?>  


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thanh Toán Chuyển Khoản</title>
<style>

   /* Đặt nền xanh cho toàn bộ container */
.containerr {
    background-color:#fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
}

/* Tạo style cho nút bấm */
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0073e6; /* Màu xanh đậm */
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    text-align: center;
    transition: background-color 0.3s, transform 0.2s; /* Hiệu ứng hover */
}

/* Hover cho nút bấm */
.button:hover {
    background-color:red; /* Màu xanh đậm hơn khi hover */
    transform: translateY(-3px); /* Di chuyển nút lên một chút */
}

/* Style cho ảnh QR để căn chỉnh */
.containerr img {
    display: block;
    margin: 20px auto;
    max-width: 200px;
    border: 2px solid #0073e6; /* Viền xanh cho ảnh */
    border-radius: 5px;
}

</style>
</head>
<body>
    <div>
    <div class="containerr">
        <h1 style="padding: 0 85px;">Thông Tin Thanh Toán Chuyển Khoản</h1>
        <p style="font-size: 20px; font-weight: bold; padding: 0 40px;">Mã QR chuyển khoản ngân hàng</p>
        <img src="./assets/img/qr.jpg" alt="">
        <p style="font-size: 20px; font-weight: bold;padding: 0 40px;">Thông tin chuyển khoản ngân hàng</p>
        <p style="color: red;padding: 20px 40px; ">Vui lòng chuyển khoản theo nội dung <strong>HO_TEN và SDT</strong> để chúng tôi xác nhận thanh toán.</p>
        <div class="bank-info">
            <p style="padding: 0 40px;"><strong>Số tài khoản:</strong> 88888010388888</p>
            <p style="padding: 0 40px;"><strong>Tên ngân hàng:</strong> Ngân hàng MB Bank</p>
            <p style="padding: 0 40px;"><strong>Chủ tài khoản:</strong> DO QUANG HUY</p>
            <p style="padding: 0 40px;"><strong>Nội dung chuyển khoản:</strong> HO_TEN và SDT</p>
        </div>
        <div class="note">
            <p style="padding: 0 40px;">Vui lòng thực hiện chuyển khoản theo thông tin trên và nhập số tiền chuyển khoản đúng với tổng số tiền đơn hàng. Sau khi hoàn tất, vui lòng quay lại trang để xác nhận đơn hàng.</p>
        </div>
        <a href=" <?= BASE_URL ?>" class="button" >Xác nhận đơn hàng</a>
    </div></div>
</body>
</html>

 <?php require_once './views/layout/miniCart.php'; ?>

 <?php require_once './views/layout/footer.php'; ?>