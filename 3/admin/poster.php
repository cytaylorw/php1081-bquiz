<div class="w-100 tac">新增預告片</div>
<form action="api.php?do=save&tb=poster&pg=admin&pgdo=poster" method="POST" enctype="multipart/form-data">
    <table class="w-100">
        <tr>
            <td>預告片海報: <input type="file" name="file" id=""></td>
            <td>預告片片名: <input type="text" name="name" id=""></td>
            <td><input type="submit" value="新增"></td>
        </tr>
    </table>
    <?php
        $max=qa("SELECT max(ord) as m FROM poster")[0]["m"];
    ?>
    <input type="hidden" name="ord" value="<?=$max+1;?>">
</form>
<hr>
<div class="w-100 tac">預告片清單</div>
<?php
    $mode=find1("ani");
?>
<form action="api.php?do=save&tb=ani&pg=admin&pgdo=poster" method="POST" enctype="multipart/form-data">
    <ul class="ul-list tac">
        <li class="tabs">動畫效果</li>
        <li class="tabs"><select name="mode" id="">
            <?php
                $opt=["縮放","淡入","滑出"];
                for($i=0;$i<3;$i++){
                    if($mode["mode"]==$i){
                        echo "<option value='$i' selected>".$opt[$i]."</option>";
                    }else{

                        echo "<option value='$i'>".$opt[$i]."</option>";
                    }
                }
            ?>
            
        </select></li>
        <input type="hidden" name="id" value="<?=$mode['id'];?>">
        <li class="tabs"><input type="submit" value="更換效果"></li>
    </ul>
</form>
<form action="api.php?do=edit&tb=poster&pg=admin&pgdo=poster" method="POST" enctype="multipart/form-data">
    <table class="ma w-100">
        <tr>
            <td>預告片海報</td>
            <td>預告片片名</td>
            <td>預告片順序</td>
            <td>操作</td>
        </tr>
        <?php
            $ps=find("poster");
            foreach($ps as $p){
        ?>
        <tr>
            <td><img src="<?=$p['file'];?>" style="width:80px;"></td>
            <td><?=$p['name'];?></td>
            <td><input type="number" name="<?=$p['id'];?>[ord]" id="" value="<?=$p['ord'];?>"></td>
            <td>
                    <input type="hidden" name="<?=$p['id'];?>[sh]" value="0">
                   <input type="checkbox" name="<?=$p['id'];?>[sh]" id="" <?=($p['sh'])?"checked":"";?> value="1">顯示
                   <input type="checkbox" name="<?=$p['id'];?>[del]" id="">刪除

            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    <div class="w-100 tac"><input type="submit" value="修改"></div>
</form>