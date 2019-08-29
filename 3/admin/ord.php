<h3 class="ct">訂單清單</h3>
<div>快速刪除：
    <input type="radio" name="dtype" class="dtype" value="1" checked>依日期<input type="text" name="odate" id="odate">
    <input type="radio" name="dtype" class="dtype" value="0">依電影<select name="name" id="name">
        <?php
            $rs1=f($do,""," GROUP BY name");
            foreach($rs1 as $k => $v){
                echo "<option value='".$v["name"]."'>".$v["name"]."</option>";
            }
        ?>
    </select>
    <input type="button" value="刪除" id="del">
</div>
<form action="api.php?do=edit&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" method="POST">
    <table class="w-100">
        <tr>
            <td>訂單編號</td>
            <td>電影名稱</td>
            <td>日期</td>
            <td>場次時間</td>
            <td>訂購數量</td>
            <td>訂購位置</td>
            <td>操作</td>
        </tr>
        <?php
            $rs=f($do);
            foreach($rs as $k => $v){
        ?>
        <tr>
            <td><?=$v['no'];?></td>
            <td><?=$v['name'];?></td>
            <td><?=$v['odate'];?></td>
            <td><?=$v['ses'];?></td>
            <td><?=$v['total'];?></td>
            <td><?=implode("<br>",unserialize($v['seat']));?></td>
            <td data-id="<?=$v['id'];?>" data-tb="ord">
                <input type="button" class="del" name="<?=$v['id'];?>[del]" value="刪除">
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</form>

<script>
    $("#del").on("click",function(){
        if(confirm("確定要刪除嗎?")){
            if($(".dtype:selected").val()){
                let odate = $("#odate").val();
                $.post("api.php?do=del&tb=ord",{odate},function(){
                    location.reload();
                })
            }else{
                let name = $("#name option:selected").val();
                $.post("api.php?do=del&tb=ord",{name},function(){
                    location.reload();
                })
            }
        }
    })
</script>