<?php include_once 'app/views/shares/header.php'; ?>

<h1 style="text-align: center; margin-bottom: 20px;">Danh sách đăng ký học phần</h1>
<a href="index.php?controller=hocphan&action=dangky" 
   style="display: inline-block; margin-bottom: 20px; padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 5px;">
   Đăng ký học phần mới
</a>

<?php if (!empty($dangKy)): ?>
    <?php foreach ($dangKy as $MaDK => $group): ?>
        <div style="margin-bottom: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div style="background-color: #f4f4f9; padding: 10px; border-bottom: 1px solid #ddd;">
                <h5 style="margin: 0;">Mã đăng ký: <?= $MaDK ?> - Ngày đăng ký: <?= $group['NgayDK'] ?></h5>
            </div>
            <div style="padding: 15px;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background-color: #3498db; color: #fff;">
                            <th style="padding: 10px; border: 1px solid #ddd;">Mã HP</th>
                            <th style="padding: 10px; border: 1px solid #ddd;">Tên học phần</th>
                            <th style="padding: 10px; border: 1px solid #ddd;">Số tín chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalTinChi = 0; ?>
                        <?php foreach ($group['items'] as $item): ?>
                            <?php $totalTinChi += $item->SoTinChi; ?>
                            <tr>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?= $item->MaHP ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?= $item->TenHP ?></td>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?= $item->SoTinChi ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #f4f4f9;">
                            <td colspan="2" style="padding: 10px; border: 1px solid #ddd; text-align: right;"><strong>Tổng số tín chỉ:</strong></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><strong><?= $totalTinChi ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div style="padding: 15px; background-color: #f4f4f9; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
        Bạn chưa đăng ký học phần nào
    </div>
<?php endif; ?>

<?php include_once 'app/views/shares/footer.php'; ?>