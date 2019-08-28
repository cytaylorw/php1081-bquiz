<?php
    $it=find1("admin",$_GET['id']);
    $per=unserialize($it['per']);
?>
<h1 class="ct">編輯管理員帳號</h1>
<form action="api.php?do=save&tb=admin&pg=admin&pgdo=admin" method="POST">
    <table class="w-80 ma">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?=$it['acc'];?>"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" value="<?=$it['pw'];?>"></td>
        </tr>
        <tr>
            <td class="tt">權限</td>
            <td class="pp">
                <ul class="ul-list">
                    <!-- <input type="hidden" name="per[]" value="0"> -->
                    <li><input type="checkbox" name="per[]" value="1" <?=(in_array(1,$per))?"checked":"";?>>商品分類與管理</li>
                    <li><input type="checkbox" name="per[]" value="2" <?=(in_array(2,$per))?"checked":"";?>>訂單管理</li>
                    <li><input type="checkbox" name="per[]" value="3" <?=(in_array(3,$per))?"checked":"";?>>會員管理</li>
                    <li><input type="checkbox" name="per[]" value="4" <?=(in_array(4,$per))?"checked":"";?>>頁尾版權區管理</li>
                    <li><input type="checkbox" name="per[]" value="5" <?=(in_array(5,$per))?"checked":"";?>>最新消息區管理</li>
                </ul>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>