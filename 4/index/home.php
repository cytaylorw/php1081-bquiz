<?php
    $col=["sh"=>1];
    if(!empty($_GET['c1']))$col["cat1"]=$_GET['c1'];
    if(!empty($_GET['c2']))$col["cat2"]=$_GET['c2'];

    $all=f("th",$col);

    foreach($all as $k => $v){

?>
<table class="w100">
    <tr>
        <td class="tt" style="height:100px;width:100px">
            <img src="<?=$v['file'];?>" style="height:100px;width:100px"  onclick="gt('?do=intro&id=<?=$v['id'];?>')"></td>
        <td class="pp"><ul class="uli">
            <li><?=$v['name'];?></li>
            <li><?=$v['price'];?> <img src="./icon/0402.jpg"  onclick="gt('?do=buycart&id=<?=$v['id'];?>')"></li>
            <li><?=$v['spec'];?></li>
            <li><pre><?=$v['intro'];?></pre></li>
        </ul></td>
    </tr>
</table>

<?php
    }
    ?>