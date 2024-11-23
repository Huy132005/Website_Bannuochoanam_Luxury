<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public $modelDanhMuc;
    public $listCategory;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        // $this->listCategory=(new HomeModel())->getCategory();
        // $this->modelDanhMuc = new DanhMuc();
        $this->listCategory = (new HomeModel())->getCategory();

    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
  public function gioiThieu(){

   require_once './views/home1.php';
    
  }
  public function thanhToan1(){
      require_once './views/thanhToan1.php';
  }
  public function lienHe(){

   require_once './views/lienHe.php';
  }
    public function danhsachsanpham()
    {
        // echo" Danh sách sản phẩm";
        $listProduct = $this->modelSanPham->getAllProduct();
        require_once './views/listProduct.php';
        // var_dump($listProduct);die();
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamCungDanhMuc($sanPham['danh_muc_id']);

        // var_dump($danhMuc);
        // die();
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location:" . BASE_URL);
            exit();
        }
    }


    public function fromLogin()
    {

        require_once './views/auth/fromLogin.php';

        deleteSessionError();

        exit();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            if ($user == $email) {
                $_SESSION['user_client'] = $user;
                header("Location:" . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);
                // die();
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if (!$gioHang) {
                   $gioHang=  $this->modelGioHang->addGioHang($mail['id']);
                   $gioHang= ['id' => $gioHang];
                }else{
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                   
                }

                $san_pham_id = $_POST['san_pham_id'];  
               
                $soLuong = $_POST['so_luong'];

                $checkSanPham = false;

              foreach ($chiTietGioHang as  $detail) {
                if($detail['san_pham_id'] == $san_pham_id){
                $newSoLuong = $detail['so_luong'] + $soLuong;
                $this->modelGioHang->updateSoLuong($gioHang['id'],$san_pham_id,$newSoLuong);
                $checkSanPham = true;
                break;
                }
              

              }
              if(!$checkSanPham){

                $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $soLuong);
              }
            header("Location:" . BASE_URL . '?act=gio-hang');
            } else {
                header("Location:" . BASE_URL . '?act=login');
            }
        }
    }

    public function gioHang(){
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            if (!$gioHang) {
               $gioHang=  $this->modelGioHang->addGioHang($mail['id']);
               $gioHang= ['id' => $gioHang];
               $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
               
            }
         
            require_once './views/gioHang.php';
        } else {
           header("Location:" . BASE_URL . '?act=login');
        }

    }

    public function thanhToan(){
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if (!$gioHang) {
               $gioHang=  $this->modelGioHang->addGioHang($user['id']);
               $gioHang= ['id' => $gioHang];
               $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
               
            }
         
            require_once './views/thanhToan.php';
        } else {
            header("Location:" . BASE_URL . '?act=login');
        }
        require_once './views/thanhToan.php';
    }
    public function postThanhToan(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
        $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
        $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
        $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
       
        $ghi_chu = $_POST['ghi_chu'];
        $tong_tien= $_POST['tong_tien'];
        $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
        $ngay_dat = date('Y-m-d');
        
       $trang_thai_id = 1;
       $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
       $tai_khoan_id = $user['id'];
       $ma_don_hang= 'WAD-' . rand(1000, 9999);

       $this->modelDonHang->addDonHang($tai_khoan_id,
       $ten_nguoi_nhan,
       $email_nguoi_nhan,
       $sdt_nguoi_nhan,
       $dia_chi_nguoi_nhan,
       $ghi_chu,
       $tong_tien,
       $phuong_thuc_thanh_toan_id,
       $ngay_dat,
       $trang_thai_id,
       $ma_don_hang
       );
       if ($phuong_thuc_thanh_toan_id == 1) { 
        header("Location:" . BASE_URL   );
       
       } else {
        header("Location:" . BASE_URL . '?act=thanh-toan-truoc-khi-nhan-hang');
       }

       require_once './views/daThanhToan.php';
       $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

       if ($gioHang) {
     
         $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
         foreach ($chiTietGioHang as $item) {
             $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];
             $this->modelDonHang->addChiTietDonHang($donHang,$item['san_pham_id'], $donGia, $item['so_luong'], $donGia * $item['so_luong']);
         }
         $this->modelGioHang->clearDetailGioHang($gioHang['id']);




         $this->modelGioHang->clearDetailGioHang($tai_khoan_id);
         header("Location:" . BASE_URL . '?act=lich-su-mua-hang');
         exit();

       }else{
           var_dump('khong co san pham');
           die();
       }

// var_dump('Thêm thành công');
// die();

        }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
      
        require_once './views/khachhang/listKhachHang.php';
    }
 public function postEditKhachHang()
    {
        // xử lí thêm dữ liệu
        // kiểm tra dữ liệu có đc submit lên không

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $khach_hang_id = $_POST['khach_hang_id'] ?? ' ';
         

            $ho_ten = $_POST['ho_ten'] ?? ' ';
            $email = $_POST['email'] ?? ' ';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? ' ';
            $ngay_sinh = $_POST['ngay_sinh'] ?? ' ';
            $gioi_tinh = $_POST['gioi_tinh'] ?? ' ';
            $dia_chi = $_POST['dia_chi'] ?? ' ';
            $trang_thai = $_POST['trang_thai'] ?? ' ';
    
  
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($email)) {
               
                $errors['email'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($ngay_sinh)) {
               
                $errors['ngay_sinh'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($gioi_tinh)) {
               
                $errors['gioi_tinh'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($trang_thai)) {
               
                $errors['trang_thai'] = 'Vui lòng nhập không bỏ trống ';
            }
        
           
            
            $_SESSION['error'] = $errors;
           
              
            if (empty($errors)) {
         $this->modelTaiKhoan->updateKhachHang($khach_hang_id,$ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai);

          
                header("Location:" . BASE_URL. '?act=list-tai-khoan-khach-hang1');
                exit();
            } else {
                // require_once './views/sanpham/addSanPham.php';
                $_SESSION['flash']= true;
                header("Location:" . BASE_URL . '?act=from-sua-khach-hang1&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function lichSuMuaHang(){
        if(isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
             $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
         
            
              $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai' ,'id');   


             $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            
              $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc' ,'id');

             
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once './views/lichSuMuaHang.php';
        }else{
            header("Location:" . BASE_URL. '?act=login-user');
            exit();
        }
    }

    public function chiTietMuaHang(){
        
    }
    public function huyDonHang(){
        if(isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $donHangId = $_GET['id'];

            $donHang = $this->modelDonHang->getDongHangId($donHangId);
            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                echo"Bạn Không được hủy đơn hàng này !";
                exit();
            }
            if($donHang['trang_thai_id'] != 1){
                echo"Chỉ đơn hàng ở trạng thái 'Chưa xác nhận ' mới được hủy ";
                exit();
            }

            $this->modelDonHang->updateTrangThaiDonHang($donHangId,11);
            header("Location:" . BASE_URL . '?act=lich-su-mua-hang');
            exit();
        }else{
            header("Location:" . BASE_URL. '?act=login-user');
            exit();
        }
    }

    public function formEditKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($quanTri);
        // die();
        

        require_once './views/khachhang/editKhachHang.php';
        deleteSessionError();
    }
   
    public function detailKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        // $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        // $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        require_once './views/khachhang/deltailKhachHang.php';
    }

    public function logout(){

        if(isset($_SESSION['user_admin'])) {
    
            unset($_SESSION['user_admin']);
            header("Location: " . BASE_URL );
            exit();
        }
    }
    // public function danhSachDanhMuc()
    // {
    //     $danhMucs = $this->modelDanhMuc->getAllDanhMuc();  // Gọi phương thức trong model để lấy tất cả danh mục
    //     require_once './views/sanPhamTheoDanhMuc.php';  // Gọi view để hiển thị danh mục
    // }
  


    public function fromRegister()
    {
        // if (isset($_POST['register']) && ($_POST['register'] == 'register')) {
        //     $email = $_POST['email'];
            
        //     $pass = $_POST['mau_khau'];
            // $this->modelTaiKhoan->insert_taikhoan($email,  $pass);
            
        require_once './views/auth/fromregister.php';

        
    }
    public function handleRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mau_khau'];
            $hoTen = $_POST['ho_ten'];
            $chucVuId = 2; // Giá trị mặc định cho chuc_vu_id
    
            $this->modelTaiKhoan = new TaiKhoan();
            
            // Kiểm tra xem email đã tồn tại chưa
            if ($this->modelTaiKhoan->checkEmailExists($email)) {
                header("Location:" . BASE_URL . '?act=register');
            } else {
                $this->modelTaiKhoan->register($email, $password, $hoTen, $chucVuId);
              header("Location:" . BASE_URL . '?act=login');
            
            }
        } else {
            $this->fromRegister();
        }
    }
    public function showProductCate()
    {
        $id = $_GET['id'];
        // Lấy danh sách sản phẩm trong cùng danh mục
        $listProducts = $this->modelSanPham->getListSanPhamCungDanhMuc($id);

        // Kiểm tra kết quả truy vấn
        if (!$listProducts) {
            echo "Không có sản phẩm nào trong danh mục này!";
            return;
        }

        // Truyền dữ liệu sản phẩm sang View
        require_once './views/category.php';
    }
}
