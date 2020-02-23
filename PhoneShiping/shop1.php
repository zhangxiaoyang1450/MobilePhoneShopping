<!--购物车，对于用户可操作-->
<?php
session_start();
$phone_id = $_GET['phone_id'];
$username = $_GET['username'];
$con=mysqli_connect("localhost","root","","zxy");
if(!$con){
    die("连接失败!".mysqli_error());
}
$result=mysqli_query($con,"SELECT * FROM phone WHERE phone_id='$phone_id'");
//获取结果数组
$result_arr=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品详情页</title>
    <meta name="keywords" content="首页" />
    <meta name="description" content="首页" />
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css1/normalize.css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script src="js/common.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var showproduct = {
                "boxid":"showbox",
                "sumid":"showsum",
                "boxw":400,//宽度,该版本中请把宽高填写成一样
                "boxh":400,//高度,该版本中请把宽高填写成一样
                "sumw":60,//列表每个宽度,该版本中请把宽高填写成一样
                "sumh":60,//列表每个高度,该版本中请把宽高填写成一样
                "sumi":7,//列表间隔
                "sums":5,//列表显示个数
                "sumsel":"sel",
                "sumborder":1,//列表边框，没有边框填写0，边框在css中修改
                "lastid":"showlast",
                "nextid":"shownext"
            };//参数定义
            $.ljsGlasses.pcGlasses(showproduct);//方法调用，务必在加载完后执行
        });
    </script>
</head>
<body>
<div id="header">
    <div class="wrapper">
        <P id="login-contain">
            嗨，<?php echo $username ?>:欢迎来到正阳手机销售
<!--            <a href="homepage.html">请登录</a>-->
            <a href="register2.html">免费注册</a>
            <a href="firstmain.php">首页</a>
        </P>
        <ul id="header-menu">
            <li class="menu menu-hd">
                <a href="">我的商城</a>
            </li>
            <li class="menu menu-hd" >
                <a href="" id="noshop">购物车</a>
            </li>
<!--            <li class="menu menu-hd">-->
<!--                <a href="">用户选择</a>-->
<!--                <ul class="sub-menu">-->
<!--                    <li>-->
<!--                        <a href="">用户选择1</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="">用户选择2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
        </ul>

    </div>
</div>
<div class="showall">
    <!--left -->
    <div class="showbot">
        <div id="showbox">
            <img src="<?php echo $phone_img=$result_arr['phone_img1'];?>" width="400" height="400" />
            <img src="<?php echo $phone_img=$result_arr['phone_img2'];?>" width="400" height="400" />
            <img src="<?php echo $phone_img=$result_arr['phone_img3'];?>" width="400" height="400" />
        </div><!--展示图片盒子-->
        <div id="showsum">
            <!--展示图片里边-->
        </div>
        <p class="showpage">
            <a href="javascript:void(0);" id="showlast"> < </a>
            <a href="javascript:void(0);" id="shownext"> > </a>
        </p>
    </div>
    <!--conet -->
    <div class="tb-property">
        <div class="tr-nobdr">
            <h3><?php echo $phone_text=$result_arr['phone_text'];?></h3>
        </div>
        <div class="txt">
            <span class="nowprice">￥<a href=""><?php echo $phone_price=$result_arr['phone_price'];?></a></span>
            <div class="cumulative">
                <span class="number ty1">累计售出<br /><em ><?php echo $phone_sell=$result_arr['phone_sell'];?></em></span>
<!--                <span class="number tyu">累计评价<br /><em >25</em></span>-->
            </div>
        </div>
        <div class="txt-h">
            <span class="tex-o">配置</span>
            <ul class="glist" id="glist" data-monitor="goodsdetails_fenlei_click">
                <li><a title="" href=""><?php echo $phone_RAM=$result_arr['phone_RAM'];?></a></li>
<!--                <li><a title="蓝色16g" href="">红色36g</a></li>-->
            </ul>
        </div>
        <script>
            $(document).ready(function(){
                var t = $("#text_box");
                $('#min').attr('disabled',true);
                $("#add").click(function(){
                    t.val(parseInt(t.val())+1)
                    if (parseInt(t.val())!=1){
                        $('#min').attr('disabled',false);
                    }

                })
                $("#min").click(function(){
                    t.val(parseInt(t.val())-1);
                    if (parseInt(t.val())==1){
                        $('#min').attr('disabled',true);
                    }
                })
            });
        </script>
        <form action="shopcar.php?username=<?php echo $username?>&phone_id=<?php echo $phone_id ?>&phone_stock=<?php echo $phone_stock=$result_arr['phone_stock'] ?>" method="post">
            <div class="gcIpt">
                <span class="guT">数量</span>
                <input id="min" name="" type="button" value="-" />
                <input id="text_box" name="shop_num" type="text" value="1" style="width:30px; text-align: center; color: #0F0F0F;"/>
                <input id="add" name="" type="button" value="+" />
                <span class="Hgt">库存（<?php echo $phone_stock=$result_arr['phone_stock'];?>）</span>
            </div>
            <div class="nobdr-btns">

                <button class="addcart hu" id="shopcar" name="" ><img src="images/shop.png" width="25" height="25"/>加入购物车</button>
                <button class="addcart yh" id="buy" name=""><img src="images/ht.png" width="25" height="25"/>立即购买</button>
            </div>
        </form>
        <div class="guarantee">
            <span>邮费：包邮&nbsp;&nbsp;支持货到付款 <a href=""><img src="images/me.png"/></a></span>
        </div>
    </div>

        <script>
            var detail = document.querySelector('.detail');
            var origOffsetY = detail.offsetTop;
            function onScroll(e) {
                window.scrollY >= origOffsetY ? detail.classList.add('sticky') :
                    detail.classList.remove('sticky');
            }
            document.addEventListener('scroll', onScroll);
        </script>
        <div class="detail">
            <div class="active_tab" id="outer">
                <ul class="act_title_left" id="tab">
                    <li class="act_active">
                        <a href="#">规格参数</a>
                    </li>
                    <li>
                        <a href="#">商品介绍</a>
                    </li>
                    <li>
                        <a href="#">售后保障</a>
                    </li>
                </ul>
                <ul class="act_title_right">
                    <li class="mui-ac" >
                        <a>欢迎选购</a>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            <div id="content" class="active_list">
                <!--0-->
                <div id="ui-a" class="ui-a">
                    <ul style="display:block;">
                        <li>手机名称：<?php echo $phone_name=$result_arr['phone_name'];?></li>
                        <li>手机描述：<?php echo $phone_text=$result_arr['phone_text'];?></li>
                        <li>套餐类型：<?php echo $phone_style=$result_arr['phone_style'];?></li>
                        <li>分辨率：<?php echo $phone_screen=$result_arr['phone_screen'];?></li>
                        <li>手机cpu型号：<?php echo $phone_cpu=$result_arr['phone_cpu'];?></li>
                        <li>手机运行内存：<?php echo $phone_RAM=$result_arr['phone_RAM'];?></li>
                        <li>存储容量：<?php echo $phone_save=$result_arr['phone_save'];?></li>
                        <li><img src="<?php echo $phone_img=$result_arr['phone_img2'];?>"/></li>
                        <li><img src="<?php echo $phone_img=$result_arr['phone_img1'];?>"/></li>
                    </ul>
                </div>
                <!--商品规格-->
                <div id="bit" class="bit">
                    <ul style="display:none;">
                        <li><img src="<?php echo $phone_img=$result_arr['phone_img1'];?>"/></li>
                   </ul>
                </div>
                <!--售后保障-->
                <div id="uic" class="uic">
                    <ul style="display:none;">
                        <p>服务介绍</p>
                            <p>您购买带有“全国联保”标识商品后，，即可按照《中华人民共和国产品质量法》，《中华人民共和国消费者权益保护法》，享受商家提供的修理，更换，退货服务。</p>
                        <p>您可通过登录系统就您已购买的带有“全国联保”标识的商品进行在线咨询，对故障机器一键报修，或可以查询品牌商售后信息。</p>
                        <p>若您发起报修则：</p>
                        <p>报修途径:</p>
                        <p>拨打品牌商服务页面的400报修热线进行报修</p>
                        <p>可点击品牌售后服务中心取得直接联系，并在线咨询售后相关问题。</p>
                        <p>我们承诺：</p>
                        <p>您将在报修之时起24小时之内得到相应；如需邮寄给品牌商或第三方，品牌商或第三方收到商品且接受保修后，则品牌商或第三方将在接受保修之日起30天内向消费者反馈相应售后信息。</p>
                        <p>投诉途径</p>
                        <p>拨打服务热线10086</p>
                        <p>通过服务子订单中的“我要投诉”发起投诉；</p>
                        <p>正阳系统会在24小时内，对您的服务投诉进行查实并做出回应，若查实为品牌未履行其全国联保义务的，系统将对对应品牌进行处罚。</p>

                        <p> 赔付说明</p>
                        <p> 如判定您的投诉成立，经确认需要赔付的订单，您将获得100元/单的违约金，该违约金以积分的形式支付。</p>
                        <p>商家向您支付违约金后，不再属于正阳规则的违背承诺投诉受理范围。</p>
                    </ul>
                </div>
            </div>
            <script>
                $(function(){
                    window.onload = function()
                    {
                        var $li = $('#tab li');
                        var $ul = $('#content ul');

                        $li.mouseover(function(){
                            var $this = $(this);
                            var $t = $this.index();
                            $li.removeClass();
                            $this.addClass('act_active');
                            $ul.css('display','none');
                            $ul.eq($t).css('display','block');
                        })
                    }
                });
            </script>
        </div>
    </div>
</div>
</body>
</html>

