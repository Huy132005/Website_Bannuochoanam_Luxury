<?php
class DanhMuc{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc(){
         try {
        $sql = "SELECT * FROM danh_mucs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
}
public function getDanhMucById($id)
    {
        $sql = "SELECT * FROM danh_mucs WHERE id = :id";  // Query lấy danh mục theo ID
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về danh mục duy nhất theo ID
    }
}
?>