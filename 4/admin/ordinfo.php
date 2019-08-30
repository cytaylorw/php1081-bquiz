<?php
    $ord=f1("ord",$_GET['id']);
    
    ?>
<h1 class="tc"><?=$ord["no"];?></h1>
    
    <table class="w100">
        <tr>
            <td class="tt">登入帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?=$ord["acc"];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$ord["name"];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$ord["email"];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$ord["addr"];?>" readonly></td>
        </tr>
        <tr>
            <td class="tt">聯絡電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$ord["tel"];?>" readonly></td>
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
        foreach(unserialize($ord["cart"]) as $k => $v){

    ?>
        <tr class="pp">
            <td><input type="text" name="cart[<?=$k;?>][no]" value="<?=$v['no'];?>" readonly></td>
            <td><input type="text" name="cart[<?=$k;?>][name]" value="<?=$v['name'];?>" readonly></td>
            <td><input type="text" name="cart[<?=$k;?>][num]" value="<?=$v['num'];?>" readonly></td>
            <td><input type="text" name="cart[<?=$k;?>][price]" value="<?=$v['price'];?>" readonly></td>
            <td><input type="text" name="cart[<?=$k;?>][gsum]" value="<?=$v['gsum'];?>" readonly></td>
        </tr>
        <?php
    }
    ?>
    <tr class="tt tc">
        <td colspan="5">總計：<input type="text" name="gsum" value="<?=$ord['gsum'];?>" readonly></td>
    </tr>
    </table>
    <div class="tc">
        <input type="button" value="返回" onclick="gt('?do=ord')"></div>