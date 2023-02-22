<div class="home">
    <article>
        <div class="article_chung">
            <div class="article_chi_tiet">
                <div class="article_h3">
                    <h3>Cập nhật tài khoản</h3>
                </div>
                <div class="article_product">
                    <?php
                    if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                        extract($_SESSION['user']);
                    }
                    ?>
                    <form action="index.php?act=edit_khach_hang" method="post">
                        <label>Email:</label>
                        <br>
                        <input class="dang_ky" type="email" name="email" placeholder="Mời nhập địa chỉ email" value="<?php if (isset($email) && ($email != "")) echo $email; ?>">
                        <b style="color: red;"><?php echo isset($_SESSION['sdd_email']) ? $_SESSION['sdd_email'] : ""?></b>
                        <b style="color: red;"><?php echo isset($_SESSION['de_trong_email']) ? $_SESSION['de_trong_email'] : ""?></b>
                        <br>
                        <label>User:</label>
                        <br>
                        <input class="dang_ky" type="text" name="user" placeholder="Mời nhập user" value="<?php if (isset($user) && ($user != "")) echo $user; ?>">
                        <b style="color: red;"><?php echo isset($_SESSION['de_trong_ten_dn']) ? $_SESSION['de_trong_ten_dn'] : ""?></b>
                        <br>
                        <label>Password</label>
                        <br>
                        <input class="dang_ky" type="password" name="pass_cu" placeholder="Mời nhập password cũ">
                        <b style="color: red;"><?php echo isset($_SESSION['mk_khong_chinh_xac']) ? $_SESSION['mk_khong_chinh_xac'] : ""?></b>
                        <br>
                        <label>Password mới</label>
                        <br>
                        <input class="dang_ky" type="password" name="pass_moi" placeholder="Mời nhập password mới">
                        <b style="color: red;"><?php echo isset($_SESSION['khong_trung_khop_mk']) ? $_SESSION['khong_trung_khop_mk'] : ""?></b>
                        <b style="color: red;"><?php echo isset($_SESSION['dd_pass']) ? $_SESSION['dd_pass'] : ""?></b>
                        <br>
                        <label>Nhập lại password mới</label>
                        <br>
                        <input class="dang_ky" type="password" name="pass_nhap_lai_moi" placeholder="Mời nhập lại password mới">
                        <b style="color: red;"><?php echo isset($_SESSION['khong_trung_khop_mk']) ? $_SESSION['khong_trung_khop_mk'] : ""?></b>
                        <br>
                        <label>Địa chỉ</label>
                        <br>
                        <input class="dang_ky" type="text" name="dia_chi" placeholder="Mời nhập địa chỉ" value="<?php if (isset($dia_chi) && ($dia_chi != "")) echo $dia_chi; ?>">
                        <br>
                        <label>Điện thoại</label>
                        <br>
                        <input class="dang_ky" type="text" name="dien_thoai" placeholder="Mời nhập điện thoại" value="<?php if (isset($dien_thoai) && ($dien_thoai != "")) echo $dien_thoai; ?>">
                        <br>
                        <input type="hidden" name="ma_khach_hang" value="<?php if (isset($ma_khach_hang) && ($ma_khach_hang != "")) echo $ma_khach_hang; ?>">
                        <input class="submit_dangky" type="submit" name="cap_nhat" value="Cập nhật">
                        <input class="submit_dangky" type="reset" value="Nhập lại">
                    </form>
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