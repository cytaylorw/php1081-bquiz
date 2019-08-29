<?php
session_start();

$rs=["普通級","輔導級","保護級","限制級"];
$as=["縮放","淡入","滑出"];
$ses=[
    6 => "14:00 ~ 16:00",
    5 => "16:00 ~ 18:00",
    4 => "18:00 ~ 20:00",
    3 => "20:00 ~ 22:00",
    2 => "22:00 ~ 24:00",
];

function pdo(){
    return new PDO("mysql:host=localhost;charset=utf8;dbname=db163","root","");
}

function qa($sql){
    return pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function f($tb,$co="",$mo=""){
    $sql="SELECT * FROM $tb";
    if(!empty($co)){
        if(is_array($co)){
            $st=[];
            foreach($co as $k => $v){
                $st[]=sprintf("%s='%s'",$k,$v);
            }
            $sql.=" WHERE ".implode(" && ",$st);
        }else{
            $sql.=" WHERE id='$co'";
        }
    }
    return qa($sql.$mo);
}

function f1($tb,$co="",$mo=""){
    return f($tb,$co,$mo)[0];
}

function rc($tb,$co="",$mo=""){
    return count(f($tb,$co,$mo));
}

function mx($tb,$co="id"){
    return qa("SELECT MAX($co) as m FROM $tb")[0]["m"];
}

function save($tb,$co){
    $sql;
    if(empty($co["id"])){
        $sql="INSERT INTO $tb(".implode(",",array_keys($co)).") VALUES ('".implode("','",array_values($co))."')";
    }else{
        $id=$co["id"];
        $st=[];
        foreach($co as $k => $v){
            $st[]=sprintf("%s='%s'",$k,$v);
        }
        $sql="UPDATE $tb SET ".implode(",",$st)." WHERE id='$id'";
    }
    return pdo()->exec($sql);
}

function del($tb,$co){
    $sql="DELETE FROM $tb WHERE ";
    if(is_array($co)){
        $st=[];
        foreach($co as $k => $v){
            $st[]=sprintf("%s='%s'",$k,$v);
        }
        $sql.=implode(" && ",$st);
    }else{
        $sql.="id='$co'";
    }
    return pdo()->exec($sql);
}

function gt($h){
    header("Location:$h");
}

function agt(){
    if(!empty($_GET['pg'])) gt($_GET['pg'].".php?do=".$_GET['pgdo']);
    // echo $_GET['pg'].".php?do=".$_GET['pgdo'];
}

function ckf($f="file",$d="img"){
    if(!empty($_FILES[$f]["tmp_name"])){
        move_uploaded_file($_FILES[$f]["tmp_name"],"./$d/".$_FILES[$f]["name"]);
        $_POST[$f]="./$d/".$_FILES[$f]["name"];
    }
}

function pgln($n,$pgs,$h){
    if($n>1){
        echo "<a href='$h=".($n-1)."'> < </a>";
    }
    for($i=1;$i<=$pgs;$i++){
        if($i==$n){
            echo "<span style='font-size:32px'> $i </span>";
        }else{
            echo "<a href='$h=$i'> $i </a>";
        }
    }
    if($n<$pgs){
        echo "<a href='$h=".($n+1)."'> > </a>";
    }
    
}

?>