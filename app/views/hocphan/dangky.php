<?php include_once 'app/views/shares/header.php'; ?>
<h1 style="text-align: center; margin-bottom: 20px;">Đăng ký học phần</h1>

<div style="display: flex; gap: 20px;">
    <div style="flex: 2;">
        <h3>Danh sách học phần</h3>
        <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background-color: #f4f4f9;">
                    <th style="padding: 10px;">Mã HP</th>
                    <th style="padding: 10px;">Tên học phần</th>
                    <th style="padding: 10px;">Số tín chỉ</th>
                    <th style="padding: 10px;">Số lượng dự kiến</th>
                    <th style="padding: 10px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hocPhan as $hp): ?>
                    <tr>
                        <td style="padding: 10px;"><?= $hp->MaHP ?></td>
                        <td style="padding: 10px;"><?= $hp->TenHP ?></td>
                        <td style="padding: 10px;"><?= $hp->SoTinChi ?></td>
                        <td style="padding: 10px;"><?= $hp->SoLuongDuKien ?></td>
                        <td style="padding: 10px;">
                            <form method="post" style="margin: 0;">
                                <input type="hidden" name="MaHP" value="<?= $hp->MaHP ?>">
                                <button type="submit" name="them_hp" style="padding: 5px 10px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                                    Thêm
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div style="flex: 1;">
        <h3>Giỏ hàng</h3>
        <?php if (!empty($_SESSION['gio_hang'])): ?>
            <form method="post">
                <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background-color: #f4f4f9;">
                            <th style="padding: 10px;">Mã HP</th>
                            <th style="padding: 10px;">Tên HP</th>
                            <th style="padding: 10px;">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalTinChi = 0; ?>
                        <?php foreach ($_SESSION['gio_hang'] as $MaHP): ?>
                            <?php $hp = $this->hpModel->getByMaHP($MaHP); ?>
                            <?php $totalTinChi += $hp->SoTinChi; ?>
                            <tr>
                                <td style="padding: 10px;"><?= $hp->MaHP ?></td>
                                <td style="padding: 10px;"><?= $hp->TenHP ?></td>
                                <td style="padding: 10px;">
                                    <a href="index.php?controller=hocphan&action=dangky&xoa_hp=<?= $hp->MaHP ?>" 
                                       style="padding: 5px 10px; background-color: #e74c3c; color: #fff; text-decoration: none; border-radius: 4px;">
                                       Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p><strong>Tổng số tín chỉ: </strong><?= $totalTinChi ?></p>
                
                <div style="display: flex; gap: 10px; margin-top: 10px;">
                    <button type="submit" name="luu_dang_ky" style="flex: 1; padding: 10px; background-color: #2ecc71; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        Lưu đăng ký
                    </button>
                    <button type="submit" name="xoa_tat_ca" style="flex: 1; padding: 10px; background-color: #e74c3c; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        Xóa tất cả
                    </button>
                </div>
            </form>
        <?php else: ?>
            <div style="padding: 10px; background-color: #f4f4f9; border: 1px solid #ddd; border-radius: 4px; text-align: center;">
                Giỏ hàng trống
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include_once 'app/views/shares/footer.php'; ?>