<?php

if(empty($_SESSION['mem'])) gt("?do=login");

if(!empty($_GET['id'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

$mem=find1("mem",$_SESSION['mem']);
?>
   
    <h1 class="ct"><?=$mem['name'];?></h1>
    
    <table class="ma">
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
            $sum=0;
            foreach($_SESSION['cart'] as $k => $v){
                $it=find1("th",$k);
                $t=$it['price']*$v;
                $sum+=$t;
        ?>
        <tr class="pp">
            <td><?=$it['no'];?></td>
            <td><?=$it['name'];?></td>
            <td><?=$v;?></td>
            <td><?=$it['stock'];?></td>
            <td><?=$it['price'];?></td>
            <td><?=$t;?></td>
            <td><img src="./icon/0415.jpg" class="delci" data-id="<?=$k;?>"></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <div class="ct"><img src="./icon/0411.jpg" class="cont"><img src="./icon/0412.jpg" class="pay"></div>



<script>
    $(".delci").on("click",function(){
        let id = $(this).data('id');
        $.post("api.php?do=delci",{id},function(r){
            // console.log(r)
            location.href="?do=buycart";
        })
    })
    $(".cont").on("click",function(){
        location.href="?do=home";
    })
    $(".pay").on("click",function(){
        location.href="?do=order";
    })
    
</script>