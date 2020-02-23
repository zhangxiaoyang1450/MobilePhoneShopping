<?php
    session_start();
    $shop_num=$_POST['shop_num'];
    $phone_id = $_GET['phone_id'];
    $username = $_GET['username'];
    $phone_stock = $_GET['phone_stock'];

    $con=mysqli_connect("localhost","root","","zxy");//连接数据库
    if(!$con){
        die("连接失败!".mysqli_error());
    }
    $result=mysqli_query($con,"SELECT * FROM phone WHERE phone_id=$phone_id");
    $result_arr=mysqli_fetch_assoc($result);
    $phone_id=$result_arr['phone_id'];
    $phone_img1=$result_arr['phone_img1'];
    $phone_name=$result_arr['phone_name'];
    $phone_price=$result_arr['phone_price'];
    $phone_stock=$result_arr['phone_stock'];//库存
    $phone_sell=$result_arr['phone_sell'];//卖出
    $sum_sell=$phone_sell+$shop_num;//卖出累计总数
    $sum_stock=$phone_stock-$sum_sell;//库存剩余
    $shop_name=$phone_name;
    $shop_img=$phone_img1;
    $shop_id=mt_rand(1000000, 9999999);
    mysqli_query($con,"update phone set phone_stock='$sum_stock',phone_sell='$sum_sell' where phone_id='$phone_id'");
    $a=mysqli_query($con,"insert into shopcar (username,phone_id,shop_id,shop_name,shop_num,shop_img,phone_price)value ('$username','$phone_id','$shop_id','$shop_name','$shop_num','$shop_img','$phone_price')");
    header("refresh:0;url=car.php?username=$username");
    ?>

