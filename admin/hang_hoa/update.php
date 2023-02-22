<?php
if (is_array($hh)) {
    extract($hh);
}
$hinh_hang_hoa = "../upload/" . $hinh;
if (is_file($hinh_hang_hoa)) {
    $img = "<img src='" . $hinh_hang_hoa . "' width='100px' height='100px'>";
} else {
    $img = "Không có hình";
}
?>
<article>
    <div class="text_h3">
        <h3>Cập nhật loại hàng hóa</h3>
    </div>
    <form action="index.php?act=update_hang_hoa" method="post" enctype="multipart/form-data">
        <div class="row">
            <label for="">Mã hàng hóa</label>
            <br>
            <input type="text" name="ma_hh" disabled value="<?php if (isset($ma_hh) && ($ma_hh != "")) echo $ma_hh; ?>">
        </div>

        <div class="row">
            <label for="">Tên hàng hóa</label>
            <br>
            <input type="text" name="ten_hh" value="<?php if (isset($ten_hh) && ($ten_hh != "")) echo $ten_hh; ?>">
            <b style="color: red;"><?php echo isset($_SESSION['de_trong_ten_hh']) ? $_SESSION['de_trong_ten_hh'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Đơn giá</label>
            <br>
            <input type="text" name="don_gia" value="<?php if (isset($don_gia) && ($don_gia != "")) echo $don_gia; ?>">
            <b style="color: red;"><?php echo isset($_SESSION['don_gia_duong']) ? $_SESSION['don_gia_duong'] : ""?></b>
            <b style="color: red;"><?php echo isset($_SESSION['don_gia_de_trong']) ? $_SESSION['don_gia_de_trong'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Giảm giá</label>
            <br>
            <input type="text" name="giam_gia" value="<?php if (isset($giam_gia) && ($giam_gia != "")) echo $giam_gia; ?>">
            <b style="color: red;"><?php echo isset($_SESSION['giam_gia_duong']) ? $_SESSION['giam_gia_duong'] : ""?></b>
            <b style="color: red;"><?php echo isset($_SESSION['giam_gia_de_trong']) ? $_SESSION['giam_gia_de_trong'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Hình</label>
            <br>
            <input type="file" name="hinh">
            <?php
            echo $img;
            ?>
        </div>

        <div class="row">
            <label for="">Ngày nhập</label>
            <br>
            <input type="date" name="ngay_nhap" value="<?php if (isset($ngay_nhap) && ($ngay_nhap != "")) echo $ngay_nhap; ?>">
            <b style="color: red;"><?php echo isset($_SESSION['ngay_nhap_nho_hon_ht']) ? $_SESSION['ngay_nhap_nho_hon_ht'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Mô tả</label>
            <br>
            <textarea name="mo_ta" cols="30" rows="10"><?php if (isset($mo_ta) && ($mo_ta != "")) echo $mo_ta; ?></textarea>
        </div>

        <div class="row">
            <label for="">Đặc biệt</label>
            <br>
            <input type="text" name="dac_biet" value="<?php if (isset($dac_biet) && ($dac_biet != "")) echo $dac_biet; ?>">
        </div>

        <div class="row">
            <label for="">Loại hàng</label>
            <select name="select_loai_hang">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($list_loai_hang as $loai_hang) {
                    extract($loai_hang);
                    if($id_ma_loai == $ma_loai){
                        echo '<option value=' . $ma_loai . ' selected>' . $ten_loai . '</option>';
                    }else{
                        echo '<option value=' . $ma_loai . '>' . $ten_loai . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <div class="row_click">
            <input type="hidden" name="id_hang_hoa" value="<?php if (isset($ma_hh) && ($ma_hh != "")) echo $ma_hh; ?>">
            <input type="submit" name="cap_nhat_hang_hoa" value="Cập nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=list_hang_hoa">
                <input type="button" value="Danh sách">
            </a>
        </div>
        <?php
        if (isset($thong_bao_cap_nhat_hang_hoa) && $thong_bao_cap_nhat_hang_hoa != "") {
            echo $thong_bao_cap_nhat_hang_hoa;
        }
        ?>
    </form>
</article>