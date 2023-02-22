<article>
    <div class="text_h3">
        <h3>Thêm mới loại hàng hóa</h3>
    </div>
    <form action="index.php?act=add_loai_hang" method="post">
        <div class="row">
            <label for="">Mã loại</label>
            <br>
            <input type="text" name="ma_loai" disabled>
        </div>

        <div class="row">
            <label for="">Tên loại</label>
            <br>
            <input type="text" name="ten_loai">
            <b style="color: red;"><?php echo isset($_SESSION['trung_ten_loai']) ? $_SESSION['trung_ten_loai'] : ""?></b>
            <b style="color: red;"><?php echo isset($_SESSION['de_trong_don_hang']) ? $_SESSION['de_trong_don_hang'] : ""?></b>
        </div>

        <div class="row_click">
            <input type="submit" name="them_loai_hang" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=list_loai_hang">
                <input type="button" value="Danh sách">
            </a>
        </div>
        <?php
            if(isset($thong_bao_them_loai_hang) && $thong_bao_them_loai_hang != ""){
                echo $thong_bao_them_loai_hang;
            }
        ?>
    </form>
</article>