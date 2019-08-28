<?php

    $v=find1("th",$_GET['id']);

?>

<table class="ma">
        <tr class="pp">
            <td class="tt"><a href="?do=th&id=<?=$v['id'];?>"><img src="<?=$v['file'];?>" style="height:300px;width:300px"></a></td>
            <td class="pp"><ul class="ul-list">
                <li class="ct"><?=$v['name'];?></li>
                <li><?=find1("cat",["id"=>$v['cat1']])['name'];?> > <?=find1("cat",["id"=>$v['cat2']])['name'];?></li>
                <li>編號：<?=$v['no'];?></li>
                <li>價錢：<?=$v['price'];?><a href="?do=buycart&id=<?=$v['id'];?>&qt=1" style="float:right"></a></li>
                <li><pre><?=$v['intro'];?></pre></li>
                <li>庫存量：<?=$v['stock'];?></li>
            </ul></td>
        </tr>
        <tr class="tt ct">
            <td colspan="2"><form action="?" method="GET">
                <input type="hidden" name="do" value='buycart'>
                <input type="hidden" name="id" value="<?=$v['id'];?>">
                <input type="number" name="qt" id="" value="1">
                <button style="background:transparent;border:none"><img src="./icon/0402.jpg" alt=""></button>
            </form></td>
        </tr>
    </table>