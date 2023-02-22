<article>
    <div class="text_h3">
        <h3>Thêm mới hàng hóa</h3>
    </div>
    <form action="index.php?act=add_hang_hoa" method="post" enctype="multipart/form-data">
        <div class="row">
            <label for="">Mã hàng hóa</label>
            <br>
            <input type="text" name="ma_hh" disabled>
        </div>

        <div class="row">
            <label for="">Tên hàng hóa</label>
            <br>
            <input type="text" name="ten_hh">
            <b style="color: red;"><?php echo isset($_SESSION['de_trong_ten_hh']) ? $_SESSION['de_trong_ten_hh'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Đơn giá</label>
            <br>
            <input type="text" name="don_gia">
            <b style="color: red;"><?php echo isset($_SESSION['don_gia_duong']) ? $_SESSION['don_gia_duong'] : ""?></b>
            <b style="color: red;"><?php echo isset($_SESSION['don_gia_de_trong']) ? $_SESSION['don_gia_de_trong'] : ""?></b>
        </div>
        
        <div class="row">
            <label for="">Giảm giá</label>
            <br>
            <input type="text" name="giam_gia">
            <b style="color: red;"><?php echo isset($_SESSION['giam_gia_duong']) ? $_SESSION['giam_gia_duong'] : ""?></b>
            <b style="color: red;"><?php echo isset($_SESSION['giam_gia_de_trong']) ? $_SESSION['giam_gia_de_trong'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Hình</label>
            <br>
            <input type="file" name="hinh">
        </div>

        <div class="row">
            <label for="">Ngày nhập</label>
            <br>
            <input type="date" name="ngay_nhap">
            <b style="color: red;"><?php echo isset($_SESSION['ngay_nhap_nho_hon_ht']) ? $_SESSION['ngay_nhap_nho_hon_ht'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Mô tả</label>
            <br>
            <textarea name="mo_ta" cols="30" rows="10"></textarea>
        </div>

        <div class="row">
            <label for="">Đặc biệt</label>
            <br>
            <input type="text" name="dac_biet">
        </div>

        <div class="row">
            <label for="">Loại hàng hóa</label>
            <br>
            <select name="select_loai_hang">
                <?php
                    foreach($list_loai_hang as $loai_hang){
                        extract($loai_hang);
                        echo '<option value='.$ma_loai.'>'.$ten_loai.'</option>';
                    }
                ?>
                
            </select>
        </div>

        <div class="row_click">
            <input type="submit" name="them_hang_hoa" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=list_hang_hoa">
                <input type="button" value="Danh sách">
            </a>
        </div>
        <?php
            if(isset($thong_bao_them_hang_hoa) && $thong_bao_them_hang_hoa != ""){
                echo $thong_bao_them_hang_hoa;
            }
        ?>
    </form>
</article>