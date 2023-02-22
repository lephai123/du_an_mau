<div class="home">
    <article>
        <div class="hang_hoa_chi_tiet">
            <div class="row_chi_tiet">
                <?php
                extract($one_hang_hoa);
                ?>
                <div class="home_h3">
                    <h3><?php echo $ten_hh; ?></h3>
                </div>
                <div class="home_text">
                    <?php

                    $img_chi_tiet_hang_hoa = $url_img . $hinh;

                    echo '<div class="anh_chi_tiet_hang_hoa">
                        <img src="' . $img_chi_tiet_hang_hoa . '">
                        </div>
                        <div class="mo_ta_hang_hoa">
                        ' . $mo_ta . '
                        </div>
                        <form action="index.php?act=them_gio_hang" method="post" class="form_ct">
                            <input type="hidden" name="ma_hh" value="' . $ma_hh . '">
                            <input type="hidden" name="ten_hh" value="' . $ten_hh . '">
                            <input type="hidden" name="hinh" value="' . $hinh . '">
                            <input type="hidden" name="don_gia" value="' . $don_gia . '">
                            <input type="submit" name="them_gio_hang" value="Thêm vào giỏ hàng" class="them_gio_hang">
                        </form>
                        ';
                    ?>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#binhluan").load("views/binh_luan/binh_luan.php", {
                        idpro: <?= $ma_hh ?>
                    });
                });
            </script>
            <div class="row_chi_tiet" id="binhluan">

            </div>

            <div class="row_chi_tiet">
                <div class="home_h3">
                    <h3>Sản phẩm cùng loại</h3>
                </div>
                <div class="home_text">
                    <div class="hang_hoa_cung_loai">
                        <?php
                        foreach ($hang_hoa_cung_loai as $hanghoa_cungloai) {
                            extract($hanghoa_cungloai);
                            $link_hh_cung_loai = "index.php?act=hang_hoa_chi_tiet&ma_hh=" . $ma_hh;
                            echo '
                                <li><a href="' . $link_hh_cung_loai . '">' . $ten_hh . '</a></li>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <aside>
        <?php
        include "views/aside_home.php";
        ?>
    </aside>
    <div class="clear"></div>
</div>