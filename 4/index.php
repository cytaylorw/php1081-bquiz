<?php include_once "base.php" ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <link href="./css/main.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top">
            <a href="index.php">
                <img src="./icon/0416.jpg">
            </a>
            <div style="padding:10px;display:inline-block">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <a href="?do=login">會員登入</a> |
                <a href="?do=admin">管理登入</a>
            </div>
            <marquee behavior="" direction="">情人節特惠活動 &nbsp; 年終特賣會開跑了 </marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <a href="?do=home" style="color:#f00;">全部商品</a>
            <?php
				foreach(find("cat",["pid"=>0]) as $v){
                    echo "<div class='ww'><a href='?do=home&cat1=".$v["id"]."'>".$v["name"]."</a><div class='s'>";
                    foreach(find("cat",["pid"=>$v['id']]) as $s){
                        echo "<a href='?do=home&cat1=".$v["id"]."&cat2=".$s["id"]."'>".$s["name"]."</a>";
                    }
                    echo "</div></div>";
				}
			?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
            <?php
                $do=(empty($_GET['do']))?"home":$_GET['do'];
                include_once "./index/$do.php";

            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            頁尾版權 : </div>
    </div>
    <script src="./js/j.js"></script>
</body>

</html>