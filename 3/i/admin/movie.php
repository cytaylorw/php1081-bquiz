<form action="api.php?do=editMovies" method="POST">
<button onclick="location.href='?do=newMovie'">新增電影</button> <input type="submit" value="確定編輯">
<hr>
<div style="width:100%;height:400px;overflow-y:auto">
    <?php
    $mvs=qa("SELECT * FROM movie ORDER BY rank");
    foreach($mvs as $m){
    ?>
    <table style="width:100%;background:white;color:black;border:1px solid #ccc;">
        <tr>
            <td><img src="./movie/<?=$m["poster"];?>" alt="" width="80"></td>
            <td>分級：<img src="./icon/03C0<?=$m["lvl"]?>.png" alt="" width="20"></td>
            <td><ul style="list-style-type:none;padding:0;">
                <li>片名：<?=$m["name"];?>&nbsp;&nbsp;&nbsp;&nbsp;片長：<?=$m["length"];?>分&nbsp;&nbsp;&nbsp;&nbsp;上映時間：<?=$m["rDate"];?></li>
                <li>排序：<input type="number" name="<?=$m["id"];?>[rank]" value="<?=$m["rank"];?>"><input type="checkbox" name="<?=$m["id"];?>[del]">刪除 
                <input type="button" value="編輯電影" onclick="location.href='?do=editMovie&id=<?=$m['id'];?>'"></li>
                <li><?=$m["intro"];?></li>
            </ul></td>
        </tr>
    </table>
    <?php
    }
    ?>
</div>
</form>