<p class="t cent botli">編輯次選單</p>
<form method="post" action="api.php?do=edit&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" enctype="multipart/form-data">
    <table width="100%">
        <tbody>
            <tr class="yel">
                <td width="45%">次選單名稱</td>
                <td width="23%">次選單連結網址</td>
                <td width="7%">刪除</td>
            </tr>
            <?php
                $items=find($do,["pid"=>$_GET['id']]);
                foreach($items as $k => $i){
            ?>
            <tr class="">
                <td width="45%"><input type="text" name="<?=$i['id'];?>[name]" id="" value="<?=$i['name'];?>"
                        style="width:300px"></td>
                <td width="23%"><input type="text" name="<?=$i['id'];?>[file]" id="" value="<?=$i['file'];?>"
                        style="width:300px"></td>
                <td width="7%"><input type="checkbox" name="<?=$i['id'];?>[del]" id=""></td>
                <input type="hidden" name="<?=$i['id'];?>[pid]" value="<?=$_GET['id'];?>">
            </tr>
            <?php
                }
            ?>
            <tr>
                <td><input type="submit" value="修改確定"><input type="reset" value="重置">
                <td><input type="button" value="更多次選單" id="morem"></td>
                </td>
            </tr>
        </tbody>
    </table>

</form>
<script>
    $("#morem").on("click",function(){
        $.post("api.php?do=save&tb=<?=$do;?>",{pid:<?=$_GET['id'];?>},function(x){
            op('#cover','#cvr','view.php?do=<?=$do;?>&id=<?=$_GET['id'];?>');
        })
    })
</script>