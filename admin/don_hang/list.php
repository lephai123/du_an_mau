<article>
    <div class="text_h3">
        <h3>Danh sách đơn hàng</h3>
    </div>
    <div class="table_danhmuc">
        <form action="index.php?act=search_list_don_hang" method="post" class="form_1">
            <input type="text" name="key_word" placeholder="Nhập mã đơn hàng">
            <input type="submit" name="seacrch_hang_hoa" value="Search">
        </form>
        <table border="1">
            <tr class="color_dm">
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Số lượng hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Thao tác</th>
            </tr>
            <?php
            $i = 1;
            foreach ($list_don_hang as $don_hang) {
                extract($don_hang);

                $sua_don_hang = "index.php?act=sua_don_hang&id=" . $id_don_hang;
                $xoa_don_hang = "index.php?act=xoa_don_hang&id=" . $id_don_hang;

                $khach_hang = $don_hang['name_dh'] . '</br>' . $don_hang['email_dh'] . '</br>' . $don_hang['dia_chi_dh'] . '</br>' . $don_hang['dien_thoai_dh'];
                $count_sp = load_cart_count($don_hang['id_don_hang']);
                $ttdh = get_ttdh($don_hang['status']);
                echo '
                    <tr>
                        <td><b>'.$i.'</b></td>
                        <td>Mã ' . $don_hang['id_don_hang'] . '</td>
                        <td>' . $khach_hang . '</td>
                        <td>' . $count_sp . '</td>
                        <td>' . $don_hang['total'] . '</td>
                        <td>' . $don_hang['ngay_dat_hang'] . '</td>
                        <td>' . $ttdh . '</td>
                        <td style="width: 200px;">

                        <a href="' . $sua_don_hang . '">
                        <input type="button" value="Sửa" style="cursor: pointer; margin-left: 20px;"> 
                        </a>
                                        
                        <a href="' . $xoa_don_hang . '">
                        <input type="button" value="Xóa" style="cursor: pointer;">
                        </a>
                        </td>
                    </tr>
                    ';
                    $i += 1;
            }
            ?>

            <?php

            ?>
        </table>
    </div>
</article>