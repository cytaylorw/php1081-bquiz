
<!--正中央-->
<form id="form" method="post" action="api.php?do=login&on=admin">
	<p class="t botli">管理員登入區</p>
	<p class="cent">帳號 ： <input name="file" autofocus="" type="text"></p>
	<p class="cent">密碼 ： <input name="text" type="password"></p>
	<p class="cent"><input value="送出" type="submit" onclick="login()"><input type="reset" value="清除"></p>
</form>
</div>
<script>
	function login(){
		event.preventDefault();
		$.post("api.php?do=login&on=admin",{file: form.file.value, text: form.text.value},function(data){
			console.log(data);
			(data*1)?lo("admin.php"):alert("帳號或密碼錯誤");form.reset();
		})
	}
</script>
