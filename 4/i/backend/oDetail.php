<?php
    $o=find1("ord",$_GET['id']);

?>
<h2 class="ct">訂單編號<?=$o['no'];?>的詳細資料</h2>

<table class="all">
        <tr>
            <td class="tt">登入帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc" value="<?=$o['acc'];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?=$o['name'];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$o['email'];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?=$o['addr'];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">聯絡電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?=$o['tel'];?>" readonly></td>
        </tr>
    </table>
    <table class="all">
        <tr class="tt">
            <td>商品名稱</td>
            <td>編號</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        <?php
            $sum=0;
            foreach(unserialize($o['items']) as $id => $qt){
                $i = find1('item',$id);
        ?>
        <tr class="pp">
            <td><?=$i['name'];?></td>
            <td><?=$i['no'];?></td>
            <td><?=$qt;?></td>
            <td><?=$i['price'];?></td>
            <td><?=$i['price']*$qt;?></td>
        </tr>
        <?php
        $sum+=$i['price']*$qt;
            }
            ?>
        <tr class="tt ct">
            <td colspan="5">總價：<?=$sum;?></td>
        </tr>
    </table>
    <div class="ct">
        <input type="button" onclick="lof('?do=order')" value="返回">
        </div>