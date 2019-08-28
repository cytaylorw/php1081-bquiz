<?php

    $rows=(empty($_GET['cat1']))?find("th"):((empty($_GET['cat2']))?find("th",["cat1"=>$_GET['cat1']]):find("th",["cat1"=>$_GET['cat1'],"cat2"=>$_GET['cat2']]));

    foreach($rows as $k => $v){
?>
    <table>
        <tr>
            <td class="tt"><a href="?do=th&id=<?=$v['id'];?>"><img src="<?=$v['file'];?>" style="height:100px;width:100px"></a></td>
            <td class="pp"><ul class="ul-list">
                <li class="ct"><?=$v['name'];?></li>
                <li>價錢：<?=$v['price'];?><a href="?do=buycart&id=<?=$v['id'];?>&qt=1" style="float:right"><img src="./icon/0402.jpg" alt=""></a></li>
                <li>規格：<?=$v['spec'];?></li>
                <li>簡介：<?=$v['intro'];?></li>
            </ul></td>
        </tr>
    </table>
<?php
    }


?>