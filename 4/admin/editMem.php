<?php
    $it=find1("mem",$_GET['id']);
?>
<h1 class="ct">編輯管理員帳號</h1>
<form action="api.php?do=save&tb=mem&pg=admin&pgdo=mem" method="POST">
    <table class="w-80 ma">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><?=$it['acc'];?></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><?=str_repeat("*",mb_strlen($it['pw']));?></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$it['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$it['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt">地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$it['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$it['tel'];?>"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>