<article>
    <div class="text_h3">
        <h3>Danh sách loại hàng</h3>
    </div>
    <div class="table_danhmuc">
        <table border="1">
            <tr class="color_dm">
                <th>STT</th>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th></th>
            </tr>
            <?php
            $i = 1;
            foreach ($list_loai_hang as $loai_hang) {
                extract($loai_hang);
                $sua_loai_hang = "index.php?act=sua_loai_hang&id=" . $ma_loai;
                $xoa_loai_hang = "index.php?act=xoa_loai_hang&id=" . $ma_loai;

                echo '<tr>
                <td><b>'.$i.'</b></td>
                <td>' . $ma_loai . '</td>
                <td>' . $ten_loai . '</td>
                <td style="width: 200px;">
            
                <a href="' . $sua_loai_hang . '">
                <input type="button" value="Sửa" style="cursor: pointer;"> 
                </a>
       
                <a href="' . $xoa_loai_hang . '">
                <input type="button" value="Xóa" style="cursor: pointer;">
                </a>
                </td>
            </tr>';
            $i += 1;
            }
            ?>
        </table>
    </div>

    <div class="list_button">
        <a href="index.php?act=add_loai_hang"><input type="button" value="Nhập thêm"></a>
    </div>
</article>
