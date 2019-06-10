

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$title1;?></p>
    <form method="post" action="<?=$api;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <?php
                    for($i=count($col1)-1;$i>=0;$i--){
                    ?>
                    <td width="<?=$w[$i];?>"><?=$col1[$i][0];?></td>
                    <?php
                    }
                    if(!empty($update)) echo "<td></td>";
                    ?>
                </tr>
                <?php
                $rows=find($on,["pid"=>0]);
                foreach($rows as $r){
                ?>
                <tr class="cent">
                    <td><input type="text" name="<?=$r['id'];?>[<?=$col1[4][1];?>]" value="<?=$r[$col1[4][1]];?>"
                            class="w90p"></td>
                    <td><input type="text" name="<?=$r['id'];?>[<?=$col1[3][1];?>]" value="<?=$r[$col1[3][1]];?>"
                            class="w90p"></td>
                    <td><?=rc($on,["pid"=>$r['id']]);?></td>
                    <td><input type="checkbox" name="<?=$r['id'];?>[<?=$col1[1][1];?>]" value="<?=$r['id'];?>"
                            <?=($r['sh'])?"checked":"";?>></td>
                    <td><input type="checkbox" name="<?=$r['id'];?>[<?=$col1[0][1];?>]"></td>
                    <?php
                    if(!empty($update)){
                    ?>
                    <td><input type="button"
                            onclick="op('#cover','#cvr','view.php?do=edit&on=<?=$on;?>&id=<?=$r['id'];?>')"
                            value="<?=$update;?>"></td>
                    <?php
                }
                ?>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <?php 
                            if(!empty($new)){
                        ?>
                        <input type="button" onclick="op('#cover','#cvr','view.php?do=add&on=<?=$on;?>')"
                            value="<?=$new;?>">
                        <?php 
                            }
                        ?>
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>