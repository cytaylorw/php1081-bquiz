<div class="w-100">
    快速刪除：
    <input type="radio" name="del" class="delall" value="1" checked>依日期<input type="text" name="sdate" id="sdate">
    <input type="radio" name="del" class="delall" value="0">依電影<select name="name" id="name">
    <?php
    $names=find("ord",null," GROUP BY name");
    foreach($names as $m){
        echo "<option value='".$m['name']."'>".$m['name']."</option>";
    }

    ?>
    </select>
    <input type="button" value="刪除" id="delall">
</div>

<table class="ma w-100"  style="border:1px solid black">
    <tr>
        <td>訂單編號</td>
        <td>電影名稱</td>
        <td>日期</td>
        <td>場次時間</td>
        <td>訂購數量</td>
        <td>訂購位子</td>
        <td>操作</td>
    </tr>
    <?php
        $mvs=find("ord");
        foreach($mvs as $m){

?>
    <tr>
        <td><?=$m['no'];?></td>
        <td><?=$m['name'];?></td>
        <td><?=$m['sdate'];?></td>
        <td><?=$m['stime'];?></td>
        <td><?=$m['total'];?></td>
        <td><?=implode("<br>",unserialize($m['seat']));?></td>
        <td><input type="button" value="刪除" data-id="<?=$m['id'];?>" class="del"></td>
    </tr>
<?php
}
?>
</table>

<script>
    $('#delall').on('click',function(){
        if(confirm("確定要刪除多筆訂單嗎?")){
            if($('.delall:checked').val()*1 ){
                let sdate = $('#sdate').val();
                $.post("api.php?do=del&tb=ord",{sdate},function(r){
                    
                });
            }else{
                let name = $('#name').val();
                $.post("api.php?do=del&tb=ord",{name});
            }
            location.reload();
        }
    })

    $('.del').on('click',function(){
            let id = $(this).data('id');
            $.post("api.php?do=del&tb=ord",{id});
            location.reload();
    })

</script>
