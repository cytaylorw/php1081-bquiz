<h1 class="tc">編輯會員資料</h1>
<?php
    $v=f1("mem",$_GET['id']);

?>
<form action="api.php?do=save&tb=mem&pg=admin&pgdo=mem" method="POST">
    <table class="ma">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc" value="<?=$v["acc"];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw" value="<?=$v["pw"];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?=$v["name"];?>"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?=$v["tel"];?>"></td>
        </tr>
        <tr>
            <td class="tt">住址</td>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?=$v["addr"];?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$v["email"];?>"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$v["id"];?>">
    <div class="tc"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>