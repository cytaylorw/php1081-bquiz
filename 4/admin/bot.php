<?php
    $v=f1("bot");
?>
<h1 class="tc">編輯頁尾版權區</h1>
<form action="api.php?do=save&tb=bot&pg=admin&pgdo=bot" method="POST">
    
        <table class="ma">
            <tr>
                <td class="tt">頁尾宣告內容</td>
                <td class="pp"><input type="text" name="name" id="name" value="<?=$v["name"];?>"></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?=$v["id"];?>">
        <div class="tc"><input type="submit" value="修改" id="login"><input type="button" value="重置" onclick="$('#name').val('')"></div>
</form>