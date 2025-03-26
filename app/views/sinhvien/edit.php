<?php include_once 'app/views/shares/header.php'; ?>
<h1>Chi tiết sinh viên</h1>

<div>
    <div>
        <div>
            <div>
                <?php if ($sv->Hinh): ?>
                    <img src="/student/public/assets/images/<?= basename($sv->Hinh) ?>" style="max-width: 100%; height: auto;">
                <?php else: ?>
                    <div>Không có hình ảnh</div>
                <?php endif; ?>
            </div>
            <div>
                <h4><?= $sv->HoTen ?></h4>
                <p><strong>Mã SV:</strong> <?= $sv->MaSV ?></p>
                <p><strong>Giới tính:</strong> <?= $sv->GioiTinh ?></p>
                <p><strong>Ngày sinh:</strong> <?= $sv->NgaySinh ?></p>
                <p><strong>Ngành học:</strong> <?= $sv->TenNganh ?></p>
            </div>
        </div>
    </div>
</div>

<a href="index.php?controller=sinhvien">Quay lại</a>

<?php include_once 'app/views/shares/footer.php'; ?>