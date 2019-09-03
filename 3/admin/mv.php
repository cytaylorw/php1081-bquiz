
<div><button onclick="gt('?do=newmv')">新增電影</button></div>


<form action="api.php?do=edit&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" method="POST">
<?php
            $rs=f($do);
            foreach($rs as $k => $v){
                ?>
                <hr>
    <table class="w-100">
        <tr>
            <td><img src="<?=$v['post'];?>" style="width:100px"></td>
            <td><img src="./icon/03C0<?=$v['rate']+1;?>.png" style="width:30px"></td>
            <!-- <td><input type="text" name="<?=$v['id'];?>[name]" value="<?=$v['name'];?>"></td> -->
            <td><ul class="ul-i">
                <li>片名：<?=$v['name'];?> 片長：<?=$v['dur'];?> 上映時間：<?=$v['sdate'];?></li>
                <li>劇情簡介：<?=$v['intro'];?></li>
                <li>
                    <input type="number" name="<?=$v['id'];?>[ord]" value="<?=$v['ord'];?>">
                    <input type="hidden" name="<?=$v['id'];?>[sh]" value="0">
                    <input type="checkbox" name="<?=$v['id'];?>[sh]" value="1" <?=($v['sh'])?"checked":"";?>>顯示
                    <input type="checkbox" name="<?=$v['id'];?>[del]" id="">刪除
                    <input type="button" value="編輯電影" onclick="gt('?do=editmv&id=<?=$v['id'];?>')">
                </li>
            </ul></td>
        </tr>
    </table>
        <?php
            }
        ?>
    
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>