<?php
class SinhVienModel {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function getAll() {
        $query = "SELECT sv.*, nh.TenNganh 
                 FROM SinhVien sv 
                 JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getById($MaSV) {
        $query = "SELECT sv.*, nh.TenNganh 
                 FROM SinhVien sv 
                 JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh 
                 WHERE sv.MaSV = :MaSV";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaSV', $MaSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function create($data) {
        $query = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                 VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':MaSV', $data['MaSV']);
        $stmt->bindParam(':HoTen', $data['HoTen']);
        $stmt->bindParam(':GioiTinh', $data['GioiTinh']);
        $stmt->bindParam(':NgaySinh', $data['NgaySinh']);
        $stmt->bindParam(':Hinh', $data['Hinh']);
        $stmt->bindParam(':MaNganh', $data['MaNganh']);
        
        return $stmt->execute();
    }
    
    public function update($data) {
        $query = "UPDATE SinhVien SET 
                 HoTen = :HoTen,
                 GioiTinh = :GioiTinh,
                 NgaySinh = :NgaySinh,
                 MaNganh = :MaNganh";
        
        if (!empty($data['Hinh'])) {
            $query .= ", Hinh = :Hinh";
        }
        
        $query .= " WHERE MaSV = :MaSV";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':MaSV', $data['MaSV']);
        $stmt->bindParam(':HoTen', $data['HoTen']);
        $stmt->bindParam(':GioiTinh', $data['GioiTinh']);
        $stmt->bindParam(':NgaySinh', $data['NgaySinh']);
        $stmt->bindParam(':MaNganh', $data['MaNganh']);
        
        if (!empty($data['Hinh'])) {
            $stmt->bindParam(':Hinh', $data['Hinh']);
        }
        
        return $stmt->execute();
    }
    
    public function delete($MaSV) {
        $this->db->beginTransaction();
        
        try {
            // Xóa trong ChiTietDangKy
            $query1 = "DELETE FROM ChiTietDangKy WHERE MaDK IN (SELECT MaDK FROM DangKy WHERE MaSV = :MaSV)";
            $stmt1 = $this->db->prepare($query1);
            $stmt1->bindParam(':MaSV', $MaSV);
            $stmt1->execute();
            
            // Xóa trong DangKy
            $query2 = "DELETE FROM DangKy WHERE MaSV = :MaSV";
            $stmt2 = $this->db->prepare($query2);
            $stmt2->bindParam(':MaSV', $MaSV);
            $stmt2->execute();
            
            // Xóa sinh viên
            $query3 = "DELETE FROM SinhVien WHERE MaSV = :MaSV";
            $stmt3 = $this->db->prepare($query3);
            $stmt3->bindParam(':MaSV', $MaSV);
            $stmt3->execute();
            
            $this->db->commit();
            return true;
        } catch(PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }
}