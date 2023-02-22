<article>
    <div class="text_h3">
        <h3>Thống kê loại hàng</h3>
    </div>
    <div class="table_danhmuc">
        <table border="1">
            <tr class="color_dm">
                <th>Mã loại hàng</th>
                <th>Tên danh mục</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>
            </tr>
            
            <?php
                foreach($list_thong_ke as $list_tk){
                    extract($list_tk);
                    echo '
                    <tr>
                        <td>'.$malh.'</td>
                        <td>'.$tenlh.'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$maxprice.'</td>
                        <td>'.$minprice.'</td>
                        <td>'.$avgprice.'</td>
                    </tr>
                    ';
                }
            ?>
            
            <?php
            
            ?>
        </table>
    </div>
    <div class="list_button">
        <a href="index.php?act=bieu_do"><input type="button" value="Xem biểu đồ"></a>
    </div>
</article>