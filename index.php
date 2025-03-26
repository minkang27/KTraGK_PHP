<?php
session_start();

// Load các file cần thiết
require_once 'app/config/database.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/SinhVienController.php';
require_once 'app/controllers/HocPhanController.php';
require_once 'app/controllers/DangKyController.php';

// Xác định controller và action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Xử lý routing
switch ($controller) {
    case 'auth':
        $authController = new AuthController();
        switch ($action) {
            case 'login':
                $authController->login();
                break;
            case 'logout':
                $authController->logout();
                break;
            default:
                $authController->login();
                break;
        }
        break;
        
    case 'sinhvien':
        // Kiểm tra đăng nhập trước khi vào quản lý sinh viên
        if (!isset($_SESSION['MaSV'])) {
            header("Location: ?controller=auth&action=login");
            exit();
        }
        
        $sinhVienController = new SinhVienController();
        switch ($action) {
            case 'create':
                $sinhVienController->create();
                break;
            case 'edit':
                $sinhVienController->edit($id);
                break;
            case 'delete':
                $sinhVienController->delete($id);
                break;
            case 'detail':
                $sinhVienController->detail($id);
                break;
            default:
                $sinhVienController->index();
                break;
        }
        break;
        
    case 'hocphan':
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['MaSV'])) {
            header("Location: ?controller=auth&action=login");
            exit();
        }
        
        $hocPhanController = new HocPhanController();
        switch ($action) {
            case 'dangky':
                $hocPhanController->dangky();
                break;
            default:
                $hocPhanController->dangky();
                break;
        }
        break;
        
    case 'dangky':
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['MaSV'])) {
            header("Location: ?controller=auth&action=login");
            exit();
        }
        
        $dangKyController = new DangKyController();
        switch ($action) {
            case 'danhsach':
                $dangKyController->danhsach();
                break;
            default:
                $dangKyController->danhsach();
                break;
        }
        break;
        
    default:
        // Mặc định chuyển đến trang đăng nhập
        header("Location: ?controller=auth&action=login");
        exit();
}