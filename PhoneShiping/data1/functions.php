<?php
//然后再创建一个保存函数的文件functions.php:
require_once 'config.php';
function connnetDb()
{
    //连接mysql数据库
    $conn = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PW);
    //排除连接数据库异常错误
    if (!$conn) {
        die('cani not connect db');
    }
    //在mysql中选中myapp数据库
    mysqli_select_db($conn,"zxy");
    return $conn;
}

