<?php
require_once 'app/models/DangKyModel.php';
class DangKyController {
    private $dkModel;
    
    public function __construct() {
        $this->dkModel = new DangKyModel();
    }
    
    public function danhsach() {
        if (!isset($_SESSION['MaSV'])) {
            header("Location: ?controller=auth&action=login");
            exit();
        }
        
        $dangKy = $this->dkModel->getDangKyBySV($_SESSION['MaSV']);
        require_once 'app/views/dangky/danhsach.php';
    }
}