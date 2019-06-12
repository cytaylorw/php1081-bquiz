<?php
include_once "all.php";

/* 
    第一題增加進站總人數
*/
if(empty($_SESSION['sum'])){
    $sum=find("total")[0];
    $sum['text']++;
    save("total",$sum);
    $_SESSION['sum']=$sum;
}

?>