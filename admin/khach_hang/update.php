<?php
    if(is_array($tk)){
        extract($tk);
    }
?>
<article>
    <div class="text_h3">
        <h3>Cập nhật tài khoản</h3>
    </div>
    <form action="index.php?act=update_khach_hang" method="post">
        <div class="row">
            <label for="">Mã tài khoản</label>
            <br>
            <input type="text" name="ma_khach_hang" disabled value="<?php if(isset($ma_khach_hang) && ($ma_khach_hang != "")) echo $ma_khach_hang; ?>">
        </div>

        <div class="row">
            <label for="">Email</label>
            <br>
            <input type="text" name="email" value="<?php if(isset($email) && ($email != "")) echo $email; ?>">
            <b style="color: red;"><?php echo isset($_SESSION['de_trong_email']) ? $_SESSION['de_trong_email'] : ""?></b>
            <b style="color: red;"><?php echo isset($_SESSION['sdd_email']) ? $_SESSION['sdd_email'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Tên đăng nhập</label>
            <br>
            <input type="text" name="user" value="<?php if(isset($user) && ($user != "")) echo $user; ?>">
            <b style="color: red;"><?php echo isset($_SESSION['de_trong_user']) ? $_SESSION['de_trong_user'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Mật khẩu</label>
            <br>
            <input type="text" name="pass" value="<?php if(isset($pass) && ($pass != "")) echo $pass; ?>">
            <b style="color: red;"><?php echo isset($_SESSION['dd_pass']) ? $_SESSION['dd_pass'] : ""?></b>
        </div>

        <div class="row">
            <label for="">Địa chỉ</label>
            <br>
            <input type="text" name="dia_chi" value="<?php if(isset($dia_chi) && ($dia_chi != "")) echo $dia_chi; ?>">
        </div>

        <div class="row">
            <label for="">Điện thoại</label>
            <br>
            <input type="text" name="dien_thoai" value="<?php if(isset($dien_thoai) && ($dien_thoai != "")) echo $dien_thoai; ?>">
        </div>

        <div class="row">
            <label for="">Vai trò</label>
            <br>
            <input type="text" name="vai_tro" value="<?php if(isset($vai_tro) && ($vai_tro != "")) echo $vai_tro; ?>">
        </div>

        <div class="row_click">
            <input type="hidden" name="ma_khach_hang" value="<?php if(isset($ma_khach_hang) && ($ma_khach_hang > 0)) echo $ma_khach_hang; ?>">
            <input type="submit" name="cap_nhat_khach_hang" value="Cập nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=ds_khach_hang">
                <input type="button" value="Danh sách">
            </a>
        </div>
    </form>
</article>