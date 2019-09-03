<?php
session_start();

$ani = ["縮放","淡入","滑出"];
$rate = ["普通級","保護級","輔導級","限制級"];
$ses = [
    6 => "14:00 ~ 16:00",
    5 => "16:00 ~ 18:00",
    4 => "18:00 ~ 20:00",
    3 => "20:00 ~ 22:00",
    2 => "22:00 ~ 24:00",
];

$td=date("Y-m-d");
$c1=rand(10,99);
$c2=rand(10,99);
$menu=[
    "admin"=>"管理權限設置",
    "th"=>"商品分類與管理",
    "order"=>"訂單管理",
    "mem"=>"會員管理",
    "bot"=>"頁尾版權管理",
    "news"=>"最新消息管理",
];


function pdo(){
    return new PDO("mysql:host=localhost;charset=utf8;dbname=db16","root","");
}

function qa($s){
    return pdo()->query($s)->fetchAll(PDO::FETCH_ASSOC);
}

function f($tb,$co="",$mo=""){
    $s="SELECT * FROM $tb";
    if(!empty($co)){
        if(is_array($co)){
            $t=[];
            foreach($co as $k => $v){
                $t[]=sprintf("%s='%s'",$k,$v);
            }
            $s.=" WHERE ".implode(" && ",$t);
        }else{
            $s.=" WHERE id='$co'";
        }
    }
    return qa($s.$mo);
}

function f1($tb,$co="",$mo=""){
    return f($tb,$co,$mo)[0];
}

function rc($tb,$co="",$mo=""){
    return count(f($tb,$co,$mo));
}

function mx($tb,$mx="id"){
    return qa("SELECT MAX($co) as m FROM $tb")[0]["m"];
}

function sum($tb,$co,$sum="num"){
    $t=[];
    foreach($co as $k => $v){
        $t[]=sprintf("%s='%s'",$k,$v);
    }
    return qa("SELECT SUM($co) as m FROM $tb WHERE ".implode(" && ",$t))[0]["m"];
}

function save($tb,$co){
    $s;
    if(empty($co["id"])){
        $s="INSERT INTO $tb(".implode(",",array_keys($co)).") VALUES ('".implode("','",array_values($co))."')";
    }else{
        $id=$co["id"];
        $t=[];
    foreach($co as $k => $v){
        $t[]=sprintf("%s='%s'",$k,$v);
    }
        $s="UPDATE $tb SET ".implode(",",$t)." WHERE id='$id'";
    }
    return pdo()->exec($s);
}

function del($tb,$co){
    $s="DELETE FROM $tb WHERE ";
    if(is_array($co)){
        $t=[];
        foreach($co as $k => $v){
            $t[]=sprintf("%s='%s'",$k,$v);
        }
        $s.=implode(" && ",$t);
    }else{
        $s.="id='$co'";
    }
    return pdo()->exec($s);
}

function gt($h){
    header("Location:$h");
}

function agt(){
    if(!empty($_GET["pg"])) gt($_GET["pg"].".php".(empty($_GET["pgdo"]?"":("?do=".$_GET["pgdo"]))));
}

function ckf($f="file",$d="img"){
    if(!empty($_FILES[$f]["tmp_name"])){
        move_uploaded_file($_FILES[$f]["tmp_name"],"./$d/".$_FILES[$f]["name"]);
        $_POST[$f]="./$d/".$_FILES[$f]["name"];
    }
}

function pgln($n,$p,$h){
    if($n>0){
        echo "<a href='$h&p=".($n-1)."'> < </a>";
    }
    for($i=1;$i<=$p;$i){
        if($i==$n){
            echo "<span style='font-size:32px;'> $i </span>";
        }else{
            echo "<a href='$h&p=$i'> $i </a>";
        }
    }
    if($n<$p){
        echo "<a href='$h&p=".($n+1)."'> > </a>";
    }
}
?>