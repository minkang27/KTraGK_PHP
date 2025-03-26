<?php include_once 'app/views/shares/header.php'; ?>
<h1>Xóa sinh viên</h1>

<div>
    <p>Bạn có chắc chắn muốn xóa sinh viên <strong><?= $sv->HoTen ?></strong>?</p>
</div>

<form action="index.php?controller=sinhvien&action=delete&id=<?= $sv->MaSV ?>" method="post">
    <button type="submit">Xác nhận xóa</button>
    <a href="index.php?controller=sinhvien">Hủy bỏ</a>
</form>

<?php include_once 'app/views/shares/footer.php'; ?>