<h4 class="cent"><?=$title3;?></h4>
<hr>
<form action="<?=$api;?>" method="post" enctype="multipart/form-data">
        <table class="ma">
                <tr class="yel">
                <?php
                for($i=count($col3)-1;$i>=0;$i--){
                ?>
                        <td width="<?=$w[$i];?>"><?=$col3[$i][0];?></td>
                <?php
                }
                ?>
                </tr>
                <?php
                $rows=find($on,["pid"=>$_GET['id']]);
                foreach($rows as $r){
                ?>
                <tr class="cent">
                        <td><input type="text" name="<?=$r['id'];?>[<?=$col1[4][1];?>]" value="<?=$r[$col1[4][1]];?>"
                                        class="w90p"></td>
                        <td><input type="text" name="<?=$r['id'];?>[<?=$col1[3][1];?>]" value="<?=$r[$col1[3][1]];?>"
                                        class="w90p"></td>
                        <td><input type="checkbox" name="<?=$r['id'];?>[<?=$col1[0][1];?>]"></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                        <td colspan="3" class="cent">
                                <input type="submit" value="修改確定"><input type="reset" value="重置">
                                <input type="button" onclick="sub()" value="更多次選單">
                </tr>
        </table>
</form>

<script>
        function sub() {
                $.post("api.php?on=<?=$on;?>&do=add", {
                        pid: "<?=$_GET['id'];?>"
                }, function () {
                        op('#cover', '#cvr', `view.php?do=edit&on=menu&id=<?=$_GET['id'];?>`);
                })
        }
</script>