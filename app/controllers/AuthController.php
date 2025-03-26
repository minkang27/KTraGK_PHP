<?php
class AuthController {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $MaSV = $_POST['MaSV'];
            
            $query = "SELECT * FROM SinhVien WHERE MaSV = :MaSV";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':MaSV', $MaSV);
            $stmt->execute();
            $sinhVien = $stmt->fetch(PDO::FETCH_OBJ);
            
            if ($sinhVien) {
                $_SESSION['MaSV'] = $sinhVien->MaSV;
                $_SESSION['HoTen'] = $sinhVien->HoTen;
                header("Location: ?controller=hocphan&action=dangky");
                exit();
            } else {
                $error = "Mã sinh viên không tồn tại";
                require_once 'app/views/auth/login.php';
            }
        } else {
            require_once 'app/views/auth/login.php';
        }
    }
    
    public function logout() {
        // Xóa tất cả session
        session_unset();
        session_destroy();
        
        // Chuyển hướng về trang đăng nhập
        header("Location: index.php?controller=auth&action=login");
        exit();
    }
}