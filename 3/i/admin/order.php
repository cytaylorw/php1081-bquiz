<style>
    .pList ul{
        display: block;
        list-style-type: none;
        width: 99%;
        margin:0;
        padding:0;
        background-color: white;
        border: 1px solid black;
        color: black;
    }

    .pList li{
        display: inline-block;
        width: 13%;
        vertical-align: middle;
    }
</style>

<h4 class="title ct">訂單清單</h4>
快速刪除：
<input type="radio" name="type" value="0" checked>依日期<input type="date" name="date" id="date">
<input type="radio" name="type" value="1">依電影
<select name="" id="movie">
<?php
    $mvs=qa("SELECT movie FROM ord GROUP BY movie");
    foreach($mvs as $m){
        echo "<option value='".$m["movie"]."'>".$m["movie"]."</option>";
    }
?>
</select>
<input type="button" value="刪除" id="tDel">

<table class="ct" style="margin:auto;width:100%">
        <tr>
            <td>訂單編號</td>
            <td>電影名稱</td>
            <td>日期</td>
            <td>場次時間</td>
            <td>訂單數量</td>
            <td>訂購位子</td>
            <td style="width:16%">操作</td>
        </tr>
        <tr>
            <td class="ct" colspan="7">
            <div class="pList"style="height:400px;overflow:auto">
            <?php
            $ords=qa("SELECT * FROM ord ORDER BY no DESC");
            foreach($ords as $o){
        ?>
            <ul>
                <li><?=$o["no"]?></li>
                <li><?=$o["movie"]?></li>
                <li><?=$o["odate"]?></li>
                <li><?=$o["ses"]?></li>
                <li><?=$o["qt"]?></li>
                <li><?=implode("<br>",unserialize($o["seat"]))?></li>
                <li><input type="button" value="刪除" class="del" data-id="<?=$o["id"]?>"></li>
            </ul>
            <?php
            }
        ?>
            </div>
            </td>
        </tr>
</table>


<script>
    $("#tDel").on("click",function(){
        let type=$("input[name='type']:checked").val();
        let val=((type*1)?$("#movie option:selected"):$("#date")).val();
        if(val && confirm("你確定要刪除"+val+"的全部資料嗎?")){
            $.post("api.php?do=tDel",{type,val},function(){
                location.reload();
            })
        }
    })

    $(".del").on("click",function(){
        let id=$(this).data("id");
        let table = "ord";
        $.post("api.php?do=del",{table,id},function(){
                location.reload();
            })
    })
</script>