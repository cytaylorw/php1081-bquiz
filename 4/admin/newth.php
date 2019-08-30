<h1 class="tc">新增商品</h1>
<form action="api.php?do=save&tb=th&pg=admin&pgdo=th" method="POST" enctype="multipart/form-data">
    
        <table class="ma w100">
            <tr>
                <td class="tt">所屬大類</td>
                <td class="pp"><select name="cat1" id="cat1">
                <?php
                $rs=f("cat",["ord"=>0]);
                $c1;
                if(empty($_GET["c1"]))$c1=$rs[0];
                foreach($rs as $k => $v){
                    if(!empty($_GET["c1"]) && $_GET["c1"]==$v['id']){
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
                <td class="pp"><select name="cat2" id="cat2">
                <?php
                $rs2=f("cat",["ord"=>$c1['id']]);
                $c2;
                if(empty($_GET["c2"]))$c2=$rs2[0];
                foreach($rs2 as $k => $v){
                    if(!empty($_GET["c2"]) && $_GET["c2"]==$v['id']){
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
                <td class="pp"><input type="text" name="no" id="no" value="<?=sprintf("%02d%02d%02d",$c1['id'],$c2['id'],mx("th")+1);?>" readonly></td>
            </tr>
            <tr>
                <td class="tt">商品名稱</td>
                <td class="pp"><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td class="tt">商品價格</td>
                <td class="pp"><input type="text" name="price" id="price"></td>
            </tr>
            <tr>
                <td class="tt">規格</td>
                <td class="pp"><input type="text" name="spec" id="spec"></td>
            </tr>
            <tr>
                <td class="tt">庫存量</td>
                <td class="pp"><input type="text" name="stock" id="stock"></td>
            </tr>
            <tr>
                <td class="tt">商品圖片</td>
                <td class="pp"><input type="file" name="file" id="file"></td>
            </tr>
            <tr>
                <td class="tt">商品介紹</td>
                <td class="pp"><textarea name="intro" id="intro" cols="30" rows="6"></textarea></td>
            </tr>
            
        </table>
        <div class="tc"><input type="submit" value="新增" id="login"><input type="reset" value="重置"></div>
</form>

<script>
    $("#cat1").on("change",function(){
        gt("?do=newth&c1="+$("#cat1").val());
    })
    $("#cat2").on("change",function(){
        gt("?do=newth&c1="+$("#cat1").val()+"&c2="+$("#cat2").val());
    })

</script>