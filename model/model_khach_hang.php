<?php
function insert_khach_hang($email, $user, $pass, $dia_chi, $dien_thoai)
{
    $sql = "insert into khach_hang(email,user,pass,dia_chi,dien_thoai) values('$email','$user','$pass','$dia_chi','$dien_thoai')";
    pdo_execute($sql);
}

function check_dangnhap($user,$pass){
    $sql = "select * from khach_hang where user='".$user."' AND pass='".$pass."'";
    $dn = pdo_query_one($sql);
    return $dn;
}

function check_tk($user){
    $sql = "select user from khach_hang where user='".$user."'";
    $dn = pdo_query_one($sql);
    return $dn;
}

function check_mk($user){
    $sql = "select pass from khach_hang where user='".$user."'";
    $dn = pdo_query_one($sql);
    return $dn;
}

function emailValid($email)
{
    return (bool)preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}

function update_khach_hang($ma_khach_hang,$email,$user,$pass,$dia_chi,$dien_thoai){
    $sql = "update khach_hang set 
    email='$email',
    user='$user',
    pass='$pass',
    dia_chi='$dia_chi',
    dien_thoai='$dien_thoai'
    where ma_khach_hang = $ma_khach_hang";
    pdo_execute($sql);
}

function update_khach_hang_trong_admin($ma_khach_hang,$email,$user,$pass,$dia_chi,$dien_thoai,$vai_tro){
    $sql = "update khach_hang set 
    email='$email',
    user='$user',
    pass='$pass',
    dia_chi='$dia_chi',
    dien_thoai='$dien_thoai',
    vai_tro='$vai_tro'
    where ma_khach_hang = $ma_khach_hang";
    pdo_execute($sql);
}

function check_email($email){
    $sql = "select * from khach_hang where email='$email'";
    $em = pdo_query_one($sql);
    return $em;
}

function load_all_khach_hang(){
    $sql = "select * from khach_hang order by ma_khach_hang desc";
    $list_khach_hang = pdo_query($sql);
    return $list_khach_hang;
}

function delete_khach_hang($id){
    $sql = "delete from khach_hang where ma_khach_hang =".$id;
    pdo_execute($sql);
}

function load_one_khach_hang($id){
    $sql = "select * from khach_hang where ma_khach_hang = ".$id;
    $tk = pdo_query_one($sql);
    return $tk;
}
function load_one_email($email){
    $sql = "select email from khach_hang where email = '".$email."'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function check_mk_theo_ma_kh($ma_khach_hang){
    $sql = "select pass from khach_hang where ma_khach_hang='".$ma_khach_hang."'";
    $dn = pdo_query_one($sql);
    return $dn;
}