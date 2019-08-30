<?php
    $th=f1("th",$_GET['id']);
?>
<h1 class="tc">修改商品</h1>
<form action="api.php?do=save&tb=th&pg=admin&pgdo=th" method="POST" enctype="multipart/form-data">
    
        <table class="ma w100">
            <tr>
                <td class="tt">所屬大類</td>
                <td class="pp"><select name="cat1" id="cat1" disable>
                <?php
                $rs=f("cat",["ord"=>0]);
                foreach($rs as $k => $v){
                    if($th["cat1"]==$v['id']){
                    $c1=$v;
                        echo "<option value='".$v['id']."' selected>".$v['name']."</option>";
                    }else{
                        echo "<option value='".$v['id']."'>".$v['name']."</option>";
                    }
                }
                ?>
                </select></td>
            </tr>
            <tr>
                <td class="tt">所屬中類</td>
                <td class="pp"><select name="cat2" id="cat2" disable>
                <?php
                $rs2=f("cat",["ord"=>$c1['id']]);
                foreach($rs2 as $k => $v){
                    if($th["cat2"]==$v['id']){
                        $c2=$v;
                        echo "<option value='".$v['id']."' selected>".$v['name']."</option>";
                    }else{
                        echo "<option value='".$v['id']."'>".$v['name']."</option>";
                    }
                }
                ?>
                </select></td>
            </tr>
            <tr>
                <td class="tt">商品編號</td>
                <td class="pp"><input type="text" name="no" id="no" value="<?=$th["no"];?>" readonly></td>
            </tr>
            <tr>
                <td class="tt">商品名稱</td>
                <td class="pp"><input type="text" name="name" id="name" value="<?=$th["name"];?>"></td>
            </tr>
            <tr>
                <td class="tt">商品價格</td>
                <td class="pp"><input type="text" name="price" id="price" value="<?=$th["price"];?>"></td>
            </tr>
            <tr>
                <td class="tt">規格</td>
                <td class="pp"><input type="text" name="spec" id="spec" value="<?=$th["spec"];?>"></td>
            </tr>
            <tr>
                <td class="tt">庫存量</td>
                <td class="pp"><input type="text" name="stock" id="stock" value="<?=$th["stock"];?>"></td>
            </tr>
            <tr>
                <td class="tt">商品圖片</td>
                <td class="pp"><input type="file" name="file" id="file" value="<?=$th["file"];?>"></td>
            </tr>
            <tr>
                <td class="tt">商品介紹</td>
                <td class="pp"><textarea name="intro" id="intro" cols="30" rows="6"><?=$th["intro"];?></textarea></td>
            </tr>
            
        </table>
        <input type="hidden" name="id" value="<?=$th["id"];?>">
        <div class="tc"><input type="submit" value="修改" id="login"><input type="reset" value="重置"></div>
</form>
