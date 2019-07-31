<?php
    if(!empty($_GET['id'])){
        $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
    }
    if(empty($_SESSION["mem"])){ 
        gt("?do=login"); 
        exit();
    }
    if(empty($_SESSION['cart'])){
        echo "<h3>購物車中無商品</h3>";
        exit();
    }
?>

<h1><?=find1('mem',$_SESSION['mem'])['name'];?>的購物車</h1>
<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
        foreach($_SESSION['cart'] as $id => $qt){
            $i = find1('item',$id);
    ?>
    <tr class="pp">
        <td><?=$i['no'];?></td>
        <td><?=$i['name'];?></td>
        <td><?=$qt;?></td>
        <td><?=$i['qt'];?></td>
        <td><?=$i['price'];?></td>
        <td><?=$i['price']*$qt;?></td>
        <td><img src="./icon/0415.jpg" alt=""></td>
    </tr>
    <?php
        }
        ?>
</table>
<div class="ct">
    <a href="?"><img src="./icon/0411.jpg" alt=""></a>
    <a href="?do=checkout"><img src="./icon/0412.jpg" alt=""></a>
    </div>