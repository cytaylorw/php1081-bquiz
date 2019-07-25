<?php
    
?>
<h1 class="ct">商品分類</h1>
<div class="ct">新增大類<input type="text" name="mt" id="mt"><input type="button" value="新增" id="addM"></div>
<div class="ct">新增中類
    <select name="pid" id="pid">
    <?php
        $mt=find("type",["pid"=>0]);
        foreach($mt as $m){
            echo "<option value='".$m["id"]."'>".$m["name"]."</option>";
        }
    ?>
    </select>
    <input type="text" name="st" id="st"><input type="button" value="新增" id="addS">
</div>
<table class="all">
    <?php
        foreach($mt as $m){
    ?>
    <tr>
        <td class="tt"><?=$m["name"];?></td>
        <td class="tt" data-id="<?=$m["id"];?>" data-tb="type"><input class="edit" type="button" value="修改"><input class="del" type="button" value="刪除"></td>
    </tr>
    <?php
            $st=find("type",["pid"=>$m["id"]]);
            foreach($st as $s){
                ?>
                <tr>
                    <td class="pp ct"><?=$s["name"];?></td>
                    <td class="pp" data-id="<?=$s["id"];?>" data-tb="type"><input class="edit" type="button" value="修改"><input class="del" type="button" value="刪除"></td>
                </tr>
                <?php 
            }
        }
    ?>
</table>

<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="lof('?do=addItem')">新增商品</button></div>
<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
        $items = find("item");
        foreach($items as $i){
    ?>
    <tr class="pp">
        <td><?=$i["no"];?></td>
        <td><?=$i["name"];?></td>
        <td><?=$i["qt"];?></td>
        <td><?=($i["sh"])?"販售中":"已下架";?></td>
        <td data-id="<?=$i["id"];?>" data-tb="item">
            <button onclick="lof('?do=editItem&id=<?=$i["id"];?>')">修改</button>
            <button class="del">刪除</button>
            <button class="ons" data-sh="1">上架</button>
            <button class="ons" data-sh="0">下架</button>
        </td>
    </tr>
    <?php
        }
    ?>
</table>

<script>
    $("#addM").on("click",function(){
        let name = $("#mt").val();
        let pid = 0;
        $.post("api.php?do=reg&tb=type",{name,pid},function(){
            location.reload();
        })
    })

    $("#addS").on("click",function(){
        let name = $("#st").val();
        let pid = $("#pid option:selected").val();
        $.post("api.php?do=reg&tb=type",{name,pid},function(){
            location.reload();
        })
    })

    $(".del").on("click",function(){
        let id = $(this).parent().data("id");
        $.post("api.php?do=del&tb="+$(this).parent().data("tb"),{id},function(){
            location.reload();
        })
    })

    $(".edit").on("click",function(){
        let id = $(this).parent().data("id");
        let name = prompt("請修改名稱",$(this).parent().prev().text());
        $.post("api.php?do=edit&tb=type",{id,name},function(){
            location.reload();
        })
    })

    $(".ons").on("click",function(){
        let id = $(this).parent().data("id");
        let sh = $(this).data("sh");
        $.post("api.php?do=edit&tb="+$(this).parent().data("tb"),{id,sh},function(){
            location.reload();
        })
    })
</script>