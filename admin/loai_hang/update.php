<?php
    if(is_array($lh)){
        extract($lh);
    }
?>
<article>
    <div class="text_h3">
        <h3>Cập nhật loại hàng hóa</h3>
    </div>
    <form action="index.php?act=update_loai_hang" method="post">
        <div class="row">
            <label for="">Mã loại</label>
            <br>
            <input type="text" name="ma_loai" disabled value="<?php if(isset($ma_loai) && ($ma_loai != "")) echo $ma_loai; ?>">
        </div>

        <div class="row">
            <label for="">Tên loại</label>
            <br>
            <input type="text" name="ten_loai" value="<?php if(isset($ten_loai) && ($ten_loai != "")) echo $ten_loai; ?>">
            <b style="color: red;"><?php echo isset($_SESSION['trung_ten_loai']) ? "Tên loại hàng của bạn không thay đổi mời bấm vào danh sách hoặc đổi tên loại hàng" : ""?></b>
            <b style="color: red;"><?php echo isset($_SESSION['de_trong_don_hang']) ? $_SESSION['de_trong_don_hang'] : ""?></b>
        </div>

        <div class="row_click">
            <input type="hidden" name="id_loai_hang" value="<?php if(isset($ma_loai) && ($ma_loai > 0)) echo $ma_loai; ?>">
            <input type="submit" name="cap_nhat_loai_hang" value="Cập nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=list_loai_hang">
                <input type="button" value="Danh sách">
            </a>
        </div>
        <?php
            if(isset($thong_bao_cap_nhat_loai_hang) && $thong_bao_cap_nhat_loai_hang != ""){
                echo $thong_bao_cap_nhat_loai_hang;
            }
        ?>
    </form>
</article>