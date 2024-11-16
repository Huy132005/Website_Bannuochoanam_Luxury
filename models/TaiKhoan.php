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
    }

    
    
    ?>