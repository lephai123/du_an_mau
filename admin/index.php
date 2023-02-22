<?php
session_start();
include "../model/model_loai_hang.php";
include "../model/model_hang_hoa.php";
include "../model/pdo.php";
include "../model/model_khach_hang.php";
include "../model/model_binh_luan.php";
include "../model/model_gio_hang.php";
include "header.php";
//controller

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
            /*Controller Loại Hàng*/
        case 'add_loai_hang':
            //kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['them_loai_hang']) && $_POST['them_loai_hang']) {
                $ten_loai = $_POST['ten_loai'];
                $allowUpload = true;

                include "../admin/loai_hang/error_loai_hang.php";

                if ($allowUpload == true) {
                    insert_loai_hang($ten_loai);
                    $thong_bao_them_loai_hang = "Thêm thành công";
                }
            }

            include "loai_hang/add.php";
            break;
        case 'list_loai_hang':
            $list_loai_hang = load_all_loai_hang();
            include "loai_hang/list.php";
            break;
        case 'xoa_loai_hang':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_loai_hang($_GET['id']);
            }
            $list_loai_hang = load_all_loai_hang();
            include "loai_hang/list.php";
            break;
        case 'sua_loai_hang':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $lh = load_one_loai_hang($_GET['id']);
            }
            include "loai_hang/update.php";
            break;
        case 'update_loai_hang':
            if (isset($_POST['cap_nhat_loai_hang']) && $_POST['cap_nhat_loai_hang']) {
                $ten_loai = $_POST['ten_loai'];
                $id_loai_hang = $_POST['id_loai_hang'];
                $allowUpload = true;

                include "../admin/loai_hang/error_loai_hang.php";
            
                if ($allowUpload == true) {
                    update_loai_hang($id_loai_hang, $ten_loai);
                    $thong_bao_cap_nhat_loai_hang = "Cập nhật thành công";
                } else {
                    header('location:index.php?act=sua_loai_hang&id=' . $id_loai_hang);
                }
            }

            $list_loai_hang = load_all_loai_hang();
            include "loai_hang/list.php";
            break;

            /*Controller Hàng Hóa*/
        case 'add_hang_hoa':
            if (isset($_POST['them_hang_hoa']) && $_POST['them_hang_hoa']) {

                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $ngay_nhap = $_POST['ngay_nhap'];
                $mo_ta = $_POST['mo_ta'];
                $dac_biet = $_POST['dac_biet'];
                $select_loai_hang = $_POST['select_loai_hang'];

                $name_anh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }

                $allowUpload = true;

                include "../admin/hang_hoa/error_hang_hoa.php";
                $allowUpload = validate_ngay_thang(1,$ngay_nhap);

                if($allowUpload == true){
                    insert_hang_hoa($ten_hh, $don_gia, $giam_gia, $name_anh, $ngay_nhap, $mo_ta, $dac_biet, $select_loai_hang);
                    $thong_bao_them_hang_hoa = "Thêm thành công";
                } 
            }
            $list_loai_hang = load_all_loai_hang();
            include "hang_hoa/add.php";
            break;
        case 'list_hang_hoa':
            if (isset($_POST['seacrch_hang_hoa']) && $_POST['seacrch_hang_hoa']) {
                $key_word = $_POST["key_word"];
                $select_loai_hang = $_POST['select_loai_hang'];
            } else {
                $key_word = '';
                $select_loai_hang = 0;
            }
            $list_loai_hang = load_all_loai_hang();
            $list_hang_hoa = load_all_hang_hoa($key_word, $select_loai_hang);
            include "hang_hoa/list.php";
            break;
        case 'xoa_hang_hoa':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_hang_hoa($_GET['id']);
            }
            $list_hang_hoa = load_all_hang_hoa("", 0);
            include "hang_hoa/list.php";
            break;
        case 'sua_hang_hoa':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $hh = load_one_hang_hoa($_GET['id']);
            }
            $list_loai_hang = load_all_loai_hang();
            include "hang_hoa/update.php";
            break;
        case 'update_hang_hoa':
            if (isset($_POST['cap_nhat_hang_hoa']) && $_POST['cap_nhat_hang_hoa']) {
                $id_hang_hoa = $_POST['id_hang_hoa'];
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $ngay_nhap = $_POST['ngay_nhap'];
                $mo_ta = $_POST['mo_ta'];
                $dac_biet = $_POST['dac_biet'];
                $select_loai_hang = $_POST['select_loai_hang'];

                $name_anh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $allowUpload = true;

                include "../admin/hang_hoa/error_hang_hoa.php";

                if($allowUpload == true){
                    update_hang_hoa($id_hang_hoa, $ten_hh, $don_gia, $giam_gia, $name_anh, $ngay_nhap, $mo_ta, $dac_biet, $select_loai_hang);
                    $thong_bao_cap_nhat_hang_hoa = "Cập nhật thành công";
                }else {
                    header('location:index.php?act=sua_hang_hoa&id=' . $id_hang_hoa);
                }

            }
            $list_loai_hang = load_all_loai_hang();
            $list_hang_hoa = load_all_hang_hoa("", 0);
            include "hang_hoa/list.php";
            break;

            /*Danh sách tài khoản - Controller*/
        case 'ds_khach_hang':
            $list_khach_hang = load_all_khach_hang();
            include "khach_hang/list.php";
            break;
        case 'xoa_khach_hang':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $xoa_list = delete_khach_hang($_GET['id']);
            }
            $list_khach_hang = load_all_khach_hang();
            include "khach_hang/list.php";
            break;
        case 'sua_khach_hang':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $tk = load_one_khach_hang($_GET['id']);
            }
            include "khach_hang/update.php";
            break;
        case 'update_khach_hang':
            if (isset($_POST['cap_nhat_khach_hang']) && $_POST['cap_nhat_khach_hang']) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $dia_chi = $_POST['dia_chi'];
                $vai_tro = $_POST['vai_tro'];
                $dien_thoai = $_POST['dien_thoai'];
                $ma_khach_hang = $_POST['ma_khach_hang'];
                $allowUpload = true;

                include "../admin/khach_hang/error_khach_hang.php";

                if ($allowUpload == true) {
                    update_khach_hang_trong_admin($ma_khach_hang, $email, $user, $pass, $dia_chi, $dien_thoai, $vai_tro);
                } else {
                    header('location:index.php?act=sua_khach_hang&id=' . $ma_khach_hang);
                }
            }

            $list_khach_hang = load_all_khach_hang();
            include "khach_hang/list.php";
            break;
            /*Controller bình luận*/
        case 'ds_binh_luan':
            $list_binh_luan = load_all_binh_luan(0);
            include "binh_luan/list.php";
            break;
        case 'xoa_binh_luan':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_binh_luan($_GET['id']);
            }
            $list_binh_luan = load_all_binh_luan(0);
            include "binh_luan/list.php";
            break;
        case 'binh_luan_hang_hoa':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $bl_hh = list_bl_hh($id);
            }
            include "binh_luan/list_bl_hh.php";
            break;
        case 'xoa_binh_luan_hh':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_binh_luan($_GET['id']);
            }
            $bl_hh = list_bl_hh($_GET['id_hh']);
            include "binh_luan/list_bl_hh.php";
            break;
            /*Controller đơn hàng */
        case 'list_don_hang':
            $list_don_hang = load_all_don_hang(0);
            include "don_hang/list.php";
            break;
        case 'search_list_don_hang':
            if (isset($_POST['key_word']) && $_POST['key_word'] != "") {
                $key = $_POST['key_word'];
            } else {
                $key = "";
            }
            $list_don_hang = search_list_don_hang($key, 0);
            include "don_hang/list.php";
            break;
        case 'xoa_don_hang':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_don_hang_cart($id);
                delete_don_hang($id);
            }
            $list_don_hang = load_all_don_hang(0);
            include "don_hang/list.php";
            break;
        case 'sua_don_hang':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $dh = load_one_don_hang($_GET['id']);
            }
            include "don_hang/update.php";
            break;
        case 'update_don_hang':
            if (isset($_POST['cap_nhat_don_hang']) && $_POST['cap_nhat_don_hang']) {
                $id_don_hang = $_POST['id_don_hang'];
                $name_dh = $_POST['name_dh'];
                $dia_chi_dh = $_POST['dia_chi_dh'];
                $dien_thoai_dh = $_POST['dien_thoai_dh'];
                $email_dh = $_POST['email_dh'];
                $total = $_POST['total'];
                $ngay_dat_hang = $_POST['ngay_dat_hang'];
                $status = $_POST['status'];

                update_don_hang($id_don_hang, $name_dh, $dia_chi_dh, $dien_thoai_dh, $email_dh, $total, $ngay_dat_hang, $status);
                $thong_bao_cap_nhat_loai_hang = "Cập nhật thành công";
            }

            $list_don_hang = load_all_don_hang(0);
            include "don_hang/list.php";
            break;
            /*Controller thống kê*/
        case 'thongke':
            $list_thong_ke = load_all_thongke();
            include "thong_ke/list.php";
            break;
        case 'bieu_do':
            $list_thong_ke = load_all_thongke();
            include "thong_ke/bieu_do.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
