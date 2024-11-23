<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/HomeModel.php';

require_once './models/TaiKhoan.php';
require_once './models/SanPham.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ 
    '/' =>(new HomeController())->home(),
    'gioi-thieu' =>(new HomeController())->gioiThieu(),
    'lien-he' =>(new HomeController())->lienHe(),
  
    'chi-tiet-san-pham' =>(new HomeController())->chiTietSanPham(),
    'them-gio-hang' =>(new HomeController())->addGioHang(),
    'gio-hang' =>(new HomeController())->gioHang(),
    'thanh-toan' =>(new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' =>(new HomeController())->postThanhToan(),

     'login'=>(new HomeController())->fromLogin(),
    'check-login'=>(new HomeController())->postLogin(),
    'show-product-category'=>(new HomeController())->showProductCate(),


    'list-tai-khoan-khach-hang1' =>(new HomeController())->danhSachKhachHang(),
  
'from-sua-khach-hang1' =>( new HomeController())->formEditKhachHang(),
'sua-khach-hang1' =>(new HomeController())->postEditKhachHang(),  
'chi-tiet-khach-hang1' =>(new HomeController())->detailKhachHang(),
'lich-su-mua-hang' =>(new HomeController())->lichSuMuaHang(),
'chi-tiet-mua-hang' =>(new HomeController())->chiTietMuaHang(),
'huy-don-hang' =>(new HomeController())->huyDonHang(),

'logout-user' =>(new HomeController())->logout(),
    // 'san-pham-danh-muc' => (new HomeController())->danhSachDanhMuc(),
'register'=>(new HomeController())->fromregister(),
     'check-register'=>(new HomeController())->handleRegister(),
'thanh-toan-truoc-khi-nhan-hang' =>(new HomeController())->thanhToan1(),

};