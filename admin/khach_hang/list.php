<article>
    <div class="text_h3">
        <h3>Danh sách tài khoản</h3>
    </div>
    <div class="table_danhmuc">
        <table border="1">
            <tr class="color_dm">
                <th>STT</th>
                <th>MÃ tài khoản</th>
                <th>Email</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th></th>
            </tr>
            <?php
            $i = 1;
            foreach ($list_khach_hang as $khach_hang) {
                extract($khach_hang);
                $sua_khach_hang = "index.php?act=sua_khach_hang&id=".$ma_khach_hang;
                $xoa_khach_hang = "index.php?act=xoa_khach_hang&id=".$ma_khach_hang;

                echo '<tr>
                <td><b>'.$i.'</b></td>
                <td>' . $ma_khach_hang . '</td>
                <td>' . $email . '</td>
                <td>' . $user . '</td>
                <td>' . $pass . '</td>
                <td>' . $dia_chi . '</td>
                <td>' . $dien_thoai . '</td>
                <td>' . $vai_tro . '</td>
                <td style="width: 200px;">
            
                <a href="' . $sua_khach_hang . '">
                <input type="button" value="Sửa" style="cursor: pointer;"> 
                </a>
                                
                <a href="' . $xoa_khach_hang . '">
                <input type="button" value="Xóa" style="cursor: pointer;">
                </a>
                </td>
            </tr>';
            $i += 1;
            }
            ?>
        </table>
    </div>
</article>