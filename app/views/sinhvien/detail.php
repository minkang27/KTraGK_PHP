<?php include_once 'app/views/shares/header.php'; ?>

<h1 style="text-align: center; margin-bottom: 20px; color: #2c3e50;">Thông tin sinh viên</h1>

<div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;">
    <div style="text-align: center; margin-bottom: 20px;">
        <?php if ($sv->Hinh): ?>
            <img src="/php/KtraGK/public/assets/images/<?= basename($sv->Hinh) ?>" style="max-width: 150px; height: auto; border-radius: 8px; border: 1px solid #ddd;">
        <?php else: ?>
            <div style="font-size: 14px; color: #7f8c8d;">Không có hình ảnh</div>
        <?php endif; ?>
    </div>
    <div style="font-size: 16px; color: #34495e;">
        <p><strong>Mã SV:</strong> <?= $sv->MaSV ?></p>
        <p><strong>Họ tên:</strong> <?= $sv->HoTen ?></p>
        <p><strong>Giới tính:</strong> <?= $sv->GioiTinh ?></p>
        <p><strong>Ngày sinh:</strong> <?= $sv->NgaySinh ?></p>
        <p><strong>Ngành học:</strong> <?= $sv->TenNganh ?></p>
    </div>
</div>

<div style="text-align: center; margin-top: 20px;">
    <a href="index.php?controller=sinhvien" 
       style="padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 5px;">
       Quay lại
    </a>
</div>

<?php include_once 'app/views/shares/footer.php'; ?>