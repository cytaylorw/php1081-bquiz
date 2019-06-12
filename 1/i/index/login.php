<?php
	if(!empty($_POST)){
		// 輸入name必須使用對應的欄位名稱
		echo (rc("admin",$_POST))?gt("admin.php"):"<script>alert('帳號或密碼錯誤')</script>";
	}
?>

<!--正中央-->
<form id="form" method="post" action="?do=login">
	<p class="t botli">管理員登入區</p>
	<p class="cent">帳號 ： <input name="file" autofocus="" type="text"></p>
	<p class="cent">密碼 ： <input name="text" type="password"></p>
	<p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
</form>
</div>

