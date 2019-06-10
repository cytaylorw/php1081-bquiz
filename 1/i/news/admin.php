

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
                $div=4;
                $pages=ceil(rc($on)/$div);
                $now=(!empty($_GET['p']))?$_GET['p']:1;
                $start=($now-1)*$div;
                $rows=limit($on,$start,$div);
                foreach($rows as $r){
                ?>
                <tr class="cent">
                    <td><textarea name="<?=$r['id'];?>[<?=$col1[2][1];?>]"
                            class="w90p" cols="30" rows="3"><?=$r['text'];?></textarea></td>
                    <td><input type="checkbox" name="<?=$r['id'];?>[<?=$col1[1][1];?>]" value="<?=$r['id'];?>"
                            <?=($r['sh'])?"checked":"";?>></td>
                    <td><input type="checkbox" name="<?=$r['id'];?>[<?=$col1[0][1];?>]"></td>
                    <?php
                    if(!empty($update)){
                    ?>
                    <td><input type="button"
                            onclick="op('#cover','#cvr','view.php?do=update&on=<?=$on;?>&id=<?=$r['id'];?>')"
                            value="<?=$update;?>"></td>
                    <?php
                }
                ?>
                </tr>
                <?php
                }
                ?>
                <tr class="cent">
                    <td colspan="3">
                    <?php
                    pages($now,$pages,"?on=$on&p");
                    ?>
                    </td>
                </tr>
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