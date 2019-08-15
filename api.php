<?php
include_once "base.php";
if(!empty($_GET['tb']))$tb=$_GET['tb'];

switch($_GET['do']){
    case 'save':
        chkFile();
        /* 第三題
        if($tb=="movie"){
            chkFile($tb,"po");
            chkFile($tb,"mv");
        }

        if(!empty($_POST['Y'])){
            $ex = ["Y","M","D"];
            foreach($ex as $e){
                $_POST["sdate"][]=$_POST[$e];
                unset($_POST[$e]);
            }
            $_POST["sdate"]=implode("-",$_POST["sdate"]);
        }
         */
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
/* 第二題
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
        break;
     */ 
    /* 第三題
    case 'getTimes':
        $start;
        if($_POST['sdate'] == date('Y-m-d') && date('H')>=14){
            $start = ceil((24-date('H'))/2);
        }else{
            $start = 6;
        }
        $str="";
        for($i=$start;$i>=2;$i--){
            $av=20-qa("SELECT SUM(total) as s FROM ord WHERE name='".$_POST['name']."' && sdate='".$_POST['sdate']."' && stime='".$mt[$i]."'")[0]['s'];
            $str.="<option value='".$mt[$i]."'>".$mt[$i]."剩餘座位 $av</option>";
        }
        echo $str;
        break;
    case 'getSeat':
        $ord = find("ord",$_POST);
        $seat=[];
        foreach($ord as $o){
            $seat=array_merge($seat,unserialize($o['seat']));
        }
        echo json_encode($seat);
        break;
    case 'order':
        $_POST['no']=date('Ymd').sprintf("%04d",qa("SELECT MAX(id) as n FROM ord")[0]['n']+1);
        $_POST['seat']=serialize($_POST['seat']);
        save("ord",$_POST);
        echo $_POST['no'];
        break;
     */
}



?>