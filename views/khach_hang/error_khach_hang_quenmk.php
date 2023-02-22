<?php

    if(strlen($email) == 0){
        $_SESSION['de_trong_email'] = "Không được để trống email!";
        $allowUpload = false;
    }else{
        unset($_SESSION['de_trong_email']);
    }
?>