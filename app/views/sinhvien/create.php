<?php include_once 'app/views/shares/header.php'; ?>
<h1>Thêm sinh viên</h1>

<form action="index.php?controller=sinhvien&action=create" method="post" enctype="multipart/form-data">
    <div>
        <label>Mã SV</label>
        <input type="text" name="MaSV" required>
    </div>
    <div>
        <label>Họ tên</label>
        <input type="text" name="HoTen" required>
    </div>
    <div>
        <label>Giới tính</label>
        <select name="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div>
        <label>Ngày sinh</label>
        <input type="date" name="NgaySinh">
    </div>
    <div>
        <label>Hình ảnh</label>
        <input type="file" name="Hinh">
    </div>
    <div>
        <label>Ngành học</label>
        <select name="MaNganh">
            <?php foreach ($nganhHoc as $nganh): ?>
                <option value="<?= $nganh->MaNganh ?>"><?= $nganh->TenNganh ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button type="submit">Lưu</button>
        <a href="index.php?controller=sinhvien">Quay lại</a>
    </div>
</form>

<?php include_once 'app/views/shares/footer.php'; ?>