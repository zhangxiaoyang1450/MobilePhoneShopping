<?php
//创建主文件allusers.php,将数据库myapp的数据表user的所有输出在html页面上，并添加“添加用户、修改、删除”的链接；
require_once 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>所有用户</title>
    <style>
        body{
            /*width: 2200px;*/
        }
        table{
            border-collapse: collapse;
        }
        th,td{
            border:1px solid #ccccff;
            padding: 5px;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
<a href="adduser.html">添加商品</a><br>
<a href="allshop.php">显示所有商品</a><br>
<form action="allshop.php" method="post">
    <input type="text" name="phone_text" placeholder="请输入搜索关键词" size="30" autocomplete="off"/>
    <input type="submit" value="搜索"/><br />
</form>
<table>
    </tr><th>phone_id<th><th>简介</th><th>图片1</th><th>图片2</th><th>图片3</th><th>手机名称</th><th>手机价格</th><th>套餐类型</th><th>分辨率</th>
    <th>手机描述</th><th>手机cpu型号</th><th>手机运行内存</th><th>存储容量</th><th>推荐度</th><th>库存</th><th>卖出</th><th>修改/删除</th></th>
    <?php
    //连接数据库
//    $phone_text=$_POST['phone_text'];
//    echo $phone_text;
    $conn=connnetDb();
    //查询数据表中的所有数据,并按照id降序排列
//    $result=mysqli_query($conn,"SELECT * FROM table1 ORDER BY id DESC ");
    if (!Empty($_POST['phone_text'])){
        $phone_text=$_POST['phone_text'];
        $result=mysqli_query($conn,"SELECT * FROM phone WHERE phone_text LIKE '%$phone_text%'");
    }else{
        $result=mysqli_query($conn,"SELECT * FROM phone");
    }
    //获取数据表的数据条数
    $dataCount=mysqli_num_rows($result);
    if ($dataCount==0){
        echo "<script language=\"JavaScript\">\r\n";
        echo "alert(\"对不起，未查询到该商品！\");\r\n";
        echo "self.location=document.referrer\r\n";
        echo "</script>";
        exit();
    }


    //echo $dataCount;
    //打印输出所有数据
    for($i=0;$i<$dataCount;$i++){
        $result_arr=mysqli_fetch_assoc($result);
        $phone_id=$result_arr['phone_id'];
        $phone_title=$result_arr['phone_title'];
        $phone_img1=$result_arr['phone_img1'];
        $phone_img2=$result_arr['phone_img2'];
        $phone_img3=$result_arr['phone_img3'];
        $phone_name=$result_arr['phone_name'];
        $phone_price=$result_arr['phone_price'];
        $phone_style=$result_arr['phone_style'];
        $phone_screen=$result_arr['phone_screen'];
        $phone_text=$result_arr['phone_text'];
        $phone_cpu=$result_arr['phone_cpu'];
        $phone_RAM=$result_arr['phone_RAM'];
        $phone_save=$result_arr['phone_save'];
        $phone_hot=$result_arr['phone_hot'];
        $phone_stock=$result_arr['phone_stock'];
        $phone_sell=$result_arr['phone_sell'];
//       phone_id,phone_title,phone_img,phone_name,phone_price,phone_style,phone_screen,phone_text,phone_cpu,phone_RAM,phone_save,phone_hot
        echo "<tr><td>$phone_id<td><td>$phone_title</td><td><img src='$phone_img1' width=\"100\" height=\"100\"></td><td><img src='$phone_img2' width=\"100\" height=\"100\"></td><td><img src='$phone_img3' width=\"100\" height=\"100\"></td><td>$phone_name</td><td>$phone_price</td><td>$phone_style</td><td>$phone_screen</td><td>$phone_text</td><td>$phone_cpu</td><td>$phone_RAM</td><td>$phone_save</td><td>$phone_hot</td><td>$phone_stock</td><td>$phone_sell</td><td><a href='edituser.php?phone_id=$phone_id'>修改</a> <a href='deleteuser.php?phone_id=$phone_id'>删除</a></td></td>";
    }
    ?>

</table>
</body>
</html>