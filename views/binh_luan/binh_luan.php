<?php
session_start();
include "../../model/pdo.php";
include "../../model/model_binh_luan.php";
$idpro = $_REQUEST['idpro'];

$ds_binh_luan = load_all_binh_luan($idpro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<script>
    <?php
    if (isset($_SESSION['bl_dn'])) {
    ?>
        alert('<?php echo $_SESSION['bl_dn']; ?>');
    <?php
    }
    unset($_SESSION['bl_dn']);
    ?>
</script>

<body>
    <div class="danhmuc_trang_chu" style="margin-top: 0px;">
        <div class="title_danhmuc_trangchu">
            <h2>Bình luận</h2>
        </div>
        <div class="list_danh_muc">
            <table class="binh_luan" border="1">
                <tr>
                    <td>Nội dung</td>
                    <td>Người dùng</td>
                    <td>Ngày bình luận</td>
                </tr>
                <?php
                foreach ($ds_binh_luan as $bl) {
                    extract($bl);
                    echo '
                    <tr>
                    <td>' . $noi_dung . '</td>
                    <td>' . $id_user . '</td>
                    <td>' . $ngay_binh_luan . '</td>
                    </tr>
                    ';
                }
                ?>
            </table>
        </div>
        <div class="danhmuc_search">
            <form style="text-align: left;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="idpro" value="<?php if (isset($idpro) && ($idpro != "")) echo $idpro; ?>">
                <input class="sear_danhmuc" type="text" name="noi_dung">
                <input type="submit" value="Gửi bình luận" class="submit_danhmuc" name="gui_binh_luan">
            </form>
        </div>
        <?php
        if (isset($_POST['gui_binh_luan']) && $_POST['gui_binh_luan']) {
            if (!isset($_SESSION['user'])) {
                $_SESSION['bl_dn'] = "Đăng nhập mới có thể bình luận!";
                header("location: " . $_SERVER['HTTP_REFERER']);
            } else {
                unset($_SESSION['bl_dn']);
                $noi_dung = $_POST['noi_dung'];
                $id_pro = $_POST['idpro'];
                $id_user = $_SESSION['user']['ma_khach_hang'];
                $ngay_binh_luan = date('h:i:sa d/m/Y');
                insert_binh_luan($noi_dung, $id_user, $id_pro, $ngay_binh_luan);
                header("location: " . $_SERVER['HTTP_REFERER']);
            }
        }

        ?>
    </div>
</body>

</html>