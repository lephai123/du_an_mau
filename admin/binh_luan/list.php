<article>
    <div class="text_h3">
        <h3>Danh sách bình luận</h3>
    </div>
    <div class="table_danhmuc">
        <table border="1">
            <tr class="color_dm">
                <th>STT</th>
                <th>Mã bình luận</th>
                <th>Người dùng</th>
                <th>Mã hàng hóa</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th></th>
            </tr>
            <?php
            $i = 1;
            foreach ($list_binh_luan as $bl) {
                extract($bl);
                $xoa_binh_luan = "index.php?act=xoa_binh_luan&id=".$ma_binh_luan;

                echo '<tr>
                <td><b>'.$i.'</b></td>
                <td>' . $ma_binh_luan . '</td>
                <td>' . $id_user . '</td>
                <td>' . $id_pro . '</td>
                <td>' . $noi_dung . '</td>
                <td>' . $ngay_binh_luan . '</td>
                <td style="width: 200px;">
                                
                <a href="' . $xoa_binh_luan . '">
                <input style="margin-left: 60px;" type="button" value="Xóa" style="cursor: pointer;">
                </a>
                </td>
            </tr>';
            $i += 1;
            }
            ?>
        </table>
    </div>

</article>