<fieldset>
    <legend>帳號管理</legend>
    <form action="api.php?do=editNews" method="post">
        <table style="width:80%;margin:auto;" class="ct">
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
                $news=find("news");
                $div=3;
                $num=count($news);
                if($num>$div){
                    $pages=ceil($num/$div);
                    $now=(empty($_GET["p"]))?1:$_GET["p"];
                    $list=array_slice($news,($now-1)*$div,$div);
                }else{
                    $list=$news;
                }
                foreach($list as $k => $l){
            ?>
            <tr>
                <td class="clo"><?=$k+1;?>.</td>
                <td><?=$l["title"];?></td>
                <td>
                    <input type="hidden" name="<?=$l["id"];?>[sh]" value="">
                    <input type="checkbox" name="<?=$l["id"];?>[sh]" value="checked" <?=$l["sh"];?>></td>
                <td><input type="checkbox" name="<?=$l["id"];?>[del]"></td>
            </tr>
            <?php
                }
                ?>
            <tr>
                <td colspan="4">
                <?php
                    if($num>$div)pages($now,$pages,"admin.php?do=news&p")
                ?>
                </td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" value="確定修改"></td>
            </tr>
        </table>
    </form>
</fieldset>