<?php

$ord=find1("ord",$_GET['id']);
?>

<h1 class="ct"><?=$ord['no'];?></h1>
    <form action="api.php?do=order&tb=ord&pg=index&pgdo=home" method="POST">
        <table class="ma">
            <tr>
                <td class="pp">登入帳號</td>
                <td class="tt"><input type="text" name="acc" value="<?=$ord['acc'];?>" readonly></td>
            </tr>
            <tr>
                <td class="pp">姓名</td>
                <td class="tt"><input type="text" name="name" value="<?=$ord['name'];?>" readonly></td>
            </tr>
            <tr>
                <td class="pp">電子信箱</td>
                <td class="tt"><input type="text" name="email" value="<?=$ord['email'];?>" readonly></td>
            </tr>
            <tr>
                <td class="pp">聯絡地址</td>
                <td class="tt"><input type="text" name="addr" value="<?=$ord['addr'];?>" readonly></td>
            </tr>
            <tr>
                <td class="pp">聯絡電話</td>
                <td class="tt"><input type="text" name="tel" value="<?=$ord['tel'];?>" readonly></td>
            </tr>
        </table>
        <table class="ma w-100">
            <tr class="tt">
                <td>編號</td>
                <td>商品名稱</td>
                <td>數量</td>
                <td>單價</td>
                <td>小記</td>
            </tr>
            <?php
                $c=unserialize($ord['cart']);
                foreach($c as $k => $v){
            ?>
            <tr class="pp">
                <td><input type="text" name="cart[<?=$k;?>][no]"  value="<?=$v['no'];?>" readonly style="width:100px"></td>
                <td><input type="text" name="cart[<?=$k;?>][name]"  value="<?=$v['name'];?>" readonly style="width:100px"></td>
                <td><input type="text" name="cart[<?=$k;?>][qt]"  value="<?=$v['qt'];?>" readonly style="width:100px"></td>
                <td><input type="text" name="cart[<?=$k;?>][price]"  value="<?=$v['price'];?>" readonly style="width:100px"></td>
                <td><input type="text" name="cart[<?=$k;?>][isum]"  value="<?=$v['isum'];?>" readonly style="width:100px"></td>
            </tr>
            <?php
                }
            ?>
            <tr class="tt ct">
                <td colspan="5">總價：<input type="text" name="gsum" value="<?=$ord['gsum'];?>" readonly style="width:100px"></td>
            </tr>
        </table>
        <input type="hidden" name="no" value="<?=date("Ymd").sprintf("%08d",maxid("ord")+1);?>">
        <input type="hidden" name="odate" value="<?=date("Y-m-d");?>">
        <div class="ct">
            <input type="button" value="返回" onclick="location.href='?do=order'">
        </div>
    </form>