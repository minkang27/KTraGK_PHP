<?php
class HocPhanModel {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function getAll() {
        $query = "SELECT * FROM HocPhan";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getByMaHP($MaHP) {
        $query = "SELECT * FROM HocPhan WHERE MaHP = :MaHP";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaHP', $MaHP);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function updateSoLuong($MaHP, $soLuong) {
        $query = "UPDATE HocPhan SET SoLuongDuKien = :SoLuong WHERE MaHP = :MaHP";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':SoLuong', $soLuong);
        $stmt->bindParam(':MaHP', $MaHP);
        return $stmt->execute();
    }
}