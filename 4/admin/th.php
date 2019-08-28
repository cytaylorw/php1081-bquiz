<h1 class="ct">商品分類</h1>
<div class="ct">
    <form action="api.php?do=save&tb=cat&pg=admin&pgdo=th" method="POST">
    新增大類
        <input type="text" name="name" id="">
        <input type="hidden" name="pid" value="0">
        <input type="submit" value="新增">
    </form>
</div>
<div class="ct">
    <form action="api.php?do=save&tb=cat&pg=admin&pgdo=th" method="POST">
            新增中類
        <select name="pid" id="">
            <?php
                $cat =find("cat",["pid"=>0]);
                foreach($cat as $v){
            ?>
            <option value="<?=$v['id'];?>"><?=$v['name'];?></option>
            <?php
                }
            ?>
        </select>
        <input type="text" name="name" id="">
        <input type="submit" value="新增">
    </form>
</div>
<table class="w-80 ma">
    <?php
        foreach($cat as $v){
    ?>
    <tr class="tt">
        <td><?=$v['name'];?></td>
        <td data-id="<?=$v['id'];?>" data-tb="cat">
            <button class="edit">修改</button><button class="del">刪除</button>
        </td>
    </tr>
    <?php
        $sub = find("cat",["pid"=>$v['id']]);
        foreach($sub as $s){
        
    ?>
    <tr class="pp">
        <td><?=$s['name'];?></td>
        <td data-id="<?=$s['id'];?>" data-tb="cat">
            <button class="edit">修改</button><button class="del">刪除</button>
        </td>
    </tr>
    <?php

        }}
    ?>
</table>
<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="lof('?do=newTh')">新增商品</button></div>
<table class="ma w-80">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>管理</td>
    </tr>
    <?php
        $rows=find($do);
        foreach($rows as $k => $v){
    ?>
    <tr class="pp">
        <td><?=$v['no'];?></td>
        <td><?=$v['name'];?></td>
        <td><?=$v['stock'];?></td>
        <td><?=($v['ons'])?"販售中":"已下架";?></td>
        <td data-id="<?=$v['id'];?>" data-tb="<?=$do;?>">
            <button onclick="lof('?do=editTh&id=<?=$v['id'];?>')">修改</button>
            <button class="del">刪除</button>
            <button class="ons">上架</button>
            <button class="offs">下架</button>
        </td>
    </tr>
    <?php
        }
    ?>
</table>