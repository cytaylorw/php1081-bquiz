<?php
include_once "base.php";
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top">
            <a href="?">
                <img src="./icon/0416.jpg">
            </a>
            <div style="padding:10px;">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                    echo (empty($_SESSION["mem"]))?"<a href='?do=login'>會員登入</a>":"<a href='?do=logout'>登出</a>";
                ?>
                |
                <?php
                    echo (empty($_SESSION["admin"]))?"<a href='?do=admin'>管理登入</a>":"<a href='backend.php'>返回管理</a>";
                ?>
                
            </div>
            <marquee behavior="" direction="">
                情人節特惠活動 &nbsp;&nbsp;&nbsp;&nbsp; 年終特賣會開跑了
            </marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
        <?php
            $do=(empty($_GET["do"]))?"home":$_GET["do"];
            include_once "./i/index/$do.php"
        ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
        <?=find1("bot")["bot"];?></div>
    </div>
    <script src="./js/js.js"></script>
</body>

</html>