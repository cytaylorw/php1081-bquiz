<h1 class="ct">填寫資料</h1>
<?php
    $u = find1('mem',$_SESSION['mem']);
?>
<form action="api.php?do=checkout" method="POST">
    <table class="all">
        <tr>
            <td class="tt">登入帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc" value="<?=$u['acc'];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?=$u['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$u['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?=$u['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt">聯絡電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?=$u['tel'];?>"></td>
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
            foreach($_SESSION['cart'] as $id => $qt){
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
            <td colspan="5">總價：<?=$sum;?></td><input type="hidden" name="total" value="<?=$sum;?>">
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="確定送出" onclick="alert('訂購成功\n感謝您的選購')"><input type="button" onclick="lof('?do=buycart')" value="返回修改訂單">
        </div>
</form>