<div class="dangnhap_trang_chu">
    <div class="title_taikhoan_trangchu">
        <h2>Tài khoản</h2>
    </div>
    <?php
    if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
    ?>
        <form action="" method="post">
            <div class="form_trang_chu" style="margin-bottom: 20px; margin-left: 15px;">
                <label>Xin chào <strong><?php echo $user; ?></strong></label>
                <br>
            </div>
            <div class="form_trang_chu">
                <li>
                    <a href="index.php?act=don_hang_cua_toi">Đơn hàng của tôi</a>
                </li>
                <li>
                    <a href="index.php?act=quen_mat_khau">Quên mật khẩu</a>
                </li>
                <li>
                    <a href="index.php?act=edit_khach_hang">Cập nhật tài khoản</a>
                </li>
                <?php
                if ($vai_tro == 1) {
                ?>
                    <li>
                        <a href="admin/index.php">Đăng nhập Admin</a>
                    </li>
                <?php
                }
                ?>
                <li>
                    <a href="index.php?act=dang_xuat">Đăng xuất</a>
                </li>
            </div>
        </form>
    <?php
    } else {
    ?>
        <form action="index.php?act=dang_nhap" method="post">
            <div class="form_trang_chu">
                <label>Tên đăng nhập</label><br>
                <input class="form_dn" type="text" name="user"><br>
                <b style="color: red;"><?php echo isset($_SESSION['de_trong_tk_dn']) ? $_SESSION['de_trong_tk_dn'] : ""?></b>
                <b style="color: red;"><?php echo isset($_SESSION['tk_ko_tt']) ? $_SESSION['tk_ko_tt'] : ""?></b>
            </div>
            <div class="form_trang_chu">
                <label>Mật khẩu</label><br>
                <input class="form_dn" type="password" name="pass"><br>
                <b style="color: red;"><?php echo isset($_SESSION['mk_ko_tt']) ? $_SESSION['mk_ko_tt'] : ""?></b>
                <br>
            </div>
            <div class="form_trang_chu">
                <input type="checkbox" name="">Ghi nhớ tài khoản?
            </div>
            <div class="form_trang_chu">
                <input class="sumbit_trangchu" type="submit" name="submit_dangnhap" value="Đăng Nhập">
            </div>
        </form>
        <li>
            <a href="index.php?act=quen_mat_khau">Quên mật khẩu</a>
        </li>
        <li>
            <a href="index.php?act=dang_ky">Đăng ký thành viên</a>
        </li>
    <?php } ?>
</div>
<div class="danhmuc_trang_chu">
    <div class="title_danhmuc_trangchu">
        <h2>Danh mục</h2>
    </div>
    <div class="list_danh_muc">
        <ul>
            <?php
            foreach ($loai_hang_new as $lh_new) {
                extract($lh_new);
                $link_loai_hang = "index.php?act=hanghoa&ma_loai=" . $ma_loai;
                echo '
                        <li>
                            <a href="' . $link_loai_hang . '">' . $ten_loai . '</a>
                        </li>
                        ';
            }
            ?>
        </ul>
    </div>
    <div class="danhmuc_search">
        <form action="index.php?act=hanghoa" method="post">
            <input class="sear_danhmuc" type="text" name="key_danhmuc">
            <input type="submit" value="Search" class="submit_danhmuc" name="timkiem_danhmuc">
        </form>
    </div>
</div>
<div class="top10_trang_chu">
    <div class="title_top10_trangchu">
        <h2>Top 10 yêu thích</h2>
    </div>
    <div class="list_top10_trangchu">
        <?php
        foreach ($top10_new as $top10) {
            extract($top10);
            $link_top10 = "index.php?act=hang_hoa_chi_tiet&ma_hh=" . $ma_hh;
            $anh_new_top10 = $url_img . $hinh;
            echo '
                        <div class="product_top10">
                        <a href="' . $link_top10 . '"><img src="' . $anh_new_top10 . '" alt=""></a>
                        <div class="the_a">
                            <a href="' . $link_top10 . '">' . $ten_hh . '</a>
                        </div>
                        </div>
                        <div class="clear"></div>
            ';
        }
        ?>
    </div>
</div>