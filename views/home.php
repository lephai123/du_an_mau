<div class="home">
    <article>
        <div class="banner_animation">
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <img src="views/image/banner/1.jpg" width="500px" height="350px">
                </div>

                <div class="mySlides fade">
                    <img src="views/image/banner/2.jpg" width="500px" height="350px">
                </div>

                <div class="mySlides fade">
                    <img src="views/image/banner/3.jpg" width="500px" height="350px">
                </div>

                <div class="mySlides fade">
                    <img src="views/image/banner/4.jpg" width="500px" height="350px">
                </div>

                <div class="mySlides fade">
                    <img src="views/image/banner/5.jpg" width="500px" height="350px">
                </div>

                <div class="mySlides fade">
                    <img src="views/image/banner/6.jpg" width="500px" height="350px">
                </div>

                <div class="mySlides fade">
                    <img src="views/image/banner/7.jpg" width="500px" height="350px">
                </div>

                <div class="mySlides fade">
                    <img src="views/image/banner/8.jpg" width="500px" height="350px">
                </div>

            </div>
        </div>
        <div class="product_trang_chu">
            <?php
            foreach ($hang_hoa_new as $hh_new) {
                extract($hh_new);
                $anh_new = $url_img . $hinh;
                $hang_hoa_chi_tiet = "index.php?act=hang_hoa_chi_tiet&ma_hh=" . $ma_hh;

                echo '<div class="product">
                <div class="khung_product">
                    <div class="product_img">
                    <a href="' . $hang_hoa_chi_tiet . '">
                    <img src="' . $anh_new . '" alt="" height= 250px >
                    </a>
                    </div>
                    <div class="product_text">
                        <span>' . $don_gia . '</span><br>
                        <a href="' . $hang_hoa_chi_tiet . '">' . $ten_hh . '</a>
                    </div>

                    <form action="index.php?act=them_gio_hang" method="post">
                        <input type="hidden" name="ma_hh" value="' . $ma_hh . '">
                        <input type="hidden" name="ten_hh" value="' . $ten_hh . '">
                        <input type="hidden" name="hinh" value="' . $hinh . '">
                        <input type="hidden" name="don_gia" value="' . $don_gia . '">
                        <input type="submit" name="them_gio_hang" value="Thêm vào giỏ hàng" class="them_gio_hang">
                    </form>
                </div>
            </div>';
            }
            ?>
        </div>
        <div class="clear"></div>
    </article>
    <aside>
        <?php
        include "aside_home.php";
        ?>
    </aside>
    <div class="clear"></div>
</div>