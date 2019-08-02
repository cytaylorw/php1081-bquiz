<?php
include_once "base.php";
$do = (empty($_GET['do'])) ? "title" : $_GET['do'];
if(empty($_GET['id'])){

    include_once "./admin/$do/new.php";
}else{
    include_once "./admin/$do/edit.php";
}
?>