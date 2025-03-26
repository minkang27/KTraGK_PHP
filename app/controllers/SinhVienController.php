<?php
require_once 'app/models/SinhVienModel.php';
require_once 'app/models/NganhHocModel.php';
class SinhVienController {
    private $svModel;
    private $nganhModel;
    
    public function __construct() {
        $this->svModel = new SinhVienModel();
        $this->nganhModel = new NganhHocModel();
    }
    
    public function index() {
        $sinhVien = $this->svModel->getAll();
        require_once 'app/views/sinhvien/index.php';
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'MaSV' => $_POST['MaSV'],
                'HoTen' => $_POST['HoTen'],
                'GioiTinh' => $_POST['GioiTinh'],
                'NgaySinh' => $_POST['NgaySinh'],
                'Hinh' => $this->uploadImage(),
                'MaNganh' => $_POST['MaNganh']
            ];
            
            if ($this->svModel->create($data)) {
                header("Location: ?controller=sinhvien");
                exit();
            } else {
                die('Có lỗi xảy ra khi thêm sinh viên');
            }
        } else {
            $nganhHoc = $this->nganhModel->getAll();
            require_once 'app/views/sinhvien/create.php';
        }
    }
    
    public function edit($MaSV) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'MaSV' => $MaSV,
                'HoTen' => $_POST['HoTen'],
                'GioiTinh' => $_POST['GioiTinh'],
                'NgaySinh' => $_POST['NgaySinh'],
                'MaNganh' => $_POST['MaNganh']
            ];
            
            if (!empty($_FILES['Hinh']['name'])) {
                $data['Hinh'] = $this->uploadImage();
            }
            
            if ($this->svModel->update($data)) {
                header("Location: ?controller=sinhvien");
                exit();
            } else {
                die('Có lỗi xảy ra khi cập nhật sinh viên');
            }
        } else {
            $sv = $this->svModel->getById($MaSV);
            $nganhHoc = $this->nganhModel->getAll();
            require_once 'app/views/sinhvien/edit.php';
        }
    }
    
    public function delete($MaSV) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->svModel->delete($MaSV)) {
                header("Location: ?controller=sinhvien");
                exit();
            } else {
                die('Có lỗi xảy ra khi xóa sinh viên');
            }
        } else {
            $sv = $this->svModel->getById($MaSV);
            require_once 'app/views/sinhvien/delete.php';
        }
    }
    
    public function detail($MaSV) {
        $sv = $this->svModel->getById($MaSV);
        require_once 'app/views/sinhvien/detail.php';
    }
    
    private function uploadImage() {
        $target_dir = "public/assets/images/";
        $target_file = $target_dir . basename($_FILES["Hinh"]["name"]);
        move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file);
        return "assets/images/" . basename($_FILES["Hinh"]["name"]);
    }
}