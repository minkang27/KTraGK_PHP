<?php include_once 'app/views/shares/header.php'; ?>

<h1 style="text-align: center; margin-bottom: 30px; font-family: Arial, sans-serif; color: #2c3e50;">Đăng ký học phần</h1>

<!-- Danh sách học phần -->
<div style="max-width: 1200px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;">
    <h2 style="text-align: center; color: #3498db; margin-bottom: 20px;">Danh sách học phần</h2>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
            <thead>
                <tr style="background-color: #3498db; color: #fff;">
                    <th style="padding: 10px; text-align: left;">Mã HP</th>
                    <th style="padding: 10px; text-align: left;">Tên học phần</th>
                    <th style="padding: 10px; text-align: left;">Số tín chỉ</th>
                    <th style="padding: 10px; text-align: left;">Số lượng dự kiến</th>
                    <th style="padding: 10px; text-align: center;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hocPhan as $hp): ?>
                    <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;"><?= $hp->MaHP ?></td>
                        <td style="padding: 10px;"><?= $hp->TenHP ?></td>
                        <td style="padding: 10px;"><?= $hp->SoTinChi ?></td>
                        <td style="padding: 10px;"><?= $hp->SoLuongDuKien ?></td>
                        <td style="padding: 10px; text-align: center;">
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="MaHP" value="<?= $hp->MaHP ?>">
                                <button type="submit" name="them_hp" 
                                        style="padding: 5px 10px; background-color: #2ecc71; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                                    Thêm
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Giỏ hàng -->
<div style="max-width: 1200px; margin: 30px auto 0; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;">
    <h2 style="text-align: center; color: #e74c3c; margin-bottom: 20px;">Danh Sách Học Phần Đã chọn</h2>
    <?php if (!empty($_SESSION['gio_hang'])): ?>
        <form method="post">
            <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
                <thead>
                    <tr style="background-color: #e74c3c; color: #fff;">
                        <th style="padding: 10px; text-align: left;">Mã HP</th>
                        <th style="padding: 10px; text-align: left;">Tên HP</th>
                        <th style="padding: 10px; text-align: center;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalTinChi = 0; ?>
                    <?php foreach ($_SESSION['gio_hang'] as $MaHP): ?>
                        <?php $hp = $this->hpModel->getByMaHP($MaHP); ?>
                        <?php $totalTinChi += $hp->SoTinChi; ?>
                        <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                            <td style="padding: 10px;"><?= $hp->MaHP ?></td>
                            <td style="padding: 10px;"><?= $hp->TenHP ?></td>
                            <td style="padding: 10px; text-align: center;">
                                <a href="index.php?controller=hocphan&action=dangky&xoa_hp=<?= $hp->MaHP ?>" 
                                   style="padding: 5px 10px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 4px;">
                                   Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p style="margin-top: 10px; font-size: 16px; text-align: center;"><strong>Tổng số tín chỉ: </strong><?= $totalTinChi ?></p>
            
            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="submit" name="luu_dang_ky" 
                        style="flex: 1; padding: 10px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    Lưu đăng ký
                </button>
                <button type="submit" name="xoa_tat_ca" 
                        style="flex: 1; padding: 10px; background-color: #e74c3c; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    Xóa tất cả
                </button>
            </div>
        </form>
    <?php else: ?>
        <div style="text-align: center; font-size: 16px; color: #7f8c8d;">Danh sách trống</div>
    <?php endif; ?>
</div>

<?php include_once 'app/views/shares/footer.php'; ?>