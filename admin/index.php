<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php';

require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';



// Require toàn bộ file Models

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    //route bao cao thong ke- trang chu
    '/' => (new AdminBaoCaoThongKeController())->home(),

    //route danh muc
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'form-edit-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'edit-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' =>(new AdminDanhMucController())->deleteDanhMuc(),

    //route san pham
    'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
    'from-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'from-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'sua-album-anh-san-pham' =>(new AdminSanPhamController())->postEditAnhSanPham(),
    'xoa-san-pham' =>(new AdminSanPhamController())->deleteSanPham(),
    'chi-tiet-san-pham' =>(new AdminSanPhamController())->detailSanPham(),
// 'update-trang-thai-binh-luan' =>(new AdminSanPhamController())->updateTrangThaiBinhLuan(),

      
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
    'from-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),
    // 'xoa-don-hang' =>(new AdminDonHangController())->deleteDonHang(),
    'chi-tiet-don-hang' =>(new AdminDonHangController())->detailDonHang(),

    //binh luan
    'update-trang-thai-binh-luan' =>(new AdminSanPhamController())->updateTrangThaiBinhLuan(),


   //route quanly tai khoan quan tri
   //ql tai khoan quan tri
    'list-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->danhSachQuanTri(),
'form-them-quan-tri' =>(new AdminTaiKhoanController())->formAddQuanTri(),
'them-quan-tri' =>(new AdminTaiKhoanController())->postAddQuanTri(),
'from-sua-quan-tri' =>(new AdminTaiKhoanController())->formEditQuanTri(),
'sua-quan-tri' =>(new AdminTaiKhoanController())->postEditQuanTri(),
'reset-password' =>(new AdminTaiKhoanController())->resetPassword(),

// khách hàng
'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->danhSachKhachHang(),
// Quan ly tai lhoan khac hang
'from-sua-khach-hang' =>(new AdminTaiKhoanController())->formEditKhachHang(),
'sua-khach-hang' =>(new AdminTaiKhoanController())->postEditKhachHang(),  
'chi-tiet-khach-hang' =>(new AdminTaiKhoanController())->detailKhachHang(),

//ca nhan
// 'form-sua-thong-tin-ca-nhan-quan-tri' =>(new AdminTaiKhoanController())->formEditCaNhanQuanTri(),
// 'sua-thong-tin-ca-nhan-quan-tri' =>(new AdminTaiKhoanController())->postEditCaNhanQuanTri(),
// // 'sua-mat-khau-ca-nhan-quan-tri' =>(new AdminTaiKhoanController())->postEditMatKhauCaNhan(),

// đăng nhập
'login-admin' =>(new AdminTaiKhoanController())->formLogin(),
'check-login-admin' =>(new AdminTaiKhoanController())->login(),
'logout-admin' =>(new AdminTaiKhoanController())->logout(),

};