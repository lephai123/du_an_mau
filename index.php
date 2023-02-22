<?php
session_start();
include "model/pdo.php";
include "model/model_loai_hang.php";
include "model/model_hang_hoa.php";
include "views/header.php";
include "model/model_khach_hang.php";
include "model/model_gio_hang.php";
include "url_img.php";

if (!isset($_SESSION['them_hh'])) {
    $_SESSION['them_hh'] = [];
}

$hang_hoa_new = load_all_hang_hoa_trang_chu();
$loai_hang_new = load_all_loai_hang();
$top10_new = load_all_hang_hoa_trang_chu_top10();

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];

    switch ($act) {
        case 'hanghoa':
            if (isset($_POST['key_danhmuc']) && $_POST['key_danhmuc'] != "") {
                $key_danhmuc = $_POST["key_danhmuc"];
            } else {
                $key_danhmuc = "";
            }
            if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
                $id_ma_loai = $_GET['ma_loai'];
            } else {
                $id_ma_loai = 0;
            }
            $danh_muc_hang_hoa = load_all_hang_hoa($key_danhmuc, $id_ma_loai);
            $ten_danhmuc = load_ten_danh_muc($id_ma_loai);
            include "views/danh_muc_hang_hoa/danh_muc_hang_hoa.php";
            break;
        case 'hang_hoa_chi_tiet':
            if (isset($_GET['ma_hh']) && $_GET['ma_hh'] > 0) {
                $one_hang_hoa = load_one_hang_hoa($_GET['ma_hh']);
                extract($one_hang_hoa);
                load_luot_xem($_GET['ma_hh']);
                $hang_hoa_cung_loai = load_hang_hoa_cung_loai($_GET['ma_hh'], $id_ma_loai);
                include "views/chi_tiet_hang_hoa/chi_tiet_hang_hoa.php";
            } else {
                include "views/home.php";
            }
            break;
        case 'dang_ky':
            if (isset($_POST['dang_ky']) && $_POST['dang_ky']) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $nhap_lai_password = $_POST['nhap_lai_password'];
                $dia_chi = $_POST['dia_chi'];
                $dien_thoai = $_POST['dien_thoai'];
                $allowUpload = true;

                include "views/khach_hang/error_khach_hang_dk.php";

                if ($allowUpload == true) {
                    insert_khach_hang($email, $user, $pass, $dia_chi, $dien_thoai);
                    $thong_bao_dang_ky = "Đăng ký thành công";
                }
            }
            include "views/khach_hang/dang_ky.php";
            break;
        case 'dang_nhap':
            if (isset($_POST['submit_dangnhap']) && $_POST['submit_dangnhap']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $allowUpload = true;

                include "views/khach_hang/error_khach_hang.php";

                // if($allowUpload == true){
                //     $check_dang_nhap =  check_dangnhap($user, $pass);

                //     if (is_array($check_dang_nhap)) {
                //         $_SESSION['user'] = $check_dang_nhap;
                //         setcookie("dangnhap","Đăng nhập thành công",time()+2);
                //         // header('location:index.php');
                //         unset($_SESSION['tk_ko_tt']);
                //     } else {
                //         $_SESSION['tk_ko_tt'] = "Tài khoản không tồn tại";
                //     }
                // }

                if ($allowUpload == true) {
                    if (check_tk($user) != "") {
                        if ($pass == check_mk($user)['pass'] && !trong_mk_khidn($user)) {
                            $check_dang_nhap =  check_dangnhap($user, $pass);
                            if (is_array($check_dang_nhap)) {
                                $_SESSION['user'] = $check_dang_nhap;
                                setcookie("dangnhap", "Đăng nhập thành công", time() + 2);
                                header('location:index.php');
                                unset($_SESSION['tk_ko_tt']);
                                unset($_SESSION['mk_ko_tt']);
                            }
                        } else {
                            $_SESSION['mk_ko_tt'] = "Sai mật khẩu";
                            unset($_SESSION['tk_ko_tt']);
                        }
                    } else {
                        unset($_SESSION['mk_ko_tt']);
                        $_SESSION['tk_ko_tt'] = "Tài khoản không tồn tại";
                    }
                }
            }
            include "views/home.php";
            break;
        case 'edit_khach_hang':
            if (isset($_POST['cap_nhat']) && $_POST['cap_nhat']) {
                $user = $_POST['user'];
                $pass_cu = $_POST['pass_cu'];
                $pass_moi = $_POST['pass_moi'];
                $pass_nhap_lai_moi = $_POST['pass_nhap_lai_moi'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $dien_thoai = $_POST['dien_thoai'];
                $ma_khach_hang = $_POST['ma_khach_hang'];
                $allowUpload = true;

                include "views/khach_hang/error_khach_hang_update.php";

                if ($allowUpload == true) {
                    update_khach_hang($ma_khach_hang, $email, $user, $pass_moi, $dia_chi, $dien_thoai);
                    $_SESSION['user'] = check_dangnhap($user, $pass_moi);
                    setcookie("capnhat", "Cập nhật thành công", time() + 2);
                    header('location:index.php?act=edit_khach_hang');
                }
            }
            include "views/khach_hang/edit_khach_hang.php";
            break;
        case 'quen_mat_khau':
            if (isset($_POST['gui_email']) && $_POST['gui_email']) {
                $email = $_POST['email'];
                $check_email = check_email($email);
                $allowUpload = true;

                include "views/khach_hang/error_khach_hang_quenmk.php";

                if ($allowUpload = true) {
                    if (is_array($check_email)) {
                        $thong_bao_quenmk = "Mật khẩu của bạn là: " . $check_email['pass'];
                    } else {
                        $thong_bao_quenmk = "Email này không tồn tại";
                    }
                }
            }
            include "views/khach_hang/quen_mat_khau.php";
            break;
        case 'dang_xuat':
            session_unset();
            setcookie("dangxuat", "Đăng xuất thành công", time() + 2);
            header('location:index.php');
            break;
        case 'them_gio_hang':
            if (isset($_POST['them_gio_hang']) && $_POST['them_gio_hang']) {
                $ma_hh = $_POST['ma_hh'];
                $ten_hh = $_POST['ten_hh'];
                $hinh = $_POST['hinh'];
                $don_gia = $_POST['don_gia'];
                $so_luong = 1;
                $thanh_tien = $so_luong * $don_gia;
                $sp_add = [$ma_hh, $ten_hh, $hinh, $don_gia, $so_luong, $thanh_tien];
                array_push($_SESSION['them_hh'], $sp_add);
            }
            include "views/gio_hang/list_gio_hang.php";
            break;
            // case 'xoa_gio_hang':
            //     if(isset($_GET['id_xoa'])){
            //         array_splice($_SESSION['them_hh'],$_GET['id_xoa'],1);
            //     }else{
            //         $_SESSION['them_hh'] = [];
            //     }
            //     header('location:index.php?act=list_gio_hang');
            //     break;
        case 'xoa_gio_hang':
            if (isset($_GET['id_xoa'])) {
                array_splice($_SESSION['them_hh'], $_GET['id_xoa'], 1);
            } else {
                $_SESSION['them_hh'] = [];
            }
            header('location:index.php?act=list_gio_hang');
            break;
        case 'list_gio_hang':
            include "views/gio_hang/list_gio_hang.php";
            break;
        case 'dat_hang':
            include "views/gio_hang/dat_hang.php";
            break;
        case 'hoa_don':
            if (isset($_POST['dong_y_dat_hang']) && $_POST['dong_y_dat_hang']) {
                if (isset($_SESSION['user'])) {
                    $id_user_dh = $_SESSION['user']['ma_khach_hang'];
                } else {
                    $id = 0;
                }
                $name_dh = $_POST['user'];
                $dia_chi_dh = $_POST['dia_chi'];
                $email_dh = $_POST['email'];
                if (isset($_POST['pttt'])) {
                    $pttt_dh = $_POST['pttt'];
                } else {
                    $pttt_dh = false;
                }

                $dien_thoai_dh = $_POST['dien_thoai'];
                $ngay_dat_hang = date('h:i:sa d/m/Y');
                $total = tong_don_hang();

                $allowUpload = true;

                if (empty($pttt_dh)) {
                    $_SESSION['de_trong_pttt'] = "Bạn hãy chọn phương thức thanh toán!";
                    $allowUpload = false;
                } else {
                    unset($_SESSION['de_trong_pttt']);
                }

                if ($allowUpload == true) {
                    $id_don_hang =  insert_don_hang($id_user_dh, $name_dh, $email_dh, $dien_thoai_dh, $dia_chi_dh, $pttt_dh, $ngay_dat_hang, $total);
                    foreach ($_SESSION['them_hh'] as $cart) {
                        insert_cart($_SESSION['user']['ma_khach_hang'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $id_don_hang);
                    }
                    $_SESSION['cart'] = [];
                } else {
                    include "views/gio_hang/dat_hang.php";
                }
                //insert into don_hang : $session['them_hh'] & id_don_hang
            }
            $list_don_hang = load_one_don_hang($id_don_hang);
            $don_hang_chi_tiet = load_all_cart($id_don_hang);
            include "views/gio_hang/hoa_don.php";
            break;
        case 'don_hang_cua_toi':
            $list_don_hang_new = load_all_don_hang($_SESSION['user']['ma_khach_hang']);
            include "views/gio_hang/don_hang_cua_toi.php";
            break;
        case 'gioi_thieu':
            include "views/cac_danh_muc/gioi_thieu.php";
            break;
        case 'lien_he':
            include "views/cac_danh_muc/lien_he.php";
            break;
        case 'gop_y':
            include "views/cac_danh_muc/gop_y.php";
            break;
        default:
            include "views/home.php";
            break;
    }
} else {
    include "views/home.php";
}

include "views/footer.php";
