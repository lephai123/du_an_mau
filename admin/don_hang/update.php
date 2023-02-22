<?php
if (is_array($dh)) {
    extract($dh);
}
$trang_thai_dh = get_ttdh($status);
$count_sp = load_cart_count($id_don_hang);
?>
<article>
    <div class="text_h3">
        <h3>Cập nhật đơn hàng</h3>
    </div>
    <form action="index.php?act=update_don_hang" method="post">
        <div class="row">
            <label for="">Mã loại</label>
            <br>
            <input type="text" name="id_don_hang " disabled value="<?php if (isset($id_don_hang) && ($id_don_hang != "")) echo $id_don_hang; ?>">
        </div>

        <div class="row">
            <label for="">Tên</label>
            <br>
            <input type="text" name="name_dh" value="<?php if (isset($name_dh) && ($name_dh != "")) echo $name_dh; ?>">
        </div>

        <div class="row">
            <label for="">Địa chỉ</label>
            <br>
            <input type="text" name="dia_chi_dh" value="<?php if (isset($dia_chi_dh) && ($dia_chi_dh != "")) echo $dia_chi_dh; ?>">
        </div>

        <div class="row">
            <label for="">Điện thoại</label>
            <br>
            <input type="text" name="dien_thoai_dh" value="<?php if (isset($dien_thoai_dh) && ($dien_thoai_dh != "")) echo $dien_thoai_dh; ?>">
        </div>

        <div class="row">
            <label for="">Email</label>
            <br>
            <input type="text" name="email_dh" value="<?php if (isset($email_dh) && ($email_dh != "")) echo $email_dh; ?>">
        </div>

        <div class="row">
            <label for="">Giá trị đơn hàng</label>
            <br>
            <input type="text" name="total" value="<?php if (isset($total) && ($total != "")) echo $total; ?>">
        </div>

        <div class="row">
            <label for="">Ngày đặt</label>
            <br>
            <input type="text" name="ngay_dat_hang" value="<?php if (isset($ngay_dat_hang) && ($ngay_dat_hang != "")) echo $ngay_dat_hang; ?>">
        </div>

        <div class="row">
            <label for="">Trạng thái đơn hàng</label>
            <select name="status">
                <?php
                    if($trang_thai_dh == "Đơn hàng mới"){
                        echo '<option value="0" selected>' . $trang_thai_dh . '</option>';
                        echo '<option value="1">Đang xử lý</option>';
                        echo '<option value="2">Đang giao hàng</option>';
                        echo '<option value="3">Giao hàng thành công</option>';
                    }
                    else if($trang_thai_dh == "Đang xử lý"){
                        echo '<option value="1" selected>' . $trang_thai_dh . '</option>';
                        echo '<option value="0">Đơn hàng mới</option>';
                        echo '<option value="2">Đang giao hàng</option>';
                        echo '<option value="3">Giao hàng thành công</option>';
                    }
                    else if($trang_thai_dh == "Đang giao hàng"){
                        echo '<option value="2" selected>' . $trang_thai_dh . '</option>';
                        echo '<option value="0">Đơn hàng mới</option>';
                        echo '<option value="1">Đang xử lý</option>';
                        echo '<option value="3">Giao hàng thành công</option>';
                    }
                    else if($trang_thai_dh == "Giao hàng thành công"){
                        echo '<option value="3" selected>' . $trang_thai_dh . '</option>';
                        echo '<option value="0">Đơn hàng mới</option>';
                        echo '<option value="2">Đang xử lý</option>';
                        echo '<option value="3">Giao hàng thành công</option>';
                    }

                ?>
            </select>
        </div>
                    
        <div class="row_click">
            <input type="hidden" name="id_don_hang" value="<?php if (isset($id_don_hang) && ($id_don_hang  > 0)) echo $id_don_hang; ?>">
            <input type="submit" name="cap_nhat_don_hang" value="Cập nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=list_don_hang">
                <input type="button" value="Danh sách">
            </a>
        </div>
        <?php
        if (isset($thong_bao_cap_nhat_loai_hang) && $thong_bao_cap_nhat_loai_hang != "") {
            echo $thong_bao_cap_nhat_loai_hang;
        }
        ?>
    </form>
</article>