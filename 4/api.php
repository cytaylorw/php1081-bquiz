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
        
        case "del":
            del($_GET["tb"],$_POST);
            agt();
            break;

        case "rc":
            echo rc($_GET["tb"],$_POST);
            agt();
            break;

        case "login":
            $rs = f($_GET["tb"],$_POST);
            if(count($rs)){
                if($_GET["tb"]=="admin") $_SESSION['admin']=unserialize($rs[0]['perm']);
                if($_GET["tb"]=="mem") $_SESSION['mem']=$rs[0]['acc'];
                echo 1;
            }else{
                echo 0;
            }
            agt();
            break;

        case "delc":
            unset($_SESSION['cart'][$_POST['id']]);
            break;

        case "order":
            $_POST["cart"]=serialize($_POST["cart"]);
            save($_GET["tb"],$_POST);
            unset($_SESSION['cart']);
            agt();
            break;

        case "ses":
            $sd = date("Y-m-d",strtotime("-2 days"));
            $s= ceil((24-date("H"))/2);
            if($_POST["rdate"] != $td){
                $s = 6;
            }
            $tp="";
            for($i=6;$i>=2;$i--){
                if($i<=$s){
                    
                    $tp.="<option value='".$ses[$i]."'>".$ses[$i]."剩餘座位 ".(20-qa("SELECT SUM(total) as s FROM ord WHERE ses='".$ses[$i]."' && name='".$_POST["name"]."' && rdate='".$_POST["rdate"]."'")[0]["s"])."</option>";
                }
            }
            echo $tp;
            break;
        
        case "seat":
            $rs=f("ord",$_POST);
            $tp=[];
            foreach($rs as $k => $v){
                $tp=array_merge($tp,unserialize($v['seat']));
            }
            echo json_encode($tp);
            break;

    }

?>