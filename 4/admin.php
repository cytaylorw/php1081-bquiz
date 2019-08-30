<?php
include_once "base.php";
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>┌精品電子商務網站」</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<link href="./css/c.css" rel="stylesheet" type="text/css">
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
			<img src="./icon/0417.jpg">
		</div>
		<div id="left" class="ct">
			<div style="min-height:400px;">
				<?php
					$a=array_values($am);
					$ks=array_keys($am);
					foreach($a as $k => $v2){
						if(in_array($k,$_SESSION["admin"])) echo "<a href='?do=".$ks[$k]."'>$v2</a>";
					}
				?>
				<!-- <a href='?do=admin'>管理權限設置</a>
				<a href="?do=th">商品分類與管理</a>
				<a href="?do=ord">訂單管理</a>
				<a href="?do=mem">會員管理</a>
				<a href="?do=bot">頁尾版權管理</a>
				<a href="?do=news">最新消息管理</a> -->
				<a href="?do=logout" style="color:#f00;">登出</a>
			</div>
		</div>
		<div id="right">
		<?php
			$do=(empty($_GET['do']))?"admin":$_GET['do'];
			include_once "./admin/$do.php";
		?>
		</div>
		<div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
			頁尾版權 : <?=f1("bot")["name"];?></div>
	</div>
	<script src="./js/j.js"></script>
</body>

</html>