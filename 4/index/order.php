<?php

if(empty($_SESSION['mem'])) gt("?do=login");

$mem=find1("mem",$_SESSION['mem']);
?>

<h1 class="ct">填寫資料</h1>
    <form action="api.php?do=order&tb=ord&pg=index&pgdo=home" method="POST">
        <table class="ma">
            <tr>
                <td class="pp">登入帳號</td>
                <td class="tt"><input type="text" name="acc" value="<?=$mem['acc'];?>" readonly></td>
            </tr>
            <tr>
                <td class="pp">姓名</td>
                <td class="tt"><input type="text" name="name" value="<?=$mem['name'];?>"></td>
            </tr>
            <tr>
                <td class="pp">電子信箱</td>
                <td class="tt"><input type="text" name="email" value="<?=$mem['email'];?>"></td>
            </tr>
            <tr>
                <td class="pp">聯絡地址</td>
                <td class="tt"><input type="text" name="addr" value="<?=$mem['addr'];?>"></td>
            </tr>
            <tr>
                <td class="pp">聯絡電話</td>
                <td class="tt"><input type="text" name="tel" value="<?=$mem['tel'];?>"></td>
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
                $sum=0;
                foreach($_SESSION['cart'] as $k => $v){
                    $it=find1("th",$k);
                    $t=$it['price']*$v;
                    $sum+=$t;
            ?>
            <tr class="pp">
                <td><input type="text" name="cart[<?=$k;?>][no]"  value="<?=$it['no'];?>" readonly style="width:100px"></td>
                <td><input type="text" name="cart[<?=$k;?>][name]"  value="<?=$it['name'];?>" readonly style="width:100px"></td>
                <td><input type="text" name="cart[<?=$k;?>][qt]"  value="<?=$v;?>" readonly style="width:100px"></td>
                <td><input type="text" name="cart[<?=$k;?>][price]"  value="<?=$it['price'];?>" readonly style="width:100px"></td>
                <td><input type="text" name="cart[<?=$k;?>][isum]"  value="<?=$t;?>" readonly style="width:100px"></td>
            </tr>
            <?php
                }
            ?>
            <tr class="tt ct">
                <td colspan="5">總價：<input type="text" name="gsum" value="<?=$sum;?>" readonly style="width:100px"></td>
            </tr>
        </table>
        <input type="hidden" name="no" value="<?=date("Ymd").sprintf("%08d",maxid("ord")+1);?>">
        <input type="hidden" name="odate" value="<?=date("Y-m-d");?>">
        <div class="ct">
            <input type="submit" value="確定送出" onclick="alert('訂購成功\n感謝您的選購')">
            <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
        </div>
    </form>