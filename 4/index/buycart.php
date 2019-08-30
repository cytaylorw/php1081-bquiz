<?php
    if(empty($_SESSION['mem'])) gt("do=login");
    if(!empty($_GET["id"])){
        $_SESSION["cart"][$_GET["id"]]=(empty($_GET["num"]))?1:$_GET["num"];
    }

?>
<h1 class="tc"><?=$_SESSION['mem'];?></h1>
<table class="w100">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小記</td>
        <td>刪除</td>
    </tr>
    <?php
    $gsum=0;
    foreach($_SESSION["cart"] as $k => $v){
        $it=f1("th",$k);
        $gsum+=$it['price']*$v;
?>
    <tr class="pp">
        <td><input type="text" name="" value="<?=$it['no'];?>" readonly></td>
        <td><input type="text" name="" value="<?=$it['name'];?>" readonly></td>
        <td><input type="text" name="" value="<?=$v;?>" readonly></td>
        <td><input type="text" name="" value="<?=$it['stock'];?>" readonly></td>
        <td><input type="text" name="" value="<?=$it['price'];?>" readonly></td>
        <td><input type="text" name="" value="<?=$it['price']*$v;?>" readonly></td>
        <td data-id="<?=$k;?>"><img src="./icon/0415.jpg" class="delc"></td>
    </tr>
    <?php
}
?>
</table>
<div class="tc"><img src="./icon/0411.jpg" onclick="gt('index.php')"><img src="./icon/0412.jpg" onclick="gt('?do=ord')"></div>
