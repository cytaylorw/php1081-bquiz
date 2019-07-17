<?php
include_once "all.php";

$db="db192";

if(empty($_SESSION["view"])){
    $total =  find("view",["date"=>date("Y-m-d")]);
    if($total){
        $view=++$total[0]["view"];
        save("view",$total[0]);
    }else{
        $view=1;
        save("view",["date"=>date("Y-m-d"),"view"=>$view]);
    }
    
    $_SESSION["view"]=$view;
}
