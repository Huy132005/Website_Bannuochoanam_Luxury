<?php


class AdminDanhMucController{
    public $modelDanhMuc;

    public function __construct(){
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc(){
        //Ham dung hien thi form nhap
        require_once './views/danhmuc/addDanhMuc.php';

    }
    public function postAddDanhMuc(){
        //xu li them data

        //kiem tra xem data co ph dc submit len k
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lay du lieu tu form
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
          
            //tao mang trong chua data
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Vui long nhap ten danh muc';
            }
            //Neu k loi thi tien hang add danh muc
            if(empty($errors)){
                //Neu k loi thi add danh muc
               
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header('location: ' . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else{
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }
    public function formEditDanhMuc(){
        //Ham dung hien thi form nhap
        //Lay thoong tin
        $id=$_GET['id_danh_muc'];
        
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
      if($danhMuc){
        require_once './views/danhmuc/editDanhMuc.php';

      }else{
        header('location: ' . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
      }
      require_once './views/danhmuc/editDanhMuc.php';


    }
    public function postEditDanhMuc(){
        //xu li them data

        //kiem tra xem data co ph dc submit len k
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lay du lieu tu form
            $id= $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
          
            //tao mang trong chua data
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Vui long nhap ten danh muc';
            }
            //Neu k loi thi tien hang add danh muc
            if(empty($errors)){
                //Neu k loi thi add danh muc
               
                $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc, $mo_ta);
                header('location: ' . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else{
                $danhMuc = ['id' => $id,'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
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