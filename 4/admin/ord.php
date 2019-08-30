<h1 class="tc">訂單管理</h1>
<div class="tc"><button onclick="gt('?do=newth')">新增商品</button></div>
<table class="w100">
    <tr class="tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
<?php
    $rs2=f("ord");
    foreach($rs2 as $k => $v){
?>
    <tr class="pp">
        <td onclick="gt('?do=ordinfo&id=<?=$v['id'];?>')"><?=$v["no"];?></td>
        <td><?=$v["gsum"];?></td>
        <td><?=$v["acc"];?></td>
        <td><?=$v["name"];?></td>
        <td><?=$v["rdate"];?></td>
        <td data-tb="ord" data-id="<?=$v["id"];?>">
            <button class="del">刪除</button>
        </td>
    </tr>
        <?php        
    }

?>
</table>