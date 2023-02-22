<?php
function view_gio_hang($del)
{
    global $url_img;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoa_sp_th = '<th>Thao tác</th>';
        $xoa_sp_td_2 = '<td></td>';
        $row = 6;
    } else {
        $xoa_sp_th = '';
        $xoa_sp_td_2 = '';
        $row = 5;
    }
    echo '
        <tr class="thanh_mau_gio_hang">
            <th>STT</th>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        ' . $xoa_sp_th . '
        </tr>
        ';

    foreach ($_SESSION['them_hh'] as $add) {
        $hinh = $url_img . $add[2];
        $thanhtien = $add[3] * $add[4];
        $tong += $thanhtien;
        if ($del == 1) {
            $xoa_sp_td = '
            <td class="submit_them_gio_hang">
            <a href="index.php?act=xoa_gio_hang&id_xoa=' . $i . '"><input type="button" value="Xóa"></a>
            </td>
            ';
        } else {
            $xoa_sp_td = '';
        }

        echo '
            <tr>
                <td>' . $i . '</td>
                <td><img src="' . $hinh . '" alt="" width="150px" height="150px"></td>
                <td>' . $add[1] . '</td>
                <td>' . $add[3] . '</td>
                <td>' . $add[4] . '</td>
                <td>' . $thanhtien . '</td>
                ' . $xoa_sp_td . '
            </tr>
            ';
        $i += 1;
    }
    echo '
            <tr>
                <td colspan="' . $row . '">Tổng đơn hàng</td>
                <td>' . $tong . '</td>
                ' . $xoa_sp_td_2 . '
            </tr>
        ';
}

function don_hang_chi_tiet($list)
{
    global $url_img;
    $tong = 0;
    $i = 0;
    echo '
<tr class="thanh_mau_gio_hang">
    <th>STT</th>
    <th>Hình</th>
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
</tr>
    ';

    foreach ($list as $add) {
        $hinh = $url_img . $add['hinh'];
        $tong += $add['don_gia_cart'];
        echo '
            <tr>
                <td>' . $i . '</td>
                <td><img src="' . $hinh . '" alt="" width="150px" height="150px"></td>
                <td>' . $add['user_cart'] . '</td>
                <td>' . $add['don_gia_cart'] . '</td>
                <td>' . $add['so_luong_cart'] . '</td>
                <td>' . $add['thanh_tien_cart'] . '</td>
            </tr>
            ';
        $i += 1;
    }
    echo '
            <tr>
                <td colspan="5">Tổng đơn hàng</td>
                <td>' . $tong . '</td>
            </tr>
        ';
}

function tong_don_hang()
{
    $tong = 0;
    foreach ($_SESSION['them_hh'] as $add) {
        $thanhtien = $add[3] * $add[4];
        $tong += $thanhtien;
    }
    return $tong;
}


function insert_don_hang($id_user_dh,$name_dh, $email_dh, $dien_thoai_dh, $dia_chi_dh, $pttt_dh, $ngay_dat_hang, $total)
{
    $sql = "insert into don_hang(id_user_dh,name_dh,email_dh,dien_thoai_dh,dia_chi_dh,pttt_dh,ngay_dat_hang,total) values('$id_user_dh','$name_dh','$email_dh','$dien_thoai_dh','$dia_chi_dh','$pttt_dh','$ngay_dat_hang','$total')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($id_user, $id_pro, $hinh, $user_cart, $don_gia_cart, $so_luong_cart, $thanh_tien_cart, $id_dh)
{
    $sql = "insert into cart(id_user,id_pro,hinh,user_cart,don_gia_cart,so_luong_cart,thanh_tien_cart,id_dh) values('$id_user','$id_pro','$hinh','$user_cart','$don_gia_cart','$so_luong_cart','$thanh_tien_cart','$id_dh')";
    return pdo_execute($sql);
}

function load_one_don_hang($id)
{
    $sql = "select * from don_hang where id_don_hang = " . $id;
    $dh = pdo_query_one($sql);
    return $dh;
}

function load_all_cart($id)
{
    $sql = "select * from cart where id_dh = " . $id;
    $dh = pdo_query($sql);
    return $dh;
}

function update_don_hang($id_don_hang,$name_dh, $dia_chi_dh,$dien_thoai_dh, $email_dh,$total, $ngay_dat_hang,$status){
        $sql = "update don_hang set
        name_dh= '".$name_dh."',
        dia_chi_dh='$dia_chi_dh',
        dien_thoai_dh='$dien_thoai_dh',
        email_dh='".$email_dh."', 
        ngay_dat_hang='".$ngay_dat_hang."', 
        total='".$total."', 
        status = '".$status."'
        where id_don_hang =".$id_don_hang;
    pdo_execute($sql);
}

function load_cart_count($id)
{
    $sql = "select * from cart where id_dh = " . $id;
    $dh = pdo_query($sql);
    return sizeof($dh);
}

function delete_don_hang_cart($id){
    $sql = "delete from cart where id_dh =".$id;
    pdo_execute($sql);
}

function delete_don_hang($id){
    $sql = "delete from don_hang where id_don_hang =".$id;
    pdo_execute($sql);
}

function search_list_don_hang($key = "",$id_user_dh=0)
{

    $sql = "select * from don_hang where 1";
    if($id_user_dh > 0){
        $sql.= " AND id_user_dh = " . $id_user_dh;
    }
    if($key != ""){
        $sql.= " AND id_don_hang like '%" . $key . "%'";
    }
    
    $sql.= " order by id_don_hang desc";
    $dh = pdo_query($sql);
    return $dh;
}

function load_all_don_hang($id_user_dh)
{

    $sql = "select * from don_hang where 1";
    if($id_user_dh > 0){
        $sql.= " AND id_user_dh = " . $id_user_dh;
    }
    
    $sql.= " order by id_don_hang desc";
    $dh = pdo_query($sql);
    return $dh;
}

function delete_don_hang_ct($id){
    $sql = "delete from don_hang where id_user_dh =".$id;
    pdo_execute($sql);
}

function pttt_dh($n){
    switch ($n) {
        case '1':
            $tt = "Thanh toán trực tiếp";
            break;
        case '2':
            $tt = "chuyển khoản";
            break;
        case '3':
            $tt = "thanh toán";
            break;
        default:
            $tt = "Thanh toán trực tiếp";
            break;
    }
    return $tt;
}

function get_ttdh($n){
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Giao hàng thành công";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}

function load_all_thongke(){
    $sql = "select loai_hang.ma_loai as malh, loai_hang.ten_loai as tenlh, count(hang_hoa.ma_hh) as countsp, min(hang_hoa.don_gia) as minprice, max(hang_hoa.don_gia) as maxprice, avg(hang_hoa.don_gia) as avgprice";
    $sql.= " from hang_hoa left join loai_hang on loai_hang.ma_loai = hang_hoa.id_ma_loai";
    $sql.= " group by loai_hang.ma_loai order by loai_hang.ma_loai desc";
    $dh = pdo_query($sql);
    return $dh;
}