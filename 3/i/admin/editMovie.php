<style>
    ul,li{
        list-style-type: none;
        margin:5px;
        padding-left: 0;
    }

</style>

<?php
    $mv=find("movie",$_GET["id"])[0];
    $date=explode("-",$mv['rDate']);
?>

<h4 class="title ct">編輯</h4>
<form action="api.php?do=newMovie" method="post" enctype="multipart/form-data">
    <table style="width:100%;vertical-align:top;">
        <tr>
            <td style="vertical-align:top;">影片資料</td>
            <td><ul>
                <li>片　　名：<input type="text" name="name" value="<?=$mv["name"];?>"></li>
                <li>分　　級：
                    <select name="lvl">
                        <option value="1" <?=($mv["lvl"]==1)?"selected":"";?>>普通級</option>
                        <option value="2" <?=($mv["lvl"]==2)?"selected":"";?>>保護級</option>
                        <option value="3" <?=($mv["lvl"]==3)?"selected":"";?>>輔導級</option>
                        <option value="4" <?=($mv["lvl"]==4)?"selected":"";?>>限制級</option>
                    </select>
                </li>
                <li>片　　長：<input type="text" name="length" value="<?=$mv["length"];?>"></li>
                <li>上映日期：
                <select name="year" id="">
                    <option value="<?=date("Y");?>" <?=($date[0]==date("Y"))?"selected":"";?>><?=date("Y");?></option>
                </select>年
                <select name="month" id="">
                <?php
                    for($i=1;$i<13;$i++){
                        echo "<option value='$i'".(($date[1]==sprintf("%02d",$i))?" selected":"").">$i</option>";
                    }
                ?>
                </select>月
                <select name="day" id="">
                <?php
                    for($i=1;$i<32;$i++){
                        echo "<option value='$i'".(($date[2]==sprintf("%02d",$i))?" selected":"").">$i</option>";
                    }
                ?>
                </select>日</li>
                <li>發 行 商：<input type="text" name="publisher" value="<?=$mv["publisher"];?>"></li>
                <li>導　　演：<input type="text" name="director" value="<?=$mv["director"];?>"></li>   
                <li>預告影片：<input type="file" name="trailer" id=""></li>
                <li>電影海報：<input type="file" name="poster" id=""></li>
            </ul></td>
        </tr>
        <tr>
            <td style="vertical-align:top;">劇情介紹</td>
            <td><textarea name="intro" id="" cols="30" rows="5" style="width:100%"><?=$mv["intro"];?></textarea>
                    <input type="hidden" name="id" value="<?=$mv["id"];?>">
            </td>
        </tr>
        <tr>
            <td class="ct" colspan="2"><input type="submit" value="編輯"><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>