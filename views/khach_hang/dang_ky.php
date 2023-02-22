<div class="home">
    <article>
        <div class="article_chung">
            <div class="article_chi_tiet">
                <div class="article_h3">
                    <h3>Đăng ký thành viên</h3>
                </div>
                <div class="article_product">
                    <form action="index.php?act=dang_ky" method="post">
                        <label>Email:</label>
                        <br>
                        <input class="dang_ky" type="email" name="email" placeholder="Mời nhập địa chỉ email">
                        <b style="color: red;"><?php echo isset($_SESSION['sdd_email']) ? $_SESSION['sdd_email'] : ""?></b>
                        <b style="color: red;"><?php echo isset($_SESSION['de_trong_email']) ? $_SESSION['de_trong_email'] : ""?></b>
                        <b style="color: red;"><?php echo isset($_SESSION['email_tt']) ? $_SESSION['email_tt'] : ""?></b>
                        <br>
                        <label>User:</label>
                        <br>
                        <input class="dang_ky" type="text" name="user" placeholder="Mời nhập user">
                        <b style="color: red;"><?php echo isset($_SESSION['de_trong_ten_dn']) ? $_SESSION['de_trong_ten_dn'] : ""?></b>
                        <b style="color: red;"><?php echo isset($_SESSION['ten_dn_da_tt']) ? $_SESSION['ten_dn_da_tt'] : ""?></b>
                        <br>
                        <label>Password</label>
                        <br>
                        <input class="dang_ky" type="password" name="pass" placeholder="Mời nhập password">
                        <b style="color: red;"><?php echo isset($_SESSION['khong_trung_khop_mk']) ? $_SESSION['khong_trung_khop_mk'] : ""?></b>
                        <b style="color: red;"><?php echo isset($_SESSION['dd_pass']) ? $_SESSION['dd_pass'] : ""?></b>
                        <br>
                        <label>Re-enter the password</label>
                        <br>
                        <input class="dang_ky" type="password" name="nhap_lai_password" placeholder="Mời nhập lại password">
                        <b style="color: red;"><?php echo isset($_SESSION['khong_trung_khop_mk']) ? $_SESSION['khong_trung_khop_mk'] : ""?></b>
                        <br>
                        <label>Địa chỉ</label>
                        <br>
                        <input class="dang_ky" type="text" name="dia_chi" placeholder="Mời nhập địa chỉ">
                        <br>
                        <label>Điện thoại</label>
                        <br>
                        <input class="dang_ky" type="text" name="dien_thoai" placeholder="Mời nhập điện thoại">
                        <br>
                        <input class="submit_dangky" type="submit" name="dang_ky" value="Đăng ký">
                        <input class="submit_dangky" type="reset" value="Nhập lại">
                    </form>
                    <?php
                        if(isset($thong_bao_dang_ky) && $thong_bao_dang_ky != ""){
                            echo $thong_bao_dang_ky;
                        }
                    ?>
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