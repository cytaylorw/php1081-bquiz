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
        if(!empty($_FILES["file"]["tmp_name"])){
            $_POST["file"] = "./img/".$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],$_POST["file"]);
        }
        save($_GET["tb"],$_POST);
        if(!empty($_POST["pr"])){
            gt("backend.php?do=".$_GET["tb"]);
        }
        if(!empty($_GET["gt"])){
            gt("backend.php?do=".$_GET["gt"]);
        }
        break;
    case "edit":
        if(!empty($_POST["pr"])){
            $_POST["pr"]=serialize($_POST["pr"]);
        }
        if(!empty($_FILES["file"]["tmp_name"])){
            $_POST["file"] = "./img/".$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],$_POST["file"]);
        }
        save($_GET["tb"],$_POST);
        if(!empty($_GET["gt"])){
            gt("backend.php?do=".$_GET["gt"]);
        }else{

            gt("backend.php?do=".$_GET["tb"]);
        }
        break;
    case "del":
        del($_GET["tb"],$_POST["id"]);
        break;
    case "find":
        $all = find($_GET["tb"],$_POST);
        echo json_encode($all);
}

?>