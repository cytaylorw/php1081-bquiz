<?php
include_once "base.php";
$tb=$_GET['tb'];

switch($_GET['do']){
    case 'save':
        chkFile();
        save($tb,$_POST);
        if($_GET['pg'])gt($_GET['pg'].".php?do=".$_GET['pgdo']);
        break;
    case 'edit':
        /* 第一題
        if(!empty($_POST['sh'])){
            $_POST[$_POST['sh']]['sh']=1;
            unset($_POST['sh']);
        }
         */
        // print_r($_POST);
        foreach($_POST as $id => $col){
            if(empty($col['del'])){
                $col['id']=$id;
                save($tb,$col);
            }else{
                del($tb,$id);
            }
        }
        if($_GET['pg'])gt($_GET['pg'].".php?do=".$_GET['pgdo']);
        break;
    case 'del':
        del($tb,$_POST);
        if($_GET['pg'])gt($_GET['pg'].".php?do=".$_GET['pgdo']);
        break;
}



?>