<?php include_once 'app/views/shares/header.php'; ?>

<h1 style="text-align: center; margin-bottom: 20px;">Thêm sinh viên</h1>

<form action="index.php?controller=sinhvien&action=create" method="post" enctype="multipart/form-data" 
      style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div style="margin-bottom: 15px;">
        <label for="MaSV" style="display: block; margin-bottom: 5px; font-weight: bold;">Mã SV</label>
        <input type="text" id="MaSV" name="MaSV" required 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="HoTen" style="display: block; margin-bottom: 5px; font-weight: bold;">Họ tên</label>
        <input type="text" id="HoTen" name="HoTen" required 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="GioiTinh" style="display: block; margin-bottom: 5px; font-weight: bold;">Giới tính</label>
        <select id="GioiTinh" name="GioiTinh" 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="NgaySinh" style="display: block; margin-bottom: 5px; font-weight: bold;">Ngày sinh</label>
        <input type="date" id="NgaySinh" name="NgaySinh" 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="Hinh" style="display: block; margin-bottom: 5px; font-weight: bold;">Hình ảnh</label>
        <input type="file" id="Hinh" name="Hinh" 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="MaNganh" style="display: block; margin-bottom: 5px; font-weight: bold;">Ngành học</label>
        <select id="MaNganh" name="MaNganh" 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            <?php foreach ($nganhHoc as $nganh): ?>
                <option value="<?= $nganh->MaNganh ?>"><?= $nganh->TenNganh ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div style="text-align: center;">
        <button type="submit" 
                style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            Lưu
        </button>
        <a href="index.php?controller=sinhvien" 
           style="padding: 10px 20px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 4px; margin-left: 10px;">
           Quay