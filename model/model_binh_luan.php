<?php
    function insert_binh_luan($noi_dung,$id_user,$id_pro,$ngay_binh_luan){
        $sql = "insert into binh_luan(noi_dung,id_user,id_pro,ngay_binh_luan) values('$noi_dung','$id_user','$id_pro','$ngay_binh_luan')";
        pdo_execute($sql);
    }

    function load_all_binh_luan($idpro){

        $sql = "select * from binh_luan where 1";
        if($idpro > 0){
            $sql.= " AND id_pro='".$idpro."'";
        }else{
            $sql.= " order by ma_binh_luan desc";
        }
        $list_binh_luan = pdo_query($sql);
        return $list_binh_luan;
    }

    function delete_binh_luan($id){
        $sql = "delete from binh_luan where ma_binh_luan =".$id;
        pdo_execute($sql);
    }

    function list_bl_hh($id){
        $sql = "select binh_luan.ma_binh_luan as mabl, binh_luan.noi_dung as noidung, binh_luan.ngay_binh_luan as ngaybinhluan, binh_luan.id_user as user, binh_luan.id_pro as idpro
        from hang_hoa inner join binh_luan on 
        hang_hoa.ma_hh = binh_luan.id_pro 
        where binh_luan.id_pro =".$id;
        $dh = pdo_query($sql);
        return $dh;
    }
    function lay_id_hh($id){
        $sql = "SELECT id_pro FROM `binh_luan` WHERE ma_binh_luan =".$id;
        $dh = pdo_query($sql);
        return $dh;
    }

