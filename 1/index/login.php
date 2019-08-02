<?php
	if(!empty($_POST)){
		if(rc("admin",$_POST)){
			
			gt("admin.php");
			exit();
		}else{
			echo "<script>alert('帳號或密碼輸入錯誤')</script>";
		} 
	}
?>
                                        <!--正中央-->
                                            		<form method="post" action="?do=login" >
                        	    	<p class="t botli">管理員登入區</p>
                        			<p class="cent">帳號 ： <input name="name" autofocus="" type="text"></p>
                        	        <p class="cent">密碼 ： <input name="file" type="password"></p>
                        	        <p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
                        	    </form>