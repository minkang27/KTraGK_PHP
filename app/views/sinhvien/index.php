<?php include_once 'app/views/shares/header.php'; ?>
<h2 style="text-align: center; margin-bottom: 20px;">Danh sách sinh viên</h2>

<div style="text-align: right; margin-bottom: 20px;">
    <a href="index.php?controller=sinhvien&action=create" 
       style="padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 5px;">
       Thêm sinh viên
    </a>
</div>

<table style="width: 100%; border-collapse: collapse; margin-top: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
    <thead>
        <tr style="background-color: #3498db; color: #fff;">
            <th style="padding: 10px; border: 1px solid #ddd;">Họ tên</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Mã SV</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Ngày sinh</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Giới tính</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Ngành học</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Hình ảnh</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sinhVien as $sv): ?>
        <tr style="background-color: #f9f9f9;">
            <td style="padding: 10px; border: 1px solid #ddd;"><?= $sv->HoTen ?></td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?= $sv->MaSV ?></td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?= $sv->NgaySinh ?></td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?= $sv->GioiTinh ?></td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?= $sv->TenNganh ?></td>
            <td style="padding: 10px; border: 1px solid #ddd;">
                <?php if ($sv->Hinh): ?>
                    <img src="KtraGK/public/assets/images/<?= basename($sv->Hinh) ?>" width="50" alt="Ảnh sinh viên" style="border-radius: 5px;">
                <?php else: ?>
                    Không có ảnh
                <?php endif; ?>
            </td>
            <td style="padding: 10px; border: 1px solid #ddd;">
                <a href="index.php?controller=sinhvien&action=detail&id=<?= $sv->MaSV ?>" 
                   style="color: #3498db; text-decoration: none; margin-right: 10px;">Chi tiết</a>
                <a href="index.php?controller=sinhvien&action=edit&id=<?= $sv->MaSV ?>" 
                   style="color: #2ecc71; text-decoration: none; margin-right: 10px;">Sửa</a>
                <a href="index.php?controller=sinhvien&action=delete&id=<?= $sv->MaSV ?>" 
                   style="color: #e74c3c; text-decoration: none;" 
                   onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include_once 'app/views/shares/footer.php'; ?>