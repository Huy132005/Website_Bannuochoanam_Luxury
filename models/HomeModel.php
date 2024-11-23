<?php

class HomeModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả danh mục
    public function getCategory()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    // Lấy sản phẩm theo ID danh mục
    public function getListSanPhamCungDanhMuc($idDanhMuc)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = :idDanhMuc';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':idDanhMuc' => $idDanhMuc]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}