<div class="home">
    <article>
        <div class="hang_hoa_danhmuc">
            <div class="row_danhmuc">
                <div class="home_danhmuc_h3">
                    <h3>Hàng hóa <?php echo $ten_danhmuc ?></h3>
                </div>
                <div class="home_danhmuc">
                    <?php
                    foreach ($danh_muc_hang_hoa as $dm_hh) {
                        extract($dm_hh);
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
                            </div>
                        </div>';
                    }
                    ?>
                    
                
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