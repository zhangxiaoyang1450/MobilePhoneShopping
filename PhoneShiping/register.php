<?php
$con=mysqli_connect("localhost","root","","zxy");
if(!$con){
    die("连接失败!".mysqli_error());
}else {
    echo "连接数据库成功<br>";
//    mysqli_query($con, "insert into table1 (username, password,sex,age,phonenumber,major,love) values('fu', '123456','F','22','12345678','M05','L06')");


    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $phonenumber = $_POST['phonenumber'];
    $major = $_POST['major'];
    $love = $_POST['love'];

    //注册信息判断
    if (!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)) {
        exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>');
    }
    if (strlen($password) < 6) {
        exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
    }
    if (empty($_POST)) {
        exit("您提交的表单数据超过post_max_size! <a href=\"javascript:history.back(-1);\">返回</a><br>");
    }

    // 判断输入密码与确认密码是否相同
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password != $confirmPassword) {
        exit('输入的密码与确认密码不相等！<a href=\"javascript:history.back(-1);\">返回</a>');
    }
    // 判断用户名是否重复
//    $sql = mysqli_query($con, "select * from table1 where username = '$username'");//检测数据库是否重复
//    $resultSet = mysqli_num_rows($sql);
//    if (mysqli_num_rows($resultSet) > 0) {
//        exit("用户名已被占用，请更换其他用户名");
//    }
    //检测用户名是否已经存在
    $check_query = mysqli_query($con,"select * from table1 where username='$username' ");
//    limit 1
    if (mysqli_fetch_array($check_query)) {
        echo '错误：用户名 ', $username, ' 已存在。<a href="javascript:history.back(-1);">返回</a>';
        exit;
    }
    $sql1 = mysqli_query($con,"select * from table1");
    $num=mysqli_num_rows($sql1)+1;
    //写入数据
    $sql = mysqli_query($con, "insert into table1 (id,username, password,sex,age,phonenumber,major,love,style) values('$num','$username', '$password','$sex','$age','$phonenumber','$major','$love',2)");


    $userResult = mysqli_query($con, "select * from table1 where username = '$username'");
    if ($user = mysqli_fetch_array($userResult)) {
        echo "您的注册用户名为：" . $user['username'];
    } else {
        exit("用户注册失败！<a href=\"javascript:history.back(-1);\">返回</a>");
    }

    if ($sql) {
        exit('用户注册成功！点击此处 <a href="homepage.html">登录</a>');
    } else {
        echo '抱歉！添加数据失败：', mysqli_error(), '<br />';
        echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
    }
}
mysqli_close($con);
?>



