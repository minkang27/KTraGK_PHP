<?php
require_once 'app/models/HocPhanModel.php';
require_once 'app/models/DangKyModel.php';
class HocPhanController {
    private $hpModel;
    private $dkModel;
    
    public function __construct() {
        $this->hpModel = new HocPhanModel();
        $this->dkModel = new DangKyModel();
    }
    
    public function dangky() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['them_hp'])) {
                $MaHP = $_POST['MaHP'];
                
                if (!isset($_SESSION['gio_hang'])) {
                    $_SESSION['gio_hang'] = array();
                }
                
                if (!in_array($MaHP, $_SESSION['gio_hang'])) {
                    $_SESSION['gio_hang'][] = $MaHP;
                }
            } elseif (isset($_POST['xoa_tat_ca'])) {
                unset($_SESSION['gio_hang']);
            } elseif (isset($_POST['luu_dang_ky'])) {
                $this->luuDangKy();
            }
            
            header("Location: ?controller=hocphan&action=dangky");
            exit();
        }
        
        if (isset($_GET['xoa_hp'])) {
            $MaHP = $_GET['xoa_hp'];
            $key = array_search($MaHP, $_SESSION['gio_hang']);
            if ($key !== false) {
                unset($_SESSION['gio_hang'][$key]);
            }
            header("Location: ?controller=hocphan&action=dangky");
            exit();
        }
        
        $hocPhan = $this->hpModel->getAll();
        require_once 'app/views/hocphan/dangky.php';
    }
    
    private function luuDangKy() {
        if (!empty($_SESSION['gio_hang'])) {
            $MaDK = $this->dkModel->createDangKy($_SESSION['MaSV']);
            
            foreach ($_SESSION['gio_hang'] as $MaHP) {
                $this->dkModel->createChiTietDangKy($MaDK, $MaHP);
                
                // Giảm số lượng dự kiến
                $hp = $this->hpModel->getByMaHP($MaHP);
                $newSoLuong = $hp->SoLuongDuKien - 1;
                $this->hpModel->updateSoLuong($MaHP, $newSoLuong);
            }
            
            unset($_SESSION['gio_hang']);
            $_SESSION['success'] = "Đăng ký học phần thành công!";
        } else {
            $_SESSION['error'] = "Vui lòng chọn học phần để đăng ký";
        }
    }
}