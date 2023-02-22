<?php

    function insert_hang_hoa($ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$id_ma_loai){
        $sql = "insert into hang_hoa(ten_hh,don_gia,giam_gia,hinh,ngay_nhap,mo_ta,dac_biet,id_ma_loai) values('$ten_hh','$don_gia','$giam_gia','$hinh','$ngay_nhap','$mo_ta','$dac_biet','$id_ma_loai')";
        pdo_execute($sql);
    }

    function delete_hang_hoa($id){
        $sql = "delete from hang_hoa where ma_hh =".$id;
        pdo_execute($sql);
    }

    function load_all_hang_hoa_trang_chu(){
        $sql = "select * from hang_hoa where 1 order by ma_hh desc limit 0,9";
        $list_hang_hoa_trang_chu = pdo_query($sql);
        return $list_hang_hoa_trang_chu;
    }
    function load_all_hang_hoa_trang_chu_top10(){
        $sql = "select * from hang_hoa where 1 order by so_luot_xem desc limit 0,10";
        $list_hang_hoa_trang_chu_top10 = pdo_query($sql);
        return $list_hang_hoa_trang_chu_top10;
    }
    
    function load_all_hang_hoa($key_word,$select_loai_hang){
        $sql = "select * from hang_hoa where 1";
        if($key_word != ""){
            $sql.= " and ten_hh like '%".$key_word."%' ";
        }
        if($select_loai_hang > 0){
            $sql.= " and id_ma_loai = '".$select_loai_hang."'";
        }
        $sql.= " order by ma_hh desc";
        $list_hang_hoa = pdo_query($sql);
        return $list_hang_hoa;
    }

    function load_ten_danh_muc($id_ma_loai){
        if($id_ma_loai > 0){
            $sql = "select * from loai_hang where ma_loai = ".$id_ma_loai;
            $loai = pdo_query_one($sql);
            extract($loai);
            return $ten_loai;
        }else{
            return "";
        }
    }


    function load_one_hang_hoa($id){
        $sql = "select * from hang_hoa where ma_hh = ".$id;
        $hh = pdo_query_one($sql);
        return $hh;
    }

    function load_hang_hoa_cung_loai($ma_hh,$id_ma_loai){
        $sql = "select * from hang_hoa where id_ma_loai =".$id_ma_loai." AND ma_hh != ".$ma_hh;
        $hang_hoa_cung_loai = pdo_query($sql);
        return $hang_hoa_cung_loai;
    }

    function load_luot_xem($ma_hh){
        $sql = "update hang_hoa set so_luot_xem=so_luot_xem+1 where ma_hh=".$ma_hh;
        pdo_execute($sql);
    }

    function update_hang_hoa($id_hang_hoa,$ten_hh,$don_gia,$giam_gia,$name_anh,$ngay_nhap,$mo_ta,$dac_biet,$select_loai_hang){
        if($name_anh != ""){
            $sql = "update hang_hoa set
            ten_hh= '".$ten_hh."',
            don_gia='$don_gia',
            giam_gia='$giam_gia',
            hinh='".$name_anh."', 
            ngay_nhap='".$ngay_nhap."', 
            mo_ta='".$mo_ta."', 
            dac_biet='".$dac_biet."', 
            id_ma_loai = '".$select_loai_hang."'
            where ma_hh=".$id_hang_hoa;

        }else{
            $sql = "update hang_hoa set
            ten_hh= '".$ten_hh."',
            don_gia='$don_gia',
            giam_gia='$giam_gia',
            ngay_nhap='".$ngay_nhap."', 
            mo_ta='".$mo_ta."', 
            dac_biet='".$dac_biet."', 
            id_ma_loai = '".$select_loai_hang."'
            where ma_hh=".$id_hang_hoa;

        }
        pdo_execute($sql);
        //update hang_hoa set ten_hh= 'adc', don_gia=222, giam_gia=3, hinh='l.jpg', ngay_nhap=02-05-2022, mo_ta='ssssss', dac_biet='xxxas', id_ma_loai = 160 where ma_hh= 19;
    }
?>