<?php
class AdminDanhMucController
{  public $modelDanhMuc;
    public function __construct(){
        $this -> modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc()
  
    {
        $listDanhMuc = $this -> modelDanhMuc ->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc(){
        // hiện thị from nhập
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhMuc(){
        // xử lí thêm dữ liệu
        // kiểm tra dữ liệu có đc submit lên không

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $errors = [];

            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Vui lòng nhập tên danh mục không bỏ trống ';

}
if(empty($errors)){
    $this -> modelDanhMuc ->insertDanhMuc($ten_danh_muc, $mo_ta);
    header("Location:". BASE_URL_ADMIN . '?act=danh-muc');
    exit();

}else{
    require_once './views/danhmuc/addDanhMuc.php';
}
}
    }



    public function formEditDanhMuc(){
        // hiện thị from nhập
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this -> modelDanhMuc ->getDetailDanhMuc($id);
        // var_dump($danhMuc);
        // die();
        if($danhMuc){
            require_once './views/danhmuc/editDanhMuc.php';
        }else{
            header("Location:". BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
        require_once './views/danhmuc/editDanhMuc.php';
    }

    public function postEditDanhMuc(){
        // xử lí thêm dữ liệu
        // kiểm tra dữ liệu có đc submit lên không

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $errors = [];

            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Vui lòng nhập tên danh mục không bỏ trống ';

}
if(empty($errors)){
    $this -> modelDanhMuc ->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
    header("Location:". BASE_URL_ADMIN . '?act=danh-muc');
    exit();

}else{
    $danhMuc = ['id'=>$id, 'ten_danh_muc'=>$ten_danh_muc, 'mo_ta'=>$mo_ta];
    require_once './views/danhmuc/editDanhMuc.php';
}
}
    }

    public function deleteDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this -> modelDanhMuc ->getDetailDanhMuc($id);
        if($danhMuc){
            $this -> modelDanhMuc ->destroyDanhMuc($id);

}

        header("Location:". BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
}

?>