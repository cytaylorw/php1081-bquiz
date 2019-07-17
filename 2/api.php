<?php
include_once "base.php";

$do=(empty($_GET["do"]))?"":$_GET["do"];

switch($do){
    case "reg":
        $user=find("user",["acc"=>$_POST["acc"]]);
        if($user){
            echo 0;
        }else{
            save("user",$_POST);
            echo 1;
        }
        break;

    case "forget":
        $user=find("user",$_POST);
        if($user){
            echo "您的密碼為:".$user[0]["pw"];
        }else{
            echo "查無資料";
        }

    case "login":
        $user=find("user",["acc"=>$_POST["acc"]]);
        if($user){
            $user=find("user",$_POST);
            if($user){
                $_SESSION["login"]=$user[0]["acc"];
                echo 1;
            }else{
                echo 2;
            }
        }else{
            echo 3;
        }
        break;

    case "delUser":
        foreach($_POST["del"] as $id){
            del("user",$id);
        }
        gt("admin.php","do=user");
        break;

    case "editNews":
        foreach($_POST as $id => $col){
            if(empty($col["del"])){
                $col["id"]=$id;
                save("news",$col);
            }else{
                del("news",$id);
            }
        }
        gt("admin.php","do=news");
        break;
    case "addQue":
        foreach($_POST["opt"] as $o){
            $col["subj"]=$_POST["subj"];
            $col["opt"]=$o;
            save("que",$col);
        }
        gt("admin.php","do=que");
        break;

    case "po":
        echo json_encode(find("news",$_POST));
        break;

    case "good":
        if($_POST["type"]==1){
            $news=find("news",$_POST["id"])[0];
            $news["good"]++;
            save("news",$news);
            save("nlog",["nid"=>$_POST["id"],"acc"=>$_POST["acc"]]);
        }else{
            $news=find("news",$_POST["id"])[0];
            $news["good"]--;
            save("news",$news);
            del("nlog",find("nlog",["nid"=>$_POST["id"],"acc"=>$_POST["acc"]])[0]['id']);
        }
        break;

    case "queVote":
        $opt = find("que",$_POST["vote"])[0];
        $opt["vote"]++;
        save("que",$opt);
        gt("index.php","do=que");
        break;
}


?>