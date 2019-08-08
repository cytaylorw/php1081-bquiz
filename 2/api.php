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
    case 'rc':
        echo rc($tb,$_POST);
        break;
    case 'forget':
        $user = find($tb,$_POST);
        if($user){
            echo "您的密碼為：".$user[0]['pw'];
        }else{
            echo "查無此帳號";
        }
        break;
    case 'newque':
        print_r($_POST);
        foreach($_POST['opt'] as $o){
            $data['opt']=$o;
            $data['title']=$_POST['title'];
            save($tb,$data);
        }
        if($_GET['pg'])gt($_GET['pg'].".php?do=".$_GET['pgdo']);
        break;
    case 'quevote':
        $que=find1($tb,$_POST['vote']);
        $que['vote']++;
        save($tb,$que);
        if($_GET['pg'])gt($_GET['pg'].".php?do=".$_GET['pgdo']);
        break;
    case 'good':
        if($_GET['type']==1){
            save("good",$_POST);
        }else{
            del("good",find1("good",$_POST))['id'];
        }
}



?>