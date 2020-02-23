<!--登陆后台处理-->
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","zxy");
    if(!$con){
        die("连接失败!".mysqli_error());
    }else {
//        echo "连接数据库成功<br>";

    $name=$_POST['name'];
   // echo '用户名是:'.$name.'<br />';
   $password=$_POST['password'];
   // echo '密码是:'.$password.'<br />';

    if(isset($_REQUEST['code'])){
        if($_REQUEST['code']==$_SESSION['code']){
            if ($name && $password){//如果用户名和密码都不为空
                $sql1 = mysqli_query($con,"select * from table1 where username = '$name' and password='$password' and style=0");//检测数据库是否有对应的username和password的sql
//                print_r($sql1);
//                $rows=mysqli_num_rows($sql1);//返回一个数值
                if($sql1){//0 false 1 true
                    if(mysqli_affected_rows($con)>0){
                        header("refresh:0;url=twomain.php?username=$name");//如果成功跳转至welcome.html页面
                        exit;
                    }

                }else{
                    echo "用户名或密码错误";
                    exit('用户名输入错误，点击返回重新输入<a href="javascript:history.back(-1);">返回</a>');
                }
            $sql2 = mysqli_query($con,"select * from table1 where username = '$name' and password='$password' and style=1");//检测数据库是否有对应的username和password的sql
//                print_r($sql2);
//                $rows=mysqli_num_rows($sql1);//返回一个数值
                if($sql2){//0 false 1 true
                    if(mysqli_affected_rows($con)>0){
                        header("refresh:0;url=threemain.php?username=$name");//如果成功跳转至welcome.html页面
                        exit;
                    }

                }else{
                    echo "用户名或密码错误";
                    exit('用户名输入错误，点击返回重新输入<a href="javascript:history.back(-1);">返回</a>');
                }
            $sql3 = mysqli_query($con,"select * from table1 where username = '$name' and password='$password' and style=2");//检测数据库是否有对应的username和password的sql
//                print_r($sql3);
//                $rows=mysqli_num_rows($sql1);//返回一个数值
                if($sql3){//0 false 1 true
                    if(mysqli_affected_rows($con)>0){
                        header("refresh:0;url=fourmain.php?username=$name");//如果成功跳转至welcome.html页面
                        exit;
                    }

                }else{
                    echo "用户名或密码错误";
                    exit('用户名输入错误，点击返回重新输入<a href="javascript:history.back(-1);">返回</a>');
                }
            }else {//如果用户名或密码有空
                echo "表单填写不完整";
                exit('用户名输入错误，点击返回重新输入<a href="javascript:history.back(-1);">返回</a>');
            }
        }else{//如果验证码输入错误
            exit('验证码填写错误，请点击返回重新输入<a href="javascript:history.back(-1);">返回</a>');
        }
    }
    }
?>