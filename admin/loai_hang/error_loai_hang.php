<?php
    $loai_hang_trung = kiemtra_trung_loai_hang($ten_loai);

    if(is_array($loai_hang_trung) != 0){
        if(isset($loai_hang_trung[0][0])){
            if ($ten_loai == $loai_hang_trung[0][0]) {
                $_SESSION['trung_ten_loai'] = "Tên loại hàng đã tồn tại mời nhập tên hàng khác!";
                $allowUpload = false;
            }else{
                unset($_SESSION['trung_ten_loai']);
            }
        }else{
            unset($_SESSION['trung_ten_loai']);
        }
    }else{
        $allowUpload = true;
    }

    if(strlen($ten_loai) == 0){
        $_SESSION['de_trong_don_hang'] = "Không được để trống tên loại hàng!";
        $allowUpload = false;
    }else{
        unset($_SESSION['de_trong_don_hang']);
    }
?>

