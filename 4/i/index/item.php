<?php
    $it=find1("item",$_GET["id"]);
    echo "<h1 class='ct'>".$it["name"]."</h1>";
?>
<style>
    ul li{
        border-bottom:1px solid white;
    }
</style>
<table class="all">
    <tr class="pp">
        <td><img src="<?=$it["file"];?>" width="400"></td>
        <td>
            <ul style="list-style-type:none;padding:0;margin:0">
                <li>分類：<?=find1("type",$it["pid"])["name"];?> > <?=find1("type",$it["sid"])["name"];?></li>
                <li>編號：<?=$it["no"];?></li>
                <li>價錢：<?=$it["price"];?></li>
                <li>簡介：<?=nl2br($it["intro"]);?></li>
                <li>庫存：<?=$it["qt"];?></li>
            </ul>
        </td>
    </tr>
</table>
<div class="ct tt">購買數量<input type="number" name="qt" id="qt" value="1"><img src="./icon/0402.jpg" id="buy" data-id="<?=$it["id"];?>"></div>
<div class="ct"><button onclick="lof('?')">返回</button></div>

<script>
    $("#buy").on("click",function(){
        lof("?do=buycart&id="+$(this).data("id")+"&qt="+$("#qt").val());
    })

</script>
