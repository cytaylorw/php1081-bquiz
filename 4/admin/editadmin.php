<?php
    $v=f1("admin",$_GET['id']);
    $p=unserialize($v["perm"]);
?>
<h1 class="tc">修改管理者帳號</h1>
<form action="api.php?do=save&tb=admin&pg=admin&pgdo=admin" method="POST">
    
        <table class="ma">
            <tr>
                <td class="tt">帳號</td>
                <td class="pp"><input type="text" name="acc" id="acc" value="<?=$v["acc"];?>"></td>
            </tr>
            <tr>
                <td class="tt">密碼</td>
                <td class="pp"><input type="password" name="pw" id="pw" value="<?=$v["pw"];?>"></td>
            </tr>
            <tr>
                <td class="tt">權限</td>
                <td class="pp"><ul class="uli">
                    <?php
                        $a=array_values($am);
                        foreach($a as $k => $v2){
                            if($k>0)echo "<li><input type='checkbox' name='perm[]' value='$k' ".(in_array($k,$p)?"checked":"").">$v2</li>";
                        }
                    ?>
                </ul></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?=$v["id"];?>">
        <div class="tc"><input type="submit" value="修改" id="login"><input type="reset" value="重置"></div>
</form>
