<div class="home">
    <article>
        <div class="hang_hoa_chi_tiet">
            <form action="index.php?act=hoa_don" method="post">
                <div class="row_chi_tiet">
                    <div class="home_h3">
                        <h3>Thông tin đặt hàng</h3>
                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $email = $_SESSION['user']['email'];
                        $user = $_SESSION['user']['user'];
                        $dia_chi = $_SESSION['user']['dia_chi'];
                        $dien_thoai = $_SESSION['user']['dien_thoai'];
                    } else {
                        $email = "";
                        $user = "";
                        $dia_chi = "";
                        $dien_thoai = "";
                    }
                    ?>
                    <div class="thong_tin_dat_hang">
                        <label>Người đặt hàng</label><br>
                        <input type="text" name="user" value="<?php if (isset($user) && ($user != "")) echo $user; ?>">
                        <br>
                        <label>Địa chỉ</label><br>
                        <input type="text" name="dia_chi" value="<?php if (isset($dia_chi) && ($dia_chi != "")) echo $dia_chi; ?>">
                        <br>
                        <label>Email</label><br>
                        <input type="email" name="email" value="<?php if (isset($email) && ($email != "")) echo $email; ?>">
                        <br>
                        <label>Điện thoại</label><br>
                        <input type="text" name="dien_thoai" value="<?php if (isset($dien_thoai) && ($dien_thoai != "")) echo $dien_thoai; ?>">
                    </div>
                </div>

                <div class="row_chi_tiet" id="binhluan">
                    <div class="home_h3">
                        <h3>Phương thức thanh toán</h3>
                    </div>
                    <div class="phuong_thuc_thanh_toan">
                        <div class="phuong_thuc_thanh_toan">
                            <input type="radio" name="pttt" value="1">
                            <h5>Trả tiền khi nhận hàng</h5>
                            <input type="radio" name="pttt" value="2">
                            <h5>Chuyển khoản ngân hàng</h5>
                            <input type="radio" name="pttt" value="3">
                            <h5>Thanh toán online</h5>
                        </div><br>
                        <b style="color: red;"><?php echo isset($_SESSION['de_trong_pttt']) ? $_SESSION['de_trong_pttt'] : ""?></b>
                    </div>
                </div>

                <div class="row_chi_tiet">
                    <div class="home_h3">
                        <h3>Thông tin giỏ hàng</h3>
                    </div>
                    <div class="home_text">
                        <div class="ds_gio_hang">
                            <table border="1">
                                <?php
                                view_gio_hang(0);
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="dat_hang">
                    <input type="submit" value="Đặt hàng" name="dong_y_dat_hang">
                </div>
            </form>
        </div>
    </article>
    <aside>
        <?php
        include "views/aside_home.php";
        ?>
    </aside>
    <div class="clear"></div>
</div>