<div class="ct"><button onclick="lof('?do=newMovie')">新增電影</button></div>
<form action="api.php?do=edit&tb=movie&pg=admin&pgdo=movie" method="POST">
    <?php
        $mvs = find("movie");
        foreach($mvs as $m){
    ?>
    <table class="w-100 ma">
        <tr>
            <td><img src="<?=$m["po"];?>" style="width:80px;"></td>
            <td>分級：<img src="./icon/03C0<?=$m["cat"]+1;?>.png"  style="width:20px;"></td>
            <td>
                <ul class="ul-list">
                    <li>片名：<?=$m["name"];?> 片長：<?=$m["dur"];?> 上映時間：<?=$m["sdate"];?></li>
                    <li>
                        順序：<input type="number" name="<?=$m["id"];?>[ord]" id="" value="<?=$m["ord"];?>">
                        <input type="button" value="編輯" onclick="lof('?do=editMovie&id=<?=$m["id"];?>')">
                        <input type="checkbox" name="<?=$m["id"];?>[del]" id="">刪除
                    </li>
                    <li><?=$m["intro"];?></li>
                </ul>
            </td>
        </tr>
    </table>
    <?php
        }
    ?>
    <div class="ct"><input type="submit" value="修改"></div>
</form>