<style>
    .pList ul{
        display: block;
        list-style-type: none;
        width: 99%;
        margin:0;
        padding:0;
        background-color: white;
        border: 1px solid black;
        color: black;
    }

    .pList li{
        display: inline-block;
        width: 24%;
        vertical-align: middle;
    }
</style>


<h4 class="title ct">預告片清單</h4>
<form action="api.php?do=editPoster" method="post">
    <table class="ct" style="margin:auto;width:100%">
        <tr>
            <td>預告片海報</td>
            <td>預告片片名</td>
            <td>預告片排序</td>
            <td style="width:30%">操作</td>
        </tr>
        <tr>
            <td class="ct" colspan="4">
                <div class="pList"style="height:140px;overflow:auto">
                    <?php
$post = qa("SELECT * FROM poster ORDER BY rank DESC");
foreach ($post as $p) {
    ?>
                    <ul>
                        <li><img src="./poster/<?=$p["file"];?>" alt="" style="width:60px"></li>
                        <li><input type="text" name="<?=$p["id"];?>[name]" value="<?=$p["name"];?>" ></li>
                        <li><input type="number" name="<?=$p["id"];?>[rank]" value="<?=$p["rank"];?>" style="width:100px"></li>
                        <li>
                            <input type="hidden" name="<?=$p["id"];?>[sh]" value="0">
                            <input type="checkbox" name="<?=$p["id"];?>[sh]" value="1"
                                <?=($p["sh"]) ? "checked" : "";?>>顯示
                            <input type="checkbox" name="<?=$p["id"];?>[del]">刪除
                            <select name="<?=$p["id"];?>[ani]">
                                <option value="1"  <?=($p["ani"]==1) ? "selected" : "";?>>淡入淡出</option>
                                <option value="2" <?=($p["ani"]==2) ? "selected" : "";?>>滑入滑出</option>
                                <option value="3" <?=($p["ani"]==3) ? "selected" : "";?>>縮放</option>
                            </select>
                        </li>
                    </ul>
                    <?php
}
?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="ct" colspan="4"><input type="submit" value="編輯確定">
                <input type="reset" value="重置"></td>
        </tr>
    </table>
</form>

<hr>
<h4 class="title ct">新增預告片海報</h4>
<form action="api.php?do=newPoster" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td class="ct">
                預告片海報：<input type="file" name="file">
            </td>
            <td class="ct">
                預告片片名：<input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td class="ct" colspan="2">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>