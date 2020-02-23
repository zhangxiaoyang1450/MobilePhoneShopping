<?php
//创建处理用户表单数据的服务端文件adduser.php，并将添加的数据返回到列表页面
    require_once 'functions.php';
//    $phone_id=$_POST['phone_id'];
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
    //连接数据库
    $conn=connnetDb();
    $phone_id=mt_rand(1000000, 9999999);//生成随机id
    //执行类型转换，防止SQL注入
//    $age=intval($age);
    //插入数据
    mysqli_query($conn, "insert into phone (phone_id,phone_title,phone_img1,phone_img2,phone_img3,phone_name,phone_price,phone_style,phone_screen,phone_text,phone_cpu,phone_RAM,phone_save,phone_hot,phone_stock,phone_sell) values('$phone_id','$phone_title','$phone_img1','$phone_img2','$phone_img3','$phone_name','$phone_price','$phone_style','$phone_screen','$phone_text',' $phone_cpu','$phone_RAM',' $phone_save','$phone_hot','$phone_stock','$phone_sell')");
    //返回列表页面
    if(mysqli_error()){
        echo mysqli_error();
    }else{
        header("Location:allshop.php");
    }
?>
