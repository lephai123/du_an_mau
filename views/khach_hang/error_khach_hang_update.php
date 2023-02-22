<?php
    if(strlen($user) == 0){
        $_SESSION['de_trong_ten_dn'] = "Không được để trống tên đăng nhập!";
        $allowUpload = false;
    }else{
        unset($_SESSION['de_trong_ten_dn']);
    }

    if(!emailValid($email)){
        $_SESSION['sdd_email'] = "Email không không đúng định dạng!";
        $allowUpload = false;
    }else{
        unset($_SESSION['sdd_email']);
    }

    if(strlen($email) == 0){
        $_SESSION['de_trong_email'] = "Không được để trống email!";
        $allowUpload = false;
    }else{
        unset($_SESSION['de_trong_email']);
    }

    if($pass_cu != check_mk_theo_ma_kh($ma_khach_hang)['pass']){
        $_SESSION['mk_khong_chinh_xac'] = "Mật khẩu không chính xác!";
        $allowUpload = false;
    }else{
        $allowUpload = false;
        unset($_SESSION['mk_khong_chinh_xac']);
        if($pass_moi != $pass_nhap_lai_moi){
            $_SESSION['khong_trung_khop_mk'] = "Mật khẩu không trùng khớp!";
            $allowUpload = false;
        }else{
            unset($_SESSION['mk_khong_chinh_xac']);
            unset($_SESSION['khong_trung_khop_mk']);
            $allowUpload = true;
        }
    }

    if(strlen($pass_moi) < 3){
        $_SESSION['dd_pass'] = "Mật khẩu phải có ít nhất 3 ký tự!";
        $allowUpload = false;
    }else{
        unset($_SESSION['dd_pass']);
    }
    // echo '<pre>';
    // print_r(check_mk_theo_ma_kh($ma_khach_hang)['pass']);
