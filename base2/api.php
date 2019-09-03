<?php
    include_once "base.php";
?>
<?php
    switch($_GET["do"]){
        case "save":
            ckf();
            ckf("post");
            ckf("trail");
            if(!empty($_POST["perm"]))$_POST["perm"]=serialize($_POST["perm"]);
            save($_GET["tb"],$_POST);
            agt();
            break;
        case "edit":
            foreach($_POST as $k => $v){
                if(empty($v["del"])){
                    $v["id"]=$k;
                    save($_GET["tb"],$v);
                }else{
                    del($_GET["tb"],$k);
                }
            }
            agt();
            break;
        case 'del':
            del($_GET["tb"],$_POST);
            agt();
            break;
        case "order":
            if(!empty($_POST["cart"]))$_POST["cart"]=serialize($_POST["cart"]);
            if(!empty($_POST["seat"]))$_POST["seat"]=serialize($_POST["seat"]);
            $_POST["no"]=date("Ymd").sprintf("%04d",mx("ord")+1);
            save("ord",$_POST);
            unset($_SESSION["cart"]);
            agt();
            break;
        case "ses":
            $now=ceil((24-date("H"))/2);
            if($_POST["rdate"] != $td){
                $now = 6;
            }
            $t="";
            foreach($ses as $k => $v){
                if($k <= $now){
                    $t.="<option value='$v'>$v 剩餘座位 ".(20-sum("ord",$_POST,"num"))."</option>";
                }
            }
            echo $t;
            break;
        case "seat":
            $rs = f("ord",$_POST);
            $t=[];
            foreach($rs as $k => $v){
                $t=array_merge($t,unserialize($v["seat"]));
            }
            echo json_encode($t);
            break;
        case "delc":
            unset($_SESSION["cart"][$_POST["id"]]);
            break;
        case "login":
            $rs = f($_GET["tb"],$_POST);
            if(count($rs)){
                if($_GET["tb"]=="mem") $_SESSION["mem"]=$rs[0]["id"];
                if($_GET["tb"]=="admin") $_SESSION["admin"]=unserialize($rs[0]["prem"]);
                echo 1;
            }else{
                echo 0;
            }
            break;
    }
?>