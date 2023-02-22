<div class="home">
    <article>
        <div class="hang_hoa_chi_tiet">
            <div class="row_chi_tiet">
                <div class="home_h3">
                    <h3>Cảm ơn</h3>
                </div>
                <div class="home_text_hoa_don">
                    <h3>Cảm ơn bạn đã đặt hàng!</h3>
                </div>
            </div>
            <?php
            if (isset($list_don_hang) && (is_array($list_don_hang))) {
                extract($list_don_hang);
                $pttt = pttt_dh($list_don_hang['pttt_dh']);
            }
            ?>
            <div class="row_chi_tiet">
                <div class="home_h3">
                    <h3>Thông tin đơn hàng</h3>
                </div>
                <div class="home_text_ma_don">
                <h3>Mã đơn hàng: - : <b style="color: red;"><?php echo $list_don_hang['id_don_hang']; ?></b> </h3>
                <h3>Ngày đặt hàng: - : <b style="color: red;"><?php echo $list_don_hang['ngay_dat_hang']; ?></b> </h3>
                <h3>Tổng đơn hàng: - : <b style="color: red;"><?php echo $list_don_hang['total']; ?></b> </h3>
                <h3>Phương thức thanh toán: - : <b style="color: red;"><?php echo $pttt; ?></b> </h3>
                </div>
            </div>

            <div class="row_chi_tiet">
                <div class="home_h3">
                    <h3>Thông tin đặt hàng</h3>
                </div>
                <div class="home_text_a">
                    <table>
                        <tr>
                            <td>Người đặt hàng: </td>
                            <td><?php echo $list_don_hang['name_dh']; ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ: </td>
                            <td><?php echo $list_don_hang['dia_chi_dh']; ?></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><?php echo $list_don_hang['email_dh']; ?></td>
                        </tr>
                        <tr>
                            <td>Điện thoại: </td>
                            <td><?php echo $list_don_hang['dien_thoai_dh']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row_chi_tiet">
                <div class="home_h3">
                    <h3>Thông tin giỏ hàng</h3>
                </div>
                <div class="home_text">
                    <div class="home_text_gio_hang">
                        <table border="1">
                            <?php
                                don_hang_chi_tiet($don_hang_chi_tiet);
                            ?>
                        </table>
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