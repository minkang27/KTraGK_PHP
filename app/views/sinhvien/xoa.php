<?php include_once 'app/views/shares/header.php'; ?>

<h1 style="text-align: center; margin-bottom: 20px; color: #e74c3c;">Xóa sinh viên</h1>

<div style="max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
    <p style="font-size: 16px; color: #333;">Bạn có chắc chắn muốn xóa sinh viên <strong><?= $sv->HoTen ?></strong>?</p>
    
    <form action="index.php?controller=sinhvien&action=delete&id=<?= $sv->MaSV ?>" method="post" style="margin-top: 20px;">
        <button type="submit" 
                style="padding: 10px 20px; background-color: #e74c3c; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            Xác nhận xóa
        </button>
        <a href="index.php?controller=sinhvien" 
           style="padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 4px; margin-left: 10px;">
           Hủy bỏ
        </a>
    </form>
</div>

<?php include_once 'app/views/shares/footer.php'; ?>