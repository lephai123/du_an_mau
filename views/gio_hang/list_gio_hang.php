<div class="home">
    <article>
        <div class="hang_hoa_chi_tiet">
            <div class="row_chi_tiet">
                <div class="home_h3">
                    <h3>Giỏ hàng</h3>
                </div>
                <div class="home_text_gio_hang">
                    <table border="1">
                        
                        <?php
                        // $tong = 0;
                        // $i = 0;
                        // foreach ($_SESSION['them_hh'] as $add) {
                        //     $hinh = $url_img . $add[2];
                        //     $thanhtien = $add[3] * $add[4];
                        //     $tong += $thanhtien;
                            
                        //     $xoa_sp = '<a href="index.php?act=xoa_gio_hang&id_xoa='.$i.'"><input type="button" value="Xóa"></a>';
                        //     echo '
                        //         <tr>
                        //             <td>'.$i.'</td>
                        //             <td><img src="' . $hinh . '" alt="" width="150px" height="150px"></td>
                        //             <td>' . $add[1] . '</td>
                        //             <td>' . $add[3] . '</td>
                        //             <td>' . $add[4] . '</td>
                        //             <td>' . $thanhtien . '</td>
                        //             <td class="submit_them_gio_hang">
                        //                 '.$xoa_sp.'
                        //             </td>
                        //         </tr>
                        //         ';
                        //     $i += 1;
                        // }
                        // echo '
                        //     <tr>
                        //         <td colspan="6">Tổng đơn hàng</td>
                        //         <td>' . $tong . '</td>
                        //         <td></td>
                        //     </tr>
                        // ';
                        view_gio_hang(1);
                        ?>
                    </table>
                </div>
            </div>
            <div class="xac_nhan_dat_hang">
                <a href="index.php"><input type="button" value="Quay về trang chủ"></a>

                <a href="index.php?act=dat_hang"><input type="button" value="Tiếp tục đặt hàng"></a>

                <a href="index.php?act=xoa_gio_hang"><input type="button" value="Xóa giỏ hàng"></a>
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