<?php
    $mv=f1("mv",$_GET['id']);
    // print_r($v);
?>

<h3 class="ct">編輯電影</h3>
<form action="api.php?do=save&tb=mv&pg=admin&pgdo=mv" method="POST" enctype="multipart/form-data">
    <table class="w-100 ct">
        <tr>
            <td>片名：<input type="text" name="name" value="<?=$mv['name'];?>"></td>
        </tr>
        <tr>
            <td>分級：
                <select name="rate" id="">
                    <?php
                        foreach($rs as $k => $v){
                            if($mv['rate'] == $k){

                                echo "<option value='$k' selected>$v</option>";
                            }else{

                                echo "<option value='$k'>$v</option>";
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>片長：<input type="text" name="dur" value="<?=$mv['dur'];?>"></td>
        </tr>
        <tr>
            <td>上映日期：
                <select name="y" id="">
                    <option value="2019">2019</option>
                </select>年
                <select name="m" id="">
                    <?php
                        $d=explode("-",$mv['sdate']);
                        for($i=1;$i<=12;$i++){
                            echo "<option value='$i'".(($d[1]==$i)?"selected":"").">$i</option>";
                        }
                    ?>
                </select>月
                <select name="d" id="">
                <?php
                        for($i=1;$i<=31;$i++){
                            echo "<option value='$i'".(($d[2]==$i)?"selected":"").">$i</option>";
                        }
                    ?>
                </select>日
            </td>
        </tr>
        <tr>
            <td>發行商：<input type="text" name="pub" value="<?=$mv['pub'];?>"></td>
        </tr>
        <tr>
            <td>導演：<input type="text" name="dir" value="<?=$mv['dir'];?>"></td>
        </tr>
        <tr>
            <td>預告片影片：<input type="file" name="trail"></td>
        </tr>
        <tr>
            <td>電影海報：<input type="file" name="post"></td>
        </tr>
        <tr>
            <td>劇情簡介：<textarea name="intro" id="" cols="60" rows="5"><?=$mv['intro'];?></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>