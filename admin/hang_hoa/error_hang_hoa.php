<?php
    if(strlen($ten_hh) == 0){
        $_SESSION['de_trong_ten_hh'] = "Không được để trống tên hàng hóa!";
        $allowUpload = false;
    }else{
        unset($_SESSION['de_trong_ten_hh']);
    }

    if(strlen($don_gia) < 0){
        $_SESSION['don_gia_duong'] = "Giá trị của đơn hàng phải lớn hơn 0!";
        $allowUpload = false;
    }else{
        unset($_SESSION['don_gia_duong']);
    }

    if(strlen($don_gia) == 0){
        $_SESSION['don_gia_de_trong'] = "Giá trị của đơn hàng không được để trống!";
        $allowUpload = false;
    }else{
        unset($_SESSION['don_gia_de_trong']);
    }

    if(strlen($giam_gia) < 0){
        $_SESSION['giam_gia_duong'] = "Giảm giá phải lớn hơn 0!";
        $allowUpload = false;
    }else{
        unset($_SESSION['giam_gia_duong']);
    }

    if(strlen($giam_gia) == 0){
        $_SESSION['giam_gia_de_trong'] = "Giảm giá không được để trống!";
        $allowUpload = false;
    }else{
        unset($_SESSION['giam_gia_de_trong']);
    }

    function validate_ngay_thang($n,$ngay_nhap){
        if($n == 1){
            if($ngay_nhap < date('Y-m-d+1')){
                $_SESSION['ngay_nhap_nho_hon_ht'] = "Ngày nhập phải lớn hơn ngày hiện tại!";
                return false;
            }else{
                unset($_SESSION['ngay_nhap_nho_hon_ht']);
                return true;
            }
        }
    }
