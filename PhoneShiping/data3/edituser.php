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
if(!empty($_GET['id'])){
    //连接mysql数据库
    $conn=connnetDb();
    //查找id
    $id=intval($_GET['id']);
    $result=mysqli_query($conn,"SELECT * FROM table1 WHERE id=$id");
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
    <label>用户ID：</label><input type="text" name="id" value="<?php echo $result_arr['id']?>">
    <label>用户名：</label><input type="text" name="username" value="<?php echo $result_arr['username']?>">
    <label>密码：</label><input type="text" name="password" value="<?php echo $result_arr['password']?>">
    <label>性别</label><input type="text" name="sex" value="<?php echo $result_arr['sex']?>">
    <label>年龄：</label><input type="text" name="age" value="<?php echo $result_arr['age']?>">
    <label>联系方式</label><input type="text" name="phonenumber" value="<?php echo $result_arr['phonenumber']?>">
    <label>工作</label><input type="text" name="major" value="<?php echo $result_arr['major']?>">
    <label>爱好</label><input type="text" name="love" value="<?php echo $result_arr['love']?>">
    <label>类型</label><input type="text" name="style" value="<?php echo $result_arr['style']?>">
    <input type="submit" value="提交修改">
</form>
</body>
</html>