<?php
class AdminDonHangController
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang()

    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }
   
    public function detailDonHang(){
        $don_hang_id = $_GET['id_don_hang'];
        //Lay thong tin don hang o bang don hang
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        
        //Lay danh sach san pham da dat o don hang o bang chi tiet don hang
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
       $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
       require_once './views/donhang/detailDonHang.php';
    }
   

    public function formEditDonHang()   
    {
        // hiện thị from nhập
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);

        $listTrangThaiDonHang= $this->modelDonHang->getAllTrangThaiDonHang();

       
        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        } else {
            header("Location:" . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
        // require_once './views/sanpham/editSanPham.php';
    }

    public function postEditDonHang()
    {
        // xử lí thêm dữ liệu
        // kiểm tra dữ liệu có đc submit lên không

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'] ?? ' ';
         

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? ' ';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? ' ';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? ' ';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? ' ';
            $ghi_chu = $_POST['ghi_chu'] ?? ' ';
            $trang_thai_id = $_POST['trang_thai_id'] ?? ' ';
        
            $errors = [];
            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($ghi_chu)) {
                $errors['ghi_chu'] = 'Vui lòng nhập không bỏ trống ';
            }
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Vui lòng phải chọn trạng thái ';
            }
            
            $_SESSION['error'] = $errors;
           
              
            if (empty($errors)) {
         $abc = $this->modelDonHang->updateDonHang($don_hang_id,$ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id);

          
                header("Location:" . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                // require_once './views/sanpham/addSanPham.php';
                $_SESSION['flash']= true;
                header("Location:" . BASE_URL_ADMIN . '?act=from-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }





}
     


?>