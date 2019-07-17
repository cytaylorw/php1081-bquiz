<?php
    include "base.php";
    $do=(empty($_GET["do"]))?"":$_GET["do"];
    switch($do){
        case "newPoster":
            if(!empty($_FILES['file']["tmp_name"])){
                $data["file"]=$_FILES['file']["name"];
                move_uploaded_file($_FILES['file']["tmp_name"],"./poster/". $data["file"]);
            }

            $data["rank"]=qa("SELECT MAX(rank) as r FROM poster")[0]["r"]+1;
            $data["name"]=$_POST["name"];
            save("poster",$data);
            gt("admin.php","do=poster");
            break;
        case "editPoster":
            foreach($_POST as $id => $col){
                if(empty($col["del"])){
                    $col["id"]=$id;
                    save("poster",$col);
                }else{
                    del("poster",$id);
                }
            }
            gt("admin.php","do=poster");
            break;
        case "editMovies":
            foreach($_POST as $id => $col){
                if(empty($col["del"])){
                    $col["id"]=$id;
                    save("movie",$col);
                }else{
                    del("movie",$id);
                }
            }
            gt("admin.php","do=movie");
            break;
        case "newMovie":
            if(!empty($_FILES['poster']["tmp_name"])){
                $data["poster"]=$_FILES['poster']["name"];
                move_uploaded_file($_FILES['poster']["tmp_name"],"./movie/". $data["poster"]);
            }
            if(!empty($_FILES['trailer']["tmp_name"])){
                $data["trailer"]=$_FILES['trailer']["name"];
                move_uploaded_file($_FILES['trailer']["tmp_name"],"./movie/". $data["trailer"]);
            }
            $data["rDate"]=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
            foreach($_POST as $k => $v){
                if(!in_array($k,["year","month","day"])) $data[$k]=$v;
            }
            if(empty($_POST["id"]))$data["rank"]=qa("SELECT MAX(rank) as r FROM movie")[0]["r"]+1;
            save("movie",$data);
            gt("admin.php","do=movie");
            break;

        case "qtSession":
            $ses=[
                6=> "14:00~16:00",
                5=> "16:00~18:00",
                4=> "18:00~20:00",
                3=> "20:00~22:00",
                2=> "22:00~24:00",
            ];
            $now=ceil((24-date("G"))/2);
            $start=($now<=6 && $_POST["odate"]==date("Y-m-d"))?$now:6;
            $r="";
            for($i=$start;$i>=2;$i--){
                $booked=20-qa("SELECT SUM(qt) as q FROM ord WHERE movie='".$_POST["movie"]."' && odate='".$_POST["odate"]."' && ses='".$ses[$i]."'")[0]["q"];
                $r.="<option value='".$ses[$i]."'>".$ses[$i]." 剩餘座位 $booked</option>";
            }
            echo $r;
            break;
        case "order":
            $col=$_POST;
            $col["qt"]=count($_POST["seat"]);
            $col["seat"]=serialize($col["seat"]);
            $ordM=qa("SELECT MAX(id) as m FROM ord")[0]["m"]+1;
            $col["no"]=date("Ymd").sprintf("%04d",$ordM);
            save("ord",$col);
            echo $col["no"];
            break;
        case "getOrd":
            $order=find("ord",$_POST);
            $seat=[];
            foreach($order as $o){
                $seat=array_merge($seat,unserialize($o["seat"]));
            }
            echo json_encode($seat);
            break;
        case "del":
            del($_POST["table"],$_POST["id"]);
            break;
        case "tDel":
            del("ord",[(($_POST["type"])?"movie":"odate")=>$_POST["val"]]);
            break;
    }



    ?>