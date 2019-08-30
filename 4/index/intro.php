<?php

    $all=f("th",$_GET["id"]);

    foreach($all as $k => $v){

?>
<table class="w100">
    <tr>
        <td class="tt" style="height:200px;width:200px">
            <img src="<?=$v['file'];?>" style="height:200px;width:200px"></td>
        <td class="pp"><ul class="uli">
            <li><?=$v['name'];?></li>
            <li><?=$v['cat1']." > ".$v['cat2'];?></li>
            <li><?=$v['no'];?></li>
            <li><?=$v['price'];?></li>
            <li><?=$v['stock'];?> </li>
            <li><?=$v['spec'];?></li>
            <li><pre><?=$v['intro'];?></pre></li>
        </ul></td>
    </tr>
    <tr class="pp tc">
        <td colspan="2">購買數量：<input type="number" name="num" id="num" value="1"><img src="./icon/0402.jpg"  onclick="gt('?do=buycart&id=<?=$v['id'];?>&num='+$('#num').val())"></td>
    </tr>
</table>
<div class="tc"><button onclick="gt('index.php')">返回</button></div>
<?php
    }
    ?>