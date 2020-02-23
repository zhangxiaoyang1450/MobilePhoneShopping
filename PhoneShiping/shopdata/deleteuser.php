<?php
/**
 * Created by PhpStorm.
 * User: 一杯热水
 * Date: 2019/4/18
 * Time: 21:17
 */
//创建deleteuser.php，执行删除操作后返回主页面

require_once 'functions.php';

//排空错误
if(empty($_GET['phone_id'])){
    die('id is empty');
}
//连接数据库
$conn=connnetDb();

$phone_id=intval($_GET['phone_id']);

//删除指定数据
mysqli_query($conn,"DELETE FROM phone WHERE phone_id='$phone_id'");
//排错并返回页面
if(mysqli_error()){
    echo mysqli_error();
}else{
    header("Location:allshop.php");
}

