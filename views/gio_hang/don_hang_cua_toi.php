<div class="home">
    <article>
        <div class="hang_hoa_chi_tiet">
            <div class="row_chi_tiet">
                <div class="home_h3">
                    <h3>Giỏ hàng</h3>
                </div>
                <div class="home_text_gio_hang">
                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Số lượng đặt hàng</th>
                            <th>Tổng giá trị đơn hàng</th>
                            <th>Tình trạng đơn hàng</th>
                        </tr>
                        <?php
                            if(isset($list_don_hang_new)){
                                foreach($list_don_hang_new as $don_hang){
                                    extract($don_hang);
                                    $trang_thai_dh = get_ttdh($don_hang['status']);
                                    $count_hh = load_cart_count($don_hang['id_don_hang']);
                                    echo '
                                        <tr> 
                                            <td>Mã - '.$don_hang['id_don_hang'].'</td>
                                            <td>'.$don_hang['ngay_dat_hang'].'</td>
                                            <td>'.$count_hh.'</td>
                                            <td>'.$don_hang['total'].'</td>
                                            <td>'.$trang_thai_dh.'</td>
                                        </tr>
                                    ';
                                }
                            }
                        ?>
                    </table>
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