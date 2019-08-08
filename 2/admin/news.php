<fieldset>
    <legend>最新文章管理</legend>
    <form action="api.php?do=edit&tb=news&pg=admin&pgdo=news" method="POST">
        <table class="ma">
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
                $news = find("news");
                $div=3;
                $now=(empty($_GET['p']))?1:$_GET['p'];
                $num=count($news);
                $pages=ceil($num/$div);
                $slice = array_slice($news,$div*($now-1),$div);
                foreach($slice as $k => $n){
            ?>
            <tr>
                <td><?=$n['id'];?></td>
                <td><?=$n['title'];?></td>
                <td>
                    <input type="hidden" name="<?=$n['id'];?>[sh]" value="0">
                    <input type="checkbox" name="<?=$n['id'];?>[sh]" id="" <?=($n['sh'])?"checked":"";?> value="1">
                </td>
                <td><input type="checkbox" name="<?=$n['id'];?>[del]" id=""></td>
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
</fieldset>