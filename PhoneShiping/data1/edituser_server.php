<?php
//创建服务端edituser_server.php处理修改的数据，并返回到主页面allusers.php。
require_once 'functions.php';
$id=intval($_POST['id']);
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$phonenumber = $_POST['phonenumber'];
$major = $_POST['major'];
$love = $_POST['love'];
$style=$_POST['style'];

//echo $id.'---';
//echo $username.'---';
//echo $password.'---';
//echo $confirmPassword.'---';
//echo $sex.'---';
//echo $age.'---';
//echo $phonenumber.'---';
//echo $major.'---';
//echo $love.'---';
//echo $style;

//连接数据库
$conn=connnetDb();
//修改指定数据
mysqli_query($conn,"UPDATE table1 SET username='$username',password='$password',sex='$sex',age='$age',phonenumber='$phonenumber',major='$major',love='$love',style='$style'  WHERE id=$id");
//排错并返回
if(mysqli_error()){
    echo mysqli_error();
}else{
    header("Location:allusers.php");
}
