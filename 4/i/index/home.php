<?php
    if(!empty($_GET["pid"])){
        $col = ["sh"=>1,"pid"=>$_GET["pid"]];
    }else if(!empty($_GET["sid"])){
        $col = ["sh"=>1,"sid"=>$_GET["sid"]];
    }else{
        $col = ["sh"=>1];
    }
    
    $items=find("item",$col);
    foreach($items as $it){
?>

<table class="all">
    <tr class="pp">
        <td><a href="?do=item&id=<?=$it["id"];?>"><img src="<?=$it["file"];?>" width="200"></a></td>
        <td>
            <ul style="list-style-type:none;padding:0;margin:0">
                <li class="tt ct"><?=$it["name"];?></li>
                <li>價錢：<?=$it["price"];?><a href="?do=buycart&id=<?=$it["id"];?>&qt=1"><img src="./icon/0402.jpg" style="float:right"></a></li>
                <li>規格：<?=$it["spec"];?></li>
                <li>簡介：<?=nl2br($it["intro"]);?></li>
            </ul>
        </td>
    </tr>
</table>

<?php
    }
?>

