<?php
    if (strlen($user) == 0) {
        $_SESSION['de_trong_tk_dn'] = "Không được để trống tên đăng nhập!";
        $allowUpload = false;
        unset($_SESSION['mk_ko_tt']);
        unset($_SESSION['tk_ko_tt']);
    } else {
        unset($_SESSION['de_trong_tk_dn']);
    }

    function trong_mk_khidn($user){
        if (strlen($user) == 0) {
            $_SESSION['de_trong_tk_dn'] = "Không được để trống tên đăng nhập!";
            return $_SESSION['de_trong_tk_dn'];
        } else {
            unset($_SESSION['de_trong_tk_dn']);
        }
    }
