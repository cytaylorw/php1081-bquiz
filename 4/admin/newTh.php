<h1 class="ct">新增商品</h1>
<form action="api.php?do=save&tb=th&pg=admin&pgdo=th" method="POST" enctype="multipart/form-data">
    <table class="w-80 ma">
        <tr>
            <td class="tt">所屬大類</td>
            <td class="pp"><select name="cat1" id="cat1">
            <?php
                $cats =find("cat",["pid"=>0]);
                foreach($cats as $v){
            ?>
            <option value="<?=$v['id'];?>" <?=(!empty($_GET['cat1'])&&($v['id']==$_GET['cat1']))?"selected":"";?>><?=$v['name'];?></option>
            <?php
                }
            ?>
            </select></td>
        </tr>
        <tr>
            <td class="tt">所屬中類</td>
            <td class="pp"><select name="cat2" id="cat2">
            <?php
                $cat1 = (empty($_GET['cat1']))?$cats[0]['id']:$_GET['cat1'];
                $cats2 = find("cat",["pid"=>$cat1]);
                foreach($cats2 as $v){
            ?>
            <option value="<?=$v['id'];?>" <?=(!empty($_GET['cat2'])&&($v['id']==$_GET['cat2']))?"selected":"";?>><?=$v['name'];?></option>
            <?php
                }
                $cat2 = (empty($_GET['cat2']))?$cats[0]['id']:$_GET['cat2'];
            ?>
            </select></td>
        </tr>
        <tr>
            <td class="tt">商品編號</td>
            <td class="pp"><input type="text" name="no" id="" readonly value="<?=sprintf("%02d%02d%02d",$cat1,$cat2,(maxid("th")+1));?>"></td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp"><input type="text" name="price" id=""></td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp"><input type="text" name="spec" id=""></td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp"><input type="text" name="stock" id=""></td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp"><input type="file" name="file" id=""></td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp"><textarea name="intro" id="" class="w-100" style="height:100px;"></textarea></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>

<script>
    $("#cat1").on("change",function(){
        location.href="?do=newTh&cat1="+$(this).val();
    })
    $("#cat2").on("change",function(){
        location.href="?do=newTh&cat1="+$("#cat1").val()+"&cat2="+$(this).val();
    })
</script>