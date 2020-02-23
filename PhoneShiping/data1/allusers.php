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
<a href="#" onclick="javascript:history.back(-1);">返回上一页</a><br>
<a href="adduser.html">添加用户</a><br>
<a href="allusers.php">显示所有用户</a><br>
<form action="allusers.php" method="post">
    <input type="text" name="username" size="10"/>
    <input type="submit" value="搜索"/><br />
</form>
<table>
    </tr><th>id<th><th>名字</th><th>密码</th><th>性别</th><th>年龄</th><th>联系方式</th><th>专业</th><th>手机偏爱性能</th><th>用户类型</th><th>修改/删除</th></th>
    <?php
    //连接数据库
    $conn=connnetDb();

    if (!Empty($_POST['username'])){
        $username=$_POST['username'];
        $result=mysqli_query($conn,"SELECT * FROM table1 WHERE username LIKE '%$username%'");
    }else{
        $result=mysqli_query($conn,"SELECT * FROM table1");
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
    //打印输出所有数据
    for($i=0;$i<$dataCount;$i++){
        $result_arr=mysqli_fetch_assoc($result);
        $id=$result_arr['id'];
        $username=$result_arr['username'];
        $password=$result_arr['password'];
        $sex=$result_arr['sex'];
        $age=$result_arr['age'];
        $phonenumber=$result_arr['phonenumber'];
        $major=$result_arr['major'];
        $love=$result_arr['love'];
        $style=$result_arr['style'];
        //print_r($result_arr);
        echo "<tr><td>$id<td><td>$username</td><td>$password</td><td>$sex</td><td>$age</td><td>$phonenumber</td><td>$major</td><td>$love</td><td>$style</td><td><a href='edituser.php?id=$id'>修改</a> <a href='deleteuser.php?id=$id'>删除</a></td></td>";
    }
    ?>
</table>
</body>
</html>