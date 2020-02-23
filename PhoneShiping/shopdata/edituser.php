<?php
//修改数据
//创建edituser.php，获取需要修改的数据并呈现成表单，供用户修改数据，
//然后提交给服务端edituser_server.php处理：
require_once 'functions.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改用户数据</title>
</head>
<body>
<?php
if(!empty($_GET['phone_id'])){
    //连接mysql数据库
    $conn=connnetDb();
    //查找phone_id
    $phone_id=$_GET['phone_id'];
    $result=mysqli_query($conn,"SELECT * FROM phone WHERE phone_id='$phone_id'");
    if(!$conn)
    {
        die('can not connect db');
    }
    //获取结果数组
    $result_arr=mysqli_fetch_assoc($result);
    }else{
    die('id not define');
    }
?>
<form action="edituser_server.php" method="post">
    <label>phone_ID：(不可修改)</label><input type="text" name="phone_id" value="<?php echo $phone_id=$result_arr['phone_id'];?>"><br>
    <label>手机名称：</label><input type="text" name="phone_name" value="<?php echo $phone_name=$result_arr['phone_name'];?>"><br>
    <label>简介：</label><input type="text" name="phone_title" value="<?php echo $phone_title=$result_arr['phone_title'];?>"><br>
    <label>图片1</label><input type="text" name="phone_img1" value="<?php echo $phone_img1=$result_arr['phone_img1'];?>"><br>
    <label>图片2</label><input type="text" name="phone_img2" value="<?php echo $phone_img2=$result_arr['phone_img2'];?>"><br>
    <label>图片3</label><input type="text" name="phone_img3" value="<?php echo $phone_img3=$result_arr['phone_img3'];?>"><br>
    <label>手机价格：</label><input type="text" name="phone_price" value="<?php echo $phone_price=$result_arr['phone_price'];?>"><br>
    <label>套餐类型</label><input type="text" name="phone_style" value="<?php echo $phone_style=$result_arr['phone_style'];?>"><br>
    <label>分辨率</label><input type="text" name="phone_screen" value="<?php echo $phone_screen=$result_arr['phone_screen'];?>"><br>
    <label>手机描述</label><input type="text" name="phone_text" value="<?php echo $phone_text=$result_arr['phone_text'];?>"><br>
    <label>手机cpu型号</label><input type="text" name="phone_cpu" value="<?php echo $phone_cpu=$result_arr['phone_cpu'];?>"><br>
    <label>手机运行内存：</label><input type="text" name="phone_RAM"value="<?php echo $phone_RAM=$result_arr['phone_RAM'];?>"><br>
    <label>存储容量</label><input type="text" name="phone_save" value="<?php echo $phone_save=$result_arr['phone_save'];?>"><br>
    <label>推荐度：</label><input type="text" name="phone_hot" value="<?php echo $phone_hot=$result_arr['phone_hot'];?>"><br>
    <label>库存</label><input type="text" name="phone_stock" value="<?php echo $phone_stock=$result_arr['phone_stock'];?>"><br>
    <label>卖出：</label><input type="text" name="phone_sell" value="<?php echo $phone_sell=$result_arr['phone_sell'];?>"><br>
    <input type="submit" value="提交修改">
</form>
</body>
</html>