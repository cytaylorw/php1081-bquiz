<h1 class="tc">填寫資料</h1>
<?php
    $mem=f1("mem",["acc"=>$_SESSION['mem']]);

?>
<form action="api.php?do=order&tb=ord&pg=index&pgdo=home" method="POST">
    
    <table class="w100">
        <tr>
            <td class="tt">登入帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?=$mem["acc"];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$mem["name"];?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$mem["email"];?>"></td>
        </tr>
        <tr>
            <td class="tt">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$mem["addr"];?>"></td>
        </tr>
        <tr>
            <td class="tt">聯絡電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$mem["tel"];?>"></td>
        </tr>
    </table>
    
    
    <table class="w100">
        <tr class="tt">
            <td>編號</td>
            <td>商品名稱</td>
            <td>數量</td>
            <td>單價</td>
            <td>小記</td>
        </tr>
        <?php
        $gsum=0;
        foreach($_SESSION["cart"] as $k => $v){
            $it=f1("th",$k);
            $gsum+=$it['price']*$v;
    ?>
        <tr class="pp">
            <td><input type="text" name="cart[<?=$k;?>][no]" value="<?=$it['no'];?>" readonly></td>
            <td><input type="text" name="cart[<?=$k;?>][name]" value="<?=$it['name'];?>" readonly></td>
            <td><input type="text" name="cart[<?=$k;?>][num]" value="<?=$v;?>" readonly></td>
            <td><input type="text" name="cart[<?=$k;?>][price]" value="<?=$it['price'];?>" readonly></td>
            <td><input type="text" name="cart[<?=$k;?>][gsum]" value="<?=$it['price']*$v;?>" readonly></td>
        </tr>
        <?php
    }
    ?>
    <tr class="tt tc">
        <td colspan="5">總計：<input type="text" name="gsum" value="<?=$gsum;?>" readonly></td>
    </tr>
    </table>
    <div class="tc">
        <input type="hidden" name="no" value="<?=date("Ymd").sprintf("%06d",mx("ord")+1);?>">
        <input type="hidden" name="rdate" value="<?=$td;?>">
        <input type="submit" value="確定送出" onclick="alert('訂購成功\n感謝您的選購')">
        <input type="button" value="返回修改訂單" onclick="gt('?do=buycart')"></div>
</form>
