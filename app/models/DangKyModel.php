<?php
class DangKyModel {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function createDangKy($MaSV) {
        $query = "INSERT INTO DangKy (NgayDK, MaSV) VALUES (CURDATE(), :MaSV)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaSV', $MaSV);
        $stmt->execute();
        return $this->db->lastInsertId();
    }
    
    public function createChiTietDangKy($MaDK, $MaHP) {
        $query = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (:MaDK, :MaHP)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaDK', $MaDK);
        $stmt->bindParam(':MaHP', $MaHP);
        return $stmt->execute();
    }
    
    public function getDangKyBySV($MaSV) {
        $query = "SELECT dk.MaDK, dk.NgayDK, hp.MaHP, hp.TenHP, hp.SoTinChi 
                 FROM DangKy dk 
                 JOIN ChiTietDangKy ctdk ON dk.MaDK = ctdk.MaDK 
                 JOIN HocPhan hp ON ctdk.MaHP = hp.MaHP 
                 WHERE dk.MaSV = :MaSV 
                 ORDER BY dk.NgayDK DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaSV', $MaSV);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        // Nhóm kết quả theo mã đăng ký
        $grouped = [];
        foreach ($results as $item) {
            $grouped[$item->MaDK]['NgayDK'] = $item->NgayDK;
            $grouped[$item->MaDK]['items'][] = $item;
        }
        
        return $grouped;
    }
}