<h3 class="ct">新增電影</h3>
<form action="api.php?do=save&tb=mv&pg=admin&pgdo=mv" method="POST" enctype="multipart/form-data">
    <table class="w-100 ct">
        <tr>
            <td>片名：<input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td>分級：
                <select name="rate" id="">
                    <?php
                        foreach($rs as $k => $v){
                            echo "<option value='$k'>$v</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>片長：<input type="text" name="dur" id=""></td>
        </tr>
        <tr>
            <td>上映日期：
                <select name="y" id="">
                    <option value="2019">2019</option>
                </select>年
                <select name="m" id="">
                    <?php
                        for($i=1;$i<=12;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                </select>月
                <select name="d" id="">
                <?php
                        for($i=1;$i<=31;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                </select>日
            </td>
        </tr>
        <tr>
            <td>發行商：<input type="text" name="pub" id=""></td>
        </tr>
        <tr>
            <td>導演：<input type="text" name="dir" id=""></td>
        </tr>
        <tr>
            <td>預告片影片：<input type="file" name="trail" id=""></td>
        </tr>
        <tr>
            <td>電影海報：<input type="file" name="post" id=""></td>
        </tr>
        <tr>
            <td>劇情簡介：<textarea name="intro" id="" cols="60" rows="5"></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="ord" value="<?=mx("mv","ord")+1;?>">
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>