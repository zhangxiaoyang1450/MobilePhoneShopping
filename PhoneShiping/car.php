<!--普通用户显示购物车，并处理删除请求-->
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
<table>
    </tr><th>用户<th><th>手机ID</th><th>商品ID</th><th>商品名称</th><th>购买数量</th><th>手机图片</th><th>手机价格</th><th>删除</th><th>购买</th></th>
    <?php
    $username = $_GET['username'];
//    echo $username;
    $con=mysqli_connect("localhost","root","","zxy");//连接数据库
    if(!$con){
        die("连接失败!".mysqli_error());
    }
    $result1=mysqli_query($con,"SELECT * FROM shopcar where username=$username");
    //获取数据表的数据条数
    $dataCount=mysqli_num_rows($result1);
    for($i=0;$i<$dataCount;$i++){
        $result1_arr=mysqli_fetch_assoc($result1);
        $username=$result1_arr['username'];
        $phone_id=$result1_arr['phone_id'];
        $shop_id=$result1_arr['shop_id'];
        $shop_name=$result1_arr['shop_name'];
        $shop_num=$result1_arr['shop_num'];
        $shop_img=$result1_arr['shop_img'];
        $phone_price=$result1_arr['phone_price'];
        echo "<tr><td>$username<td><td>$phone_id</td><td>$shop_id</td><td>$shop_name</td><td>$shop_num</td><td><img src='$shop_img' width=\"100\" height=\"100\"></td><td>$phone_price</td><td><a href='shop_deleteuser.php?shop_id=$shop_id&username=$username'>删除</a></td><td><a href='' id='goumai' onclick='asd()'>立即购买</a></td></td>";
    }
    ?>

</table>
<script>
    function asd() {
        alert('购买成功！');
    }
</script>
</body>
</html>