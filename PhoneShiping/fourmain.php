<!--普通用户登陆成功首页-->
<?php
session_start();
$con=mysqli_connect("localhost","root","","zxy");
if(!$con){
    die("连接失败!".mysqli_error());
}
if (!Empty($_POST['phone_text'])){
    $phone_text=$_POST['phone_text'];
    $result=mysqli_query($con,"SELECT * FROM phone WHERE phone_text LIKE '%$phone_text%'");
}else{
    $result=mysqli_query($con,"SELECT * FROM phone where phone_hot='1'");
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--网页前面小图标-->
    <link rel="shortcut icon" href="img/aaa.ico" />
    <title>正阳科技——手机销售</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body id="body">
<div id="header">
    <div class="wrapper">
        <P id="login-contain">
            嗨，亲爱的用户:<?php echo $username = $_GET['username']?>，欢迎来到正阳手机销售
            <a href="homepage.html">
            </a>
            <a href="register2.html">免费注册</a>
        </P>
        <ul id="header-menu">
            <li class="menu menu-hd">
                <a href="./data3/allusers.php?username=<?php echo $username?>" target="_blank">个人用户管理</a>
            </li>
            <li class="menu menu-hd">
                <a href="car.php?username=<?php echo $username?>" target="_blank">购物车</a>
            </li>
            <li class="menu menu-hd">
                <a href="./tubiao/index.html" target="_blank">数据统计</a>
            </li>

            <li class="menu menu-hd">
                <a href="firstmain.php">退出登陆</a>
            </li>
        </ul>

    </div>
</div>
<div id="search">
    <div class="wrapper">
        <img src="img/hot.png" alt="">
        <div id="search-contain">
            <div class="search-input">
                <form action="fourmain.php" method="post">
                    <input type="text" name="phone_text" placeholder="搜索 手机 品牌" style="font-size: 20px">
                    <button>搜索</button>
                </form>
            </div>
            <ul class="search-list">
                <li class="first">
                    <form action="fourmain.php?username=<?php echo $username?>" method="post">
                        <button name="phone_text" value="">全部</button>
                </li>
                <li class="">
                    <form action="fourmain.php?username=<?php echo $username?>" method="post">
                        <button name="phone_text" value="小米">小米</button>
                </li>
                <li>
                    <form action="fourmain.php?username=<?php echo $username?>" method="post">
                        <button name="phone_text" value="华为">华为</button>
                </li>
                <li>
                    <form action="fourmain.php?username=<?php echo $username?>" method="post">
                        <button name="phone_text" value="魅族">魅族</button>
                </li>
                <li>
                    <form action="fourmain.php?username=<?php echo $username?>" method="post">
                        <button name="phone_text" value="vivo">vivo</button>
                </li>
<!--                <li>-->
<!--                    <form action="fourmain.php?username=--><?php //echo $username?><!--" method="post">-->
<!--                        <button name="phone_text" value="oppo">oppo</button>-->
<!--                </li>-->
                <li>
                    <form action="fourmain.php?username=<?php echo $username?>" method="post">
                        <button name="phone_text" value="苹果">苹果</button>
                </li>
                <li>
                    <form action="fourmain.php?username=<?php echo $username?>" method="post">
                        <button name="phone_text" value="配件">配件</button>
                </li>
            </ul>
        </div>
    </div>

</div>
<div id="banner">
    <div>
        <ul class="banner-img">
            <!--style="background: #396b90"可加入li中，改变双边颜色-->
            <li >
                <a href="">
                    <img src="img/sj1.jpg" alt="">
                </a>
            </li>
        </ul>
    </div>
</div>
<div id="focus">
    <div class="wrapper">
        <span class="f1">FOCUS</span>
        <span class="f2">热门机型</span>
    </div>
</div>
<div id="brand">
    <div class="wrapper">
        <ul>
            <?php for($i=0; $i<$dataCount; $i++):
                $result_arr=mysqli_fetch_assoc($result);?>
                <li class="brand-type brand1">
                    <a href="shop1.php?username=<?php echo $username?>&phone_id=<?php echo $phone_id=$result_arr['phone_id'];?>" target="_blank">
                        <div class="title"><?php echo $phone_title=$result_arr['phone_title'];?></div>
                        <img src=" <?php echo $phone_img=$result_arr['phone_img1'];?>" alt="">
                        <div class="bottom1"><?php echo $phone_name=$result_arr['phone_name'];?></div>
                        <div class="bottom2"><?php echo $phone_price=$result_arr['phone_price'];?></div>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </div>
</div>
<div id="float">
    <div>
        <ul class="nav">
            <li id="a" style="color: red">
                <!--                <a style="color: white">回到顶部 </a>-->
                <button>回到顶部</button>
            </li>
            <li>
                <form action="fourmain.php?username=<?php echo $username?>" method="post">
                    <button name="phone_text" value="">全部</button>
            </li>
            <li>
                <form action="fourmain.php?username=<?php echo $username?>" method="post">
                    <button name="phone_text" value="小米">小米</button>
            </li>
            <li>
                <form action="fourmain.php?username=<?php echo $username?>" method="post">
                    <button name="phone_text" value="华为">华为</button>
            </li>
            <li>
                <form action="fourmain.php?username=<?php echo $username?>" method="post">
                    <button name="phone_text" value="魅族">魅族</button>
            </li>
            <li>
                <form action="fourmain.php?username=<?php echo $username?>" method="post">
                    <button name="phone_text" value="vivo">vivo</button>
            </li>
<!--            <li>-->
<!--                <form action="fourmain.php?username=--><?php //echo $username?><!--" method="post">-->
<!--                    <button name="phone_text" value="oppo">oppo</button>-->
<!--            </li>-->
            <li>
                <form action="fourmain.php?username=<?php echo $username?>" method="post">
                    <button name="phone_text" value="vivo">苹果</button>
            </li>
            <li>
                <form action="fourmain.php?username=<?php echo $username?>" method="post">
                    <button name="phone_text" value="oppo">配件</button>
            </li>
        </ul>
    </div>
</div>
</body>
<script>
    var oDIV= document.getElementById('a');
    oDIV.onclick = function () {
        // console.log(1111);
        // var top=document.documentElement.scrollTop;
        var top = document.body.scrollTop || document.documentElement.scrollTop;
        var time2 = setInterval(function () {//无限循环
            scrollTo(0, top *= 0.6);//匀速上浮
            if (top <= 1) {
                clearInterval(time2);
                scrollTo(0, 0);
            }
            console.log(top);
        }, 50)
    }
        // <body onpagehide="myFunction()">
</script>
</html>