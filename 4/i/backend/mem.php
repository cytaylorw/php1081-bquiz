<?php
    
?>

<h1 class="ct">會員管理</h1>
<table class="all">
    <tr class="tt ct">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
        $mems=find("mem");
        foreach($mems as $m){
    ?>
    <tr class="pp">
        <td><?=$m['name'];?></td>
        <td><?=$m['acc'];?></td>
        <td><?=explode(" ",$m['rdate'])[0];?></td>
        <td>
            <button onclick="lof('?do=editMem&id=<?=$m['id'];?>')">修改</button>
            <button class="del" data-id="<?=$m['id'];?>" data-tb="mem">刪除</button>
        </td>
    </tr>
    <?php
        }
    ?>
</table>

<!-- <script>

    $(".del[data-id]").on("click",function(){
        let id = $(this).data("id");
        let tb = $(this).data("tb");
        $.post("api.php?do=del&tb="+tb,{id},function(){
            location.reload();
        })
    })

</script> -->