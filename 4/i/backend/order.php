<?php
    
?>

<h1 class="ct">訂單管理</h1>

<table class="all">
    <tr class="tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員編號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php
        $orders = find("ord");
        foreach($orders as $o){
        $date=explode(" ",$o['odate'])[0];
    ?>
    <tr class="pp">
        <td><a href="?do=oDetail&id=<?=$o['id'];?>"><?=$o['no'];?></a></td>
        <td><?=$o['total'];?></td>
        <td><?=$o['acc'];?></td>
        <td><?=$o['name'];?></td>
        <td><?=$date;?></td>
        <td data-id="<?=$o['id'];?>" data-tb="ord"><button class="del">刪除</button></td>
    </tr>
    <?php
        }
        ?>
</table>

<script>
    $(".del").on("click",function(){
        let id = $(this).parent().data("id");
        $.post("api.php?do=del&tb="+$(this).parent().data("tb"),{id},function(){
            location.reload();
        })
    })
</script>