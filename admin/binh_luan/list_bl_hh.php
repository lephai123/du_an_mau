<article>
    <div class="text_h3">
        <h3>Danh sách bình luận của hàng hóa</h3>
    </div>
    <div class="table_danhmuc">
        <table border="1">
            <tr class="color_dm">
                <th>STT</th>
                <th>Mã người dùng</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th></th>
            </tr>
            <?php
            $i = 1;
            foreach ($bl_hh as $bl) {
                extract($bl);
                $id_hh = lay_id_hh($bl['mabl'])[0][0];
                $xoa_binh_luan = "index.php?act=xoa_binh_luan_hh&id=".$bl['mabl']."&id_hh=".$id_hh;

                echo '<tr>
                <td><b>'.$i.'</b></td>
                <td>' . $bl['user'] . '</td>
                <td>' . $bl['noidung'] . '</td>
                <td>' . $bl['ngaybinhluan'] . '</td>
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