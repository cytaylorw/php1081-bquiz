<?php
$db = "db192";

include "all.php";

if(empty($_SESSION["total"])){
    $today=find("total",["date"=>date("Y-m-d")]);
    if($today){
        $total=++$today[0]["total"];
        save("total",$today[0]);
    }else{
        $total=1;
        save("total",["date"=>date("Y-m-d"),"total"=>$total]);
        
    }
    $_SESSION["total"] = $total;
}


?>