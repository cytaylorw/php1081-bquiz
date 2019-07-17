<?php
    if(!empty($_POST["bot"])){
        $bot=find1("bot");
        $bot["bot"]=$_POST["bot"];
        save("bot",$bot);
    }
?>
<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">頁尾宣告內容</td>
            <td class="pp"><input type="text" name="bot" id="bot" value="<?=find1("bot")["bot"];?>"></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="編輯"><input type="button" value="重置" id="reset"></div>
</form>

<script>
    $("#reset").on("click",function(){
        $("#bot").val("");
    })
</script>