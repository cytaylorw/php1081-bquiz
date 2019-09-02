<?php
    include_once "base.php";
?>
<?php
    switch($_GET["do"]){
        case "save":
            ckf();
            ckf("post");
            ckf("trail");
            save($_GET["tb"],$_POST);
            agt();
            break;
        case "edit":
            foreach($_POST as $k => $v){
                if(empty($v["del"])){
                    $v["id"]=$k;
                    save($_GET["tb"],$_POST);
                }else{
                    del($_GET["tb"],$k);
                }
            }
            agt();
            break;
        case "del":
            del($_GET["tb"],$_POST);
            agt();
            break;
        case "order":
            $_POST["cart"]=serialize($_POST["cart"]);
            $_POST["no"]= date("Ymd").sprintf("%04d",mx($_GET["tb"]+1));
            unset($_SESSION["cart"]);
            save($_GET["tb"],$_POST);
            agt();
            break;
        case "ses":
            $sd = date("Y-m-d",strtotime("-2 days"));
            $now = ceil((24-date("H")/2));
            if($_POST["rdate"] != $td){
                $now=6;
            }
            $t="";
            foreach($ses as $k => $v){
                if($k <= $now){
                    $t.="<option value='$v'>$v 剩餘座位 ".(20-sum("ord",$_POST))."</option>";
                }
            }
            echo $t;
            break;
        case "seat":
            $rs = f($_GET["tb"],$_POST);
            $t=[];
            foreach($rs as $k => $v){
                $t=array_merge($t,unserialize($v["seat"]));
            }
            echo json_encode($t);
            break;
        case "login":
            $rs = f($_GET["tb"],$_POST);
            if(count($rs)){
                if($_GET["tb"]=="admin") $_SESSION["admin"]=unserialize($rs["perm"]);
                if($_GET["tb"]=="mem") $_SESSION["mem"]=$rs["id"];
                echo 1;
            }else{
                echo 0;
            }
            break;
        case "delc":
            unset($_SESSION["cart"][$_POST["id"]]);
            break;
    }
?>