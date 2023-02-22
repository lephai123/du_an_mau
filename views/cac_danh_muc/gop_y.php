<div class="home">
    <article>
        <div class="article_chung">
            <div class="article_chi_tiet">
                <div class="article_h3">
                    <h3>Góp ý</h3>
                </div>
                <div class="article_product">
                    <form action="" method="post">
                        <?php
                        if (isset($_POST['gui_gop_y'])) {
                            $email = $_POST['email'];
                            $dien_thoai = $_POST['dien_thoai'];
                            $dia_chi = $_POST['dia_chi'];
                            $noi_dung = $_POST['noi_dung'];
                            $allowUpload = true;

                            if(strlen($email) == 0){
                                $_SESSION['email_1'] = "Không được để trống email!";
                                $allowUpload = false;
                            }else{
                                unset($_SESSION['email_1']);
                            }
                            if(strlen($dien_thoai) == 0){
                                $_SESSION['dien_thoai_1'] = "Không được để trống điện thoại!";
                                $allowUpload = false;
                            }else{
                                unset($_SESSION['dien_thoai_1']);
                            }
                            if(strlen($dia_chi) == 0){
                                $_SESSION['dia_chi_1'] = "Không được để trống địa chỉ!";
                                $allowUpload = false;
                            }else{
                                unset($_SESSION['dia_chi_1']);
                            }
                            if(strlen($noi_dung) == 0){
                                $_SESSION['noi_dung_1'] = "Không được để trống nội dung!";
                                $allowUpload = false;
                            }else{
                                unset($_SESSION['noi_dung_1']);
                            }
                            if($allowUpload == true){
                                $thong_bao = "Góp ý của bạn đã được gửi đi";
                            }

                        }
                        ?>
                        <label>Email:</label>
                        <br>
                        <input class="dang_ky" type="email" name="email">
                        <b style="color: red;"><?php echo isset($_SESSION['email_1']) ? $_SESSION['email_1'] : ""?></b>
                        <br>
                        <label>Số điện thoại</label>
                        <br>
                        <input class="dang_ky" type="text" name="dien_thoai">
                        <b style="color: red;"><?php echo isset($_SESSION['dien_thoai_1']) ? $_SESSION['dien_thoai_1'] : ""?></b>
                        <br>
                        <label>Địa chỉ</label>
                        <br>
                        <input class="dang_ky" type="text" name="dia_chi">
                        <b style="color: red;"><?php echo isset($_SESSION['dia_chi_1']) ? $_SESSION['dia_chi_1'] : ""?></b>
                        <br>
                        <label>Nội dung góp ý</label>
                        <br>
                        <input class="dang_ky" type="text" name="noi_dung">
                        <b style="color: red;"><?php echo isset($_SESSION['noi_dung_1']) ? $_SESSION['noi_dung_1'] : ""?></b>
                        <br>
                        <input class="submit_dangky" type="submit" name="gui_gop_y" value="Gửi">
                        <input class="submit_dangky" type="reset" value="Nhập lại">
                    </form>
                    <?php
                    if (isset($thong_bao) && $thong_bao != "") {
                        echo $thong_bao;
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