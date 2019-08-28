
<h1 class="ct">訂單管理</h1>
<!-- <div class="ct"><button onclick="lof('?do=newTh')">新增商品</button></div> -->
<table class="ma w-80">
    <tr class="tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>管理</td>
    </tr>
    <?php
        $rows=find("ord");
        foreach($rows as $k => $v){
    ?>
    <tr class="pp">
        <td onclick="lof('?do=orderInfo&id=<?=$v['id'];?>')"><?=$v['no'];?></td>
        <td><?=$v['gsum'];?></td>
        <td><?=$v['acc'];?></td>
        <td><?=($v['name']);?></td>
        <td><?=$v['odate'];?></td>
        <td data-id="<?=$v['id'];?>" data-tb="ord">
            <button class="del">刪除</button>
        </td>
    </tr>
    <?php
        }
    ?>
</table>