<?php
/**
 * Created by PhpStorm.
 * User: 一杯热水
 * Date: 2019/4/18
 * Time: 21:17
 */
//创建deleteuser.php，执行删除操作后返回主页面
session_start();
$username = $_GET['username'];
//echo $username;
$con=mysqli_connect("localhost","root","","zxy");//连接数据库
if(!$con){
    die("连接失败!".mysqli_error());
}

//排空错误
if(empty($_GET['shop_id'])){
    die('id is empty');
}



$shop_id=intval($_GET['shop_id']);

//删除指定数据
mysqli_query($con,"DELETE FROM shopcar WHERE shop_id='$shop_id'");
//排错并返回页面
if(mysqli_error()){
    echo mysqli_error();
}else{
    header("Location:car.php?shop_id='$shop_id'&username=$username");
}

