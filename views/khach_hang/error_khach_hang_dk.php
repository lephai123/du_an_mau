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

    if($pass != $nhap_lai_password){
        $_SESSION['khong_trung_khop_mk'] = "Mật khẩu không trùng khớp!";
        $allowUpload = false;
    }else{
        unset($_SESSION['khong_trung_khop_mk']);
    }

    if(strlen($pass) < 3){
        $_SESSION['dd_pass'] = "Mật khẩu phải có ít nhất 3 ký tự!";
        $allowUpload = false;
    }else{
        unset($_SESSION['dd_pass']);
    }

    // echo '<pre>';
    // print_r(load_one_email($email)['email']);
    if(load_one_email($email) != ""){
        $_SESSION['email_tt'] = "Email đã được đăng ký mời chọn email khác!";
        $allowUpload = false;
    }else{
        unset($_SESSION['email_tt']);
    }
    
    if(check_tk($user) != ""){
        $_SESSION['ten_dn_da_tt'] = "Tên đăng nhập đã tồn tại!";
        $allowUpload = false;
    }else{
        unset($_SESSION['ten_dn_da_tt']);
    }

