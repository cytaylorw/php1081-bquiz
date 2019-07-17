<?php
include_once "base.php";

$do=(empty($_GET["do"]))?"":$_GET["do"];


switch($do){
    case "chkAcc":
        $user = find1($_GET["tb"],$_POST);
        $r = count($user);
        if($r && $_POST["pw"]){ 
            $_SESSION[$_GET["tb"]]=$user["id"];
        }
        echo $r;
        break;
    case "reg":
        if(!empty($_POST["pr"])){
            $_POST["pr"]=serialize($_POST["pr"]);
        }
        save($_GET["tb"],$_POST);
        if(!empty($_POST["pr"])){
            gt("backend.php?do=".$_GET["tb"]);
        }
        break;
    case "edit":
        if(!empty($_POST["pr"])){
            $_POST["pr"]=serialize($_POST["pr"]);
        }
        save($_GET["tb"],$_POST);
        gt("backend.php?do=".$_GET["tb"]);
        break;
    case "del":
        del($_GET["tb"],$_POST["id"]);
        break;
}

?>