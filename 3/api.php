<?php
include_once "base.php";

switch($_GET['do']){
    case "save":
        ckf();
        ckf("post");
        ckf("trail");
        if(!empty($_POST['y'])){
            $_POST['sdate']=$_POST['y']."-".$_POST['m']."-".$_POST['d'];
            unset($_POST['y']);
            unset($_POST['m']);
            unset($_POST['d']);
        }
        save($_GET['tb'],$_POST);
        agt();
        break;
    case "edit":
        foreach($_POST as $k => $v){
            if(empty($v["del"])){
                $v["id"]=$k;
                save($_GET['tb'],$v);
            }else{
                del($_GET['tb'],$k);
                // echo 'del';
            }
        }
        agt();
        break;
    case "del":
        del($_GET['tb'],$_POST);
        agt();
        break;
    case "login":
        $rs=f($_GET['tb'],$_POST);
        if(count($rc)){
            if($_GET['tb']=="admin") $_SESSION["admin"]=unserialize($rs[0]["pm"]);
            if($_GET['tb']=="mem") $_SESSION["mem"]=$rs[0]["acc"];
            echo 1;
        }else{
            echo 0;
        }
        break;
    case "order":
        $_POST["seat"]=serialize($_POST["seat"]);
        $_POST["no"]=date("Ymd").sprintf("%04d",mx("ord")+1);
        save($_GET['tb'],$_POST);
        // unset($_SESSION['cart']);
        // agt();
        echo $_POST["no"];
        break;
    case "getses":
        $td=date("Y-m-d");
        $se = ceil((24-date("H"))/2);
        if(($_POST["odate"] != $td) || $se>6){
            $se=6;
        }
        $st="";
        foreach($ses as $k => $v){
            if($k <= $se){
                $st.="<option value='$v'>$v 剩餘座位(".(20-qa("SELECT SUM(total) as s FROM ord WHERE ses='$v' && name='".$_POST["name"]."' && odate='".$_POST["odate"]."'")[0]["s"]).")</option>";
            }
        }
        echo $st;
        break;
    case "getseat":
        $rs=f("ord",$_POST);
        $st=[];
        foreach($rs as $k => $v){
            $st=array_merge($st,unserialize($v["seat"]));
        }
        echo json_encode($st);
        break;
}



?>