<h1 class="tc">商品分類</h1>
<div class="ct">
    <form action="api.php?do=save&tb=cat&pg=admin&pgdo=th" method="POST">
        新增大類<input type="text" name="name" id="">
        <input type="hidden" name="ord" value="0">
        <input type="submit" value="新增">
    </form>
</div>
<div class="ct">
    <form action="api.php?do=save&tb=cat&pg=admin&pgdo=th" method="POST">
        <select name="ord" id="">
            <?php
                $rs=f("cat",["ord"=>0]);
                foreach($rs as $k => $v){
                    echo "<option value='".$v['id']."'>".$v['name']."</option>";
                }
            ?>
            
        </select>
        <input type="text" name="name" id="">
        <input type="submit" value="新增">
    </form>
</div>
<table class="w100">
<?php
    foreach($rs as $k => $v){
?>
    <tr class="tt">
        <td><?=$v["name"];?></td>
        <td data-tb="cat" data-id="<?=$v["id"];?>"><button class="edit">修改</button><button class="del">刪除</button></td>
    </tr>
    <?php
    $ss=f("cat",["ord"=>$v['id']]);
    foreach($ss as $k2 => $v2){
        ?>
        <tr class="pp">
            <td><?=$v2["name"];?></td>
            <td data-tb="cat" data-id="<?=$v2["id"];?>"><button class="edit">修改</button><button class="del">刪除</button></td>
        </tr>
        <?php        
    }
    }
?>
</table>

<h1 class="tc">商品管理</h1>
<div class="tc"><button onclick="gt('?do=newth')">新增商品</button></div>
<table class="w100">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
<?php
    $rs2=f("th");
    foreach($rs2 as $k => $v){
?>
    <tr class="pp">
        <td><?=$v["no"];?></td>
        <td><?=$v["name"];?></td>
        <td><?=$v["stock"];?></td>
        <td><?=($v["sh"])?"販售中":"已下架";?></td>
        <td data-tb="th" data-id="<?=$v["id"];?>">
            <button onclick="gt('?do=editth&id=<?=$v['id'];?>')">修改</button>
            <button class="del">刪除</button>
            <button class="on">上架</button>
            <button class="off">下架</button>
        </td>
    </tr>
        <?php        
    }

?>
</table>