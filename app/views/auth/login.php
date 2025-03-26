<?php include_once 'app/views/shares/header.php'; ?>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f9;">
    <div style="width: 100%; max-width: 400px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h3 style="text-align: center; margin-bottom: 20px; color: #333;">Đăng nhập hệ thống</h3>
        
        <?php if (isset($error)): ?>
            <div style="color: #fff; background-color: #e74c3c; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center;">
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <div style="margin-bottom: 15px;">
                <label for="MaSV" style="display: block; margin-bottom: 5px; font-weight: bold;">Mã sinh viên</label>
                <input type="text" id="MaSV" name="MaSV" placeholder="Nhập mã sinh viên" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            </div>
            <button type="submit" 
                    style="width: 100%; padding: 10px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
                Đăng nhập
            </button>
        </form>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="#" style="text-decoration: none; color: #3498db;">Quên mật khẩu?</a>
        </div>
    </div>
</div>

<?php include_once 'app/views/shares/footer.php'; ?>