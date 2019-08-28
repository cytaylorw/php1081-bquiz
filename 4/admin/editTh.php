<h1 class="ct">修改商品</h1>
<form action="api.php?do=save&tb=th&pg=admin&pgdo=th" method="POST" enctype="multipart/form-data">
    <table class="w-80 ma">
        <tr>
            <td class="tt">所屬大類</td>
            <td class="pp"><select name="cat1" id="cat1" disabled>
            <?php
                $it=find1("th",$_GET['id']);
                $cats =find("cat",["pid"=>0]);
                foreach($cats as $v){
            ?>
            <option value="<?=$v['id'];?>" <?=(($v['id']==$it['cat1']))?"selected":"";?>><?=$v['name'];?></option>
            <?php
                }
            ?>
            </select></td>
        </tr>
        <tr>
            <td class="tt">所屬中類</td>
            <td class="pp"><select name="cat2" id="cat2" disabled>
            <?php
                $cat1 = (empty($_GET['cat1']))?$cats[0]['id']:$_GET['cat1'];
                $cats2 = find("cat",["pid"=>$it['cat1']]);
                foreach($cats2 as $v){
            ?>
            <option value="<?=$v['id'];?>" <?=(($v['id']==$it['cat2']))?"selected":"";?>><?=$v['name'];?></option>
            <?php
                }
                $cat2 = (empty($_GET['cat2']))?$cats[0]['id']:$_GET['cat2'];
            ?>
            </select></td>
        </tr>
        <tr>
            <td class="tt">商品編號</td>
            <td class="pp"><input type="text" name="no" id="" readonly value="<?=$it['no'];?>"></td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" id="" value="<?=$it['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp"><input type="text" name="price" id="" value="<?=$it['price'];?>"></td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp"><input type="text" name="spec" id="" value="<?=$it['spec'];?>"></td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp"><input type="text" name="stock" id="" value="<?=$it['stock'];?>"></td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp"><input type="file" name="file" id=""></td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp"><textarea name="intro" id="" class="w-100" style="height:100px;"><?=$it['intro'];?></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>

<script>
    $("#cat1").on("change",function(){
        location.href="?do=newTh&cat1="+$(this).val();
    })
    $("#cat2").on("change",function(){
        location.href="?do=newTh&cat1="+$("#cat1").val()+"&cat2="+$(this).val();
    })
</script>