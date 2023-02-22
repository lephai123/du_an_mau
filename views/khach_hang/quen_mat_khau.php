<div class="home">
    <article>
        <div class="article_chung">
            <div class="article_chi_tiet">
                <div class="article_h3">
                    <h3>Quên mật khẩu</h3>
                </div>
                <div class="article_product">
                    <form action="index.php?act=quen_mat_khau" method="post">
                        <label>Email:</label>
                        <br>
                        <input class="dang_ky" type="email" name="email" placeholder="Mời nhập địa chỉ email đã đăng ký">
                        <br>
                        <input class="submit_dangky" type="submit" name="gui_email" value="Gửi">
                        <input class="submit_dangky" type="reset" value="Nhập lại">
                        <br>
                        <br>
                    </form>
                    <?php
                        if(isset($thong_bao_quenmk) && ($thong_bao_quenmk != "")){
                            echo $thong_bao_quenmk;
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