<?php
    if(!empty($_POST)){
        if($_POST['acc']=="admin" && $_POST['pw']=="1234"){
            $_SESSION['login']=$_POST['acc'];
            gt("admin.php");
        }else{
            if(rc("user",$_POST)){
                $_SESSION['login']=$_POST['acc'];
                gt("index.php");
            }else{
                if(rc("user",["acc"=>$_POST['acc']])){
                    echo "<script>alert('密碼錯誤')</script>";
                }else{
                    echo "<script>alert('查無帳號')</script>";

                }
            }
        }
    }

?>

<fieldset>
    <legend>會員登入</legend>
    <form action="?do=login" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id=""></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" value="登入"><input type="reset" value="清除"></td>
                <td><a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></td>
            </tr>
        </table>
    </form>
</fieldset>