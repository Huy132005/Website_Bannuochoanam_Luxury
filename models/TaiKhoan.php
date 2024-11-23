<?php

class TaiKhoan
{
        public $conn;
        
        public function __construct()
        {
            $this->conn = connectDB();
        }

        public function checkLogin($email, $matkhau){
            try {
            $sql="SELECT * FROM tai_khoans WHERE email = :email ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            if (password_verify($matkhau, $user['mat_khau'] )) {
                if( $user['chuc_vu_id'] == 2){
               if($user['trang_thai'] == 1){
                return $user['email'];
               }else{
                   return "Tài khoản bị cấm";
               }
                }else{
                  return "Tài khoản không có quyền đăng nhập";
                }
                
            }else{
                return "Bạn đăng nhập sai thông tin";
            }
        }catch (Exception $e) {
            echo "Lỗi" .$e->getMessage();
            return false; 
        }
        }
        public function getTaiKhoanFromEmail($email){
            try {
                $sql = "SELECT * FROM tai_khoans WHERE email = :email";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['email' => $email]);
                return $stmt->fetch();
            } catch (Exception $e) {    
                echo "Lỗi". $e->getMessage();
            }
        }
        public function updateKhachHang( $id,$ho_ten, $email, $so_dien_thoai,$ngay_sinh,$gioi_tinh,$dia_chi ,$trang_thai){
            try{
              
                $sql = 'UPDATE tai_khoans
                 SET
                 ho_ten = :ho_ten,
                 email = :email,
                 so_dien_thoai = :so_dien_thoai,
                 ngay_sinh = :ngay_sinh,
                 gioi_tinh = :gioi_tinh,
                 dia_chi = :dia_chi,
                 trang_thai = :trang_thai
                 WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':ho_ten' => $ho_ten,
                    ':email' => $email,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':ngay_sinh' => $ngay_sinh,
                    ':gioi_tinh' => $gioi_tinh,
                    ':dia_chi' => $dia_chi,    
                    ':trang_thai' => $trang_thai,
                    ':id' => $id
                ]);
                return true;
            }catch(Exception $e){
                echo "Lỗi" .$e->getMessage();
            }
        }
        public function getAllTaiKhoan($chuc_vu_id){
            try {
           $sql='SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id ';  
         
           $stmt = $this->conn->prepare($sql);
           $stmt->execute([':chuc_vu_id'=> $chuc_vu_id]);
           return $stmt->fetchAll();
       } catch (Exception $e) {
           echo "Lỗi" . $e->getMessage();
       } 
   }
   public function getDetailTaiKhoan($id){
    try {
        $sql = "SELECT * FROM tai_khoans WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    } catch (Exception $e) {    
        echo "Lỗi". $e->getMessage();
    }
}

public function checkEmailExists($email) {
    $sql = "SELECT COUNT(*) FROM tai_khoans WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    return $stmt->fetchColumn() > 0;
}

public function register($email, $password, $hoTen, $chucVuId) {
    $password = password_hash($password, PASSWORD_BCRYPT); 
    $sql = "INSERT INTO tai_khoans(email, mat_khau, ho_ten, chuc_vu_id) VALUES (:email, :mat_khau, :ho_ten, :chuc_vu_id)";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        ':email' => $email,
        ':mat_khau' => $password,
        ':ho_ten' => $hoTen,
        ':chuc_vu_id' => $chucVuId
    ]);
}



    }

    
    
    ?>