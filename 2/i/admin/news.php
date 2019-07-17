<fieldset>
    <legend>最新文章管理</legend>
    <form action="api.php?do=editNews" method="post">
        <table style="margin:auto;width:80%;text-align:center">
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
            $now=(empty($_GET["p"]))?"1":$_GET["p"];
            $div=3;
            $news=find("news");
            $num=count($news);
            $pages=ceil($num/$div);
            $start=($now-1)*$div;
            $slice=array_slice($news,$start,$div);
            
            foreach($slice as $k => $u){
            ?>
            <tr>
                <td><?=$k+$start+1?>.</td>
                <td><?=$u["title"]?></td>
                <td><input type="hidden" name="<?=$u["id"]?>[sh]" value="">
                    <input type="checkbox" name="<?=$u["id"]?>[sh]" value="checked" <?=$u["sh"]?>></td>
                <td><input type="checkbox" name="<?=$u["id"]?>[del]" ></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="4"><?=pages($now,$pages,"?do=news&p");?></td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" value="確定修改"></td>
            </tr>
        </table>
    </form>

    </form>
</fieldset>

