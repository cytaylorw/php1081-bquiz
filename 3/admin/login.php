<?php
    if(!empty($_POST)){
        if($_POST['acc']=="admin" && $_POST['pw']=="1234"){
            gt("admin.php");
        }
    }

?>
<form action="?do=login" method="POST">
    <table class="ma">
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id=""></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="登入"></td>
            <td></td>
        </tr>
    </table>
</form>