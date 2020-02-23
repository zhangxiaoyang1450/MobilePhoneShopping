<?php
//创建服务端edituser_server.php处理修改的数据，并返回到主页面allusers.php。
require_once 'functions.php';
$phone_id=$_POST['phone_id'];
$phone_title=$_POST['phone_title'];
$phone_img1=$_POST['phone_img1'];
$phone_img2=$_POST['phone_img2'];
$phone_img3=$_POST['phone_img3'];
$phone_name=$_POST['phone_name'];
$phone_price=$_POST['phone_price'];
$phone_style=$_POST['phone_style'];
$phone_screen=$_POST['phone_screen'];
$phone_text=$_POST['phone_text'];
$phone_cpu=$_POST['phone_cpu'];
$phone_RAM=$_POST['phone_RAM'];
$phone_save=$_POST['phone_save'];
$phone_hot=$_POST['phone_hot'];
$phone_stock=$_POST['phone_stock'];
$phone_sell=$_POST['phone_sell'];

//echo $phone_id=$_POST['phone_id'];
//echo $phone_title=$_POST['phone_title'];
//echo $phone_img=$_POST['phone_img'];
//echo $phone_name=$_POST['phone_name'];
//echo $phone_price=$_POST['phone_price'];
//echo $phone_style=$_POST['phone_style'];
//echo $phone_screen=$_POST['phone_screen'];
//echo $phone_text=$_POST['phone_text'];
//echo $phone_cpu=$_POST['phone_cpu'];
//echo $phone_RAM=$_POST['phone_RAM'];
//echo $phone_save=$_POST['phone_save'];
//echo $phone_hot=$_POST['phone_hot'];
//连接数据库
$conn=connnetDb();
//修改指定数据
mysqli_query($conn,"UPDATE phone SET phone_title='$phone_title',phone_img1='$phone_img1',phone_img2='$phone_img2',phone_img3='$phone_img3',phone_name='$phone_name',phone_price='$phone_price',phone_style='$phone_style',phone_screen='$phone_screen',phone_text='$phone_text',phone_cpu='$phone_cpu',phone_RAM='$phone_RAM',phone_save='$phone_save',phone_hot='$phone_hot' ,phone_stock='$phone_stock' ,phone_sell='$phone_sell'  WHERE phone_id='$phone_id'");
//排错并返回
if(mysqli_error()){
    echo mysqli_error();
}else{
    header("Location:allshop.php");
}
