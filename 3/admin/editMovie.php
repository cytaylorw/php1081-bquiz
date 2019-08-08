<?php
    if(empty($_GET['id'])){
        gt("?do=movie");
    }else{
        $m=find1("movie",$_GET['id']);
        $d=explode("-",$m["sdate"]);
    }

?>
<div class="w-100 ct">影片資料</div>
<form action="api.php?do=save&tb=movie&pg=admin&pgdo=movie" method="POST" enctype="multipart/form-data">
    <table class="ma">
        <tr>
            <td>片名</td>
            <td><input type="text" name="name" id="" value="<?=$m["name"];?>"></td>
        </tr>
        <tr>
            <td>分級</td>
            <td>
                <select name="cat" id="">
                <?php
                    $opt=["普通級","輔導級","保護級","限制級"];
                    for($i=0;$i<4;$i++){
                        if($m["cat"]==$i){
                            echo "<option value='$i' selected>".$opt[$i]."</option>";
                        }else{
                            echo "<option value='$i'>".$opt[$i]."</option>";
                        }
                    }
                ?>
                
                </select>
            </td>
        </tr>
        <tr>
            <td>片長</td>
            <td><input type="text" name="dur" id="" value="<?=$m["dur"];?>"></td>
        </tr>
        <tr>
            <td>上映日期</td>
            <td>
                <select name="Y" id="">
                    <option value="2019">2019</option>
                </select>
                <select name="M" id="">
                <?php
                    for($i=1;$i<=12;$i++){
                        if($d[1]==$i){
                            echo "<option value='".sprintf("%02d",$i)."' selected>".$i."</option>";
                        }else{

                            echo "<option value='".sprintf("%02d",$i)."'>".$i."</option>";
                        }
                    }
                ?>
                
                </select>
                <select name="D" id="">
                <?php
                    for($i=1;$i<=31;$i++){
                        if($d[2]==$i){
                            echo "<option value='".sprintf("%02d",$i)."' selected>".$i."</option>";
                        }else{

                            echo "<option value='".sprintf("%02d",$i)."'>".$i."</option>";
                        }
                    }
                ?>
                
                </select>
            </td>
        </tr>
        <tr>
            <td>發行商</td>
            <td><input type="text" name="pub" id="" value="<?=$m["pub"];?>"></td>
        </tr>
        <tr>
            <td>導演</td>
            <td><input type="text" name="dir" id="" value="<?=$m["dir"];?>"></td>
        </tr>
        <tr>
            <td>預告影片</td>
            <td><input type="file" name="mv" id=""></td>
        </tr>
        <tr>
            <td>電影海報</td>
            <td><input type="file" name="po" id=""></td>
        </tr>
        <tr>
            <td>電影簡介</td>
            <td><textarea name="intro" id="" cols="30" rows="10" class="w-100"><?=$m["intro"];?></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$m["id"];?>">
    <div class="w-100 ct"><input type="submit" value="修改"></div>
</form>