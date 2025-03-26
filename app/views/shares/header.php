<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .navbar {
            background: linear-gradient(90deg, #2c3e50, #34495e);
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ecf0f1 !important;
        }
        .navbar-nav .nav-link {
            color: #ecf0f1 !important;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #1abc9c !important;
        }
        .navbar-nav .nav-item.active .nav-link {
            color: #1abc9c !important;
            font-weight: bold;
        }
        .navbar-toggler {
            border-color: #ecf0f1;
        }
        .navbar-toggler-icon {
            background-color: #ecf0f1;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">Hệ thống ĐKHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['MaSV'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=sinhvien">Quản lý sinh viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=hocphan&action=dangky">Đăng ký học phần</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=dangky&action=danhsach">Danh sách đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['MaSV'])): ?>
                        <li class="nav-item">
                            <span class="nav-link">Xin chào, <?= $_SESSION['HoTen'] ?></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=auth&action=logout">
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=auth&action=login">
                                <i class="fas fa-sign-in-alt"></i> Đăng nhập
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">