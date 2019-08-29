<h3 class="ct">新增預告片海報</h3>
<form action="api.php?do=save&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" method="POST" enctype="multipart/form-data">
    <table class="w-100">
        <tr>
            <td>預告片海報：<input type="file" name="file" id=""></td>
            <td>預告片片名：<input type="text" name="name" id=""></td>
        </tr>
    </table>
    <input type="hidden" name="ord" value="<?=mx($do,"ord")+1;?>">
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>
<hr>
<h3 class="ct">預告片動畫</h3>
<form action="api.php?do=save&tb=ani&pg=admin&pgdo=<?=$do;?>" method="POST">
    <table class="w-100">
        <tr>
            <td>預告片動畫：<select name="ord" id="">
                <?php
                    $a=f1("ani")["ord"];
                    foreach($as as $k => $v){
                        if($a == $k){

                            echo "<option value='$k' selected>$v</option>";
                        }else{

                            echo "<option value='$k'>$v</option>";
                        }
                    }
                ?>
            </select></td>
            <td><input type="hidden" name="id" value="1"><input type="submit" value="變更"></td>
        </tr>
    </table>
</form>
<h3 class="ct">預告片清單</h3>
<form action="api.php?do=edit&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" method="POST">
    <table class="w-100">
        <tr>
            <td>預告片海報</td>
            <td>預告片片名</td>
            <td>預告片排序</td>
            <td>操作</td>
        </tr>
        <?php
            $rs=f($do);
            foreach($rs as $k => $v){
        ?>
        <tr>
            <td><img src="<?=$v['file'];?>" style="width:100px"></td>
            <td><input type="text" name="<?=$v['id'];?>[name]" value="<?=$v['name'];?>"></td>
            <td><input type="number" name="<?=$v['id'];?>[ord]" value="<?=$v['ord'];?>"></td>
            <td>
                <input type="hidden" name="<?=$v['id'];?>[sh]" value="0">
                <input type="checkbox" name="<?=$v['id'];?>[sh]" value="1" <?=($v['sh'])?"checked":"";?>>顯示
                <input type="checkbox" name="<?=$v['id'];?>[del]" id="">刪除
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>