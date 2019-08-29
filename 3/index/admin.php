<?php
    if(!empty($_SESSION['admin'])){
        gt("admin.php");
    }
    if(!empty($_POST)){
        if($_POST['acc']=="admin" && $_POST['pw']=="1234"){
            $_SESSION['admin']="admin";
            gt("admin.php");
        }
    }
?>

<form action="?do=admin" method="POST">
    <table class="ma">
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id=""></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id=""></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="登入"></div>
</form>