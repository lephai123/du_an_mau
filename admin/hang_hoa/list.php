<article>
    <div class="text_h3">
        <h3>Danh sách hàng hóa</h3>
    </div>
    <div class="table_danhmuc">
        <form action="index.php?act=list_hang_hoa" method="post" class="form_1">
            <input type="text" name="key_word" placeholder="Tìm kiếm hàng hóa">
            <select name="select_loai_hang">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($list_loai_hang as $loai_hang) {
                    extract($loai_hang);
                    echo '<option value=' . $ma_loai . '>' . $ten_loai . '</option>';
                }
                ?>
            </select>
            <input type="submit" name="seacrch_hang_hoa" value="Search">
        </form>
        <table border="1">
            <tr class="color_dm">
                <th>STT</th>
                <th>MÃ HÀNG HÓA</th>
                <th>TÊN HÀNG HÓA</th>
                <th>ĐƠN GIÁ</th>
                <th>GIẢM GIÁ</th>
                <th>HÌNH</th>
                <th>NGÀY NHẬP</th>
                <th>MÔ TẢ</th>
                <th>ĐẶC BIỆT</th>
                <th>SỐ LƯỢT XEM</th>
                <th></th>
            </tr>
            <?php
            $i = 1;
            foreach ($list_hang_hoa as $hang_hoa) {
                extract($hang_hoa);
                $sua_hang_hoa = "index.php?act=sua_hang_hoa&id=" . $ma_hh;
                $xoa_hang_hoa = "index.php?act=xoa_hang_hoa&id=" . $ma_hh;
                $binh_luan = "index.php?act=binh_luan_hang_hoa&id=" . $ma_hh;

                $hinh_hang_hoa = "../upload/" . $hinh;
                if (is_file($hinh_hang_hoa)) {
                    $img = "<img src='" . $hinh_hang_hoa . "' width='100px' height='100px'>";
                } else {
                    $img = "Không có hình";
                }

                echo '<tr>
                <td><b>'.$i.'</b></td>
                <td>' . $ma_hh . '</td>
                <td>' . $ten_hh . '</td>
                <td>' . $don_gia . '</td>
                <td>' . $giam_gia . '</td>
                <td>' . $img . '</td>
                <td>' . $ngay_nhap . '</td>
                <td>' . $mo_ta . '</td>
                <td>' . $dac_biet . '</td>
                <td>' . $so_luot_xem . '</td>
                

                <td style="width: 200px;">
                <a href="' . $sua_hang_hoa . '">
                <input type="button" value="Sửa" style="cursor: pointer;"> 
                </a>
                                
                <a href="' . $xoa_hang_hoa . '">
                <input type="button" value="Xóa" style="cursor: pointer;">
                </a>

                <a href="' . $binh_luan . '">
                <input style="margin-top: 5px"; type="button" value="Bình luận" style="cursor: pointer;">
                </a>
                </td>
            </tr>';
            $i += 1;
            }
            ?>
        </table>
    </div>
    <div class="list_button">
        <a href="index.php?act=add_hang_hoa"><input type="button" value="Nhập thêm"></a>
    </div>
</article>