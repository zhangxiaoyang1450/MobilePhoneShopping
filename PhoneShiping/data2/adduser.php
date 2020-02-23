<?php
//创建处理用户表单数据的服务端文件adduser.php，并将添加的数据返回到列表页面
require_once 'functions.php';
//首先进行非空排错
if(!isset($_POST['id'])){
    die('id is not define');
}
if(!isset($_POST['password'])){
    die('password is not define');
}

if(!isset($_POST['sex'])){
    die('sex is not define');
}
$id=$_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$phonenumber = $_POST['phonenumber'];
$major = $_POST['major'];
$love = $_POST['love'];
if(empty($username)){
    die('username is empty');
}
if(empty($password)){
    die('password is empty');
}
if(empty($sex)){
    die('sex is empty');
}
//连接数据库
$conn=connnetDb();

$id=mt_rand(1000000, 9999999);
//执行类型转换，防止SQL注入
$age=intval($age);
//插入数据
mysqli_query($con, "insert into table1 (id,username, password,sex,age,phonenumber,major,love,style) values('$id','$username', '$password','$sex','$age','$phonenumber','$major','$love',2)");
//返回列表页面
if(mysqli_error()){
    echo mysqli_error();
}else{
    header("Location:allusers.php");
}
