<?php
    
?>

<h1 class="ct">管理員管理</h1>
<div class="ct"><button onclick="lof('?do=newAdmin')">新增管理員</button></div>
<table class="all">
    <tr class="tt ct">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
        $mems=find("admin");
        foreach($mems as $m){
    ?>
    <tr class="pp">
        <td><?=$m['acc'];?></td>
        <td><?=str_repeat("*",strlen($m["pw"]));?></td>
        <td>
            <?php
                if($m['acc']=="admin"){
                    echo "此為最高權限";
                }else{

            ?>
            <button onclick="lof('?do=editAdmin&id=<?=$m['id'];?>')">修改</button>
            <button class="del" data-id="<?=$m['id'];?>" data-tb="admin">刪除</button>
            <?php
                }
            ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
<div class="ct"><button onclick="lof('index.php')">返回</button></div>
<!-- <script>

    $("button[data-id]").on("click",function(){
        let id = $(this).data("id");
        let table = $(this).data("tb");
        $.post("api.php?do=del&tb="+table,{id},function(){
            location.reload();
        })
    })

</script> -->