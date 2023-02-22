<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Shop</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <script>
        <?php
        if (isset($_COOKIE['dangnhap'])) {
        ?>
            alert('<?php echo $_COOKIE['dangnhap']; ?>');
        <?php
        }
        ?>
        <?php
        if (isset($_COOKIE['dangxuat'])) {
        ?>
            alert('<?php echo $_COOKIE['dangxuat']; ?>');
        <?php
        }
        ?>
        <?php
        if(isset($_COOKIE['capnhat'])){
        ?>
        alert('<?php echo $_COOKIE['capnhat']; ?>');
        <?php
        }
        ?>
    </script>
    <div class="container">
        <header>
            <div class="admin">
                <h1>Siêu thị trực tuyến</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="index.php?act=gioi_thieu">Giới thiệu</a></li>
                    <li><a href="index.php?act=lien_he">Liên hệ</a></li>
                    <li><a href="index.php?act=gop_y">Góp ý</a></li>
                    <div class="icon_gio_hang">
                        <a href="index.php?act=list_gio_hang"><img src="views/image/icon/gio_hang.png" alt="">
                        </a>
                    </div>
                </ul>
            </nav>
        </header>