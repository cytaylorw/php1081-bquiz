<?php
    $it=find1("bot");
?>
<h1 class="ct">編輯頁尾版權區</h1>
<form action="api.php?do=save&tb=bot&pg=admin&pgdo=bot" method="POST">
    <table class="w-80 ma">
        <tr>
            <td class="tt">頁尾版權內容</td>
            <td class="pp"><input type="text" name="acc" value="<?=$it['acc'];?>"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$it['id'];?>">
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>