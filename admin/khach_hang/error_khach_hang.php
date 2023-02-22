<?php
    if(strlen($pass) < 3){
        $_SESSION['dd_pass'] = "Mật khẩu phải có ít nhất 3 ký tự!";
        $allowUpload = false;
    }else{
        unset($_SESSION['dd_pass']);
    }

    if(strlen($user) == 0){
        $_SESSION['de_trong_user'] = "Không được để trống tên đăng nhập!";
        $allowUpload = false;
    }else{
        unset($_SESSION['de_trong_user']);
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
