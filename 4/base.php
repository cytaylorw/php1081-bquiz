<?php
session_start();

$rts=["普通級","保護級","輔導級","限制級"];
$ses=[
    6 => "14:00 ~ 16:00",
    5 => "16:00 ~ 18:00",
    4 => "18:00 ~ 20:00",
    3 => "20:00 ~ 22:00",
    2 => "22:00 ~ 24:00",
];
$ani=["縮放","淡入","滑入"];
$td = date("Y-m-d");
$vc1=rand(10,99);
$vc2=rand(10,99);

$am=[
    "admin"=>"管理權限設置",
    "th"=>"商品分類與管理",
    "ord"=>"訂單管理",
    "mem"=>"會員管理",
    "bot"=>"頁尾版權區",
    "news"=>"最新消息區",
                ];

function pdo(){
    return new PDO("mysql:host=localhost;charset=utf8;dbname=db164","root","");
}

function qa($s){
    return pdo()->query($s)->fetchAll(PDO::FETCH_ASSOC);
}

function f($tb, $co="", $mo=""){
    $s="SELECT * FROM $tb";
    if(!empty($co)){
        if(is_array($co)){
            $tp=[];
            foreach($co as $k => $v){
                $tp[]=sprintf("%s='%s'",$k,$v);
            }
            $s.=" WHERE ".implode(" && ",$tp);
        }else{
            $s.=" WHERE id='$co'";
        }
    }
    return qa($s.$mo);
}

function f1($tb, $co="", $mo=""){
    return f($tb, $co, $mo)[0];
}

function rc($tb, $co="", $mo=""){
    return count(f($tb, $co, $mo));
}

function mx($tb,$co="id"){
    // echo "SELECT MAX($co) as m FROM $tb";
    return qa("SELECT MAX($co) as m FROM $tb")[0]["m"];
}

function save($tb,$co){
    $s;
    if(empty($co["id"])){
        $s="INSERT INTO $tb(".implode(",",array_keys($co)).") VALUES ('".implode("','",array_values($co))."')";
    }else{
        $id=$co["id"];
        $tp=[];
        foreach($co as $k => $v){
            $tp[]=sprintf("%s='%s'",$k,$v);
        }
        $s="UPDATE $tb SET ".implode(",",$tp)." WHERE id='$id'";
    }
    return pdo()->exec($s);
}

function del($tb,$co){
    $s="DELETE FROM $tb WHERE ";
    if(is_array($co)){
        $tp=[];
        foreach($co as $k => $v){
            $tp[]=sprintf("%s='%s'",$k,$v);
        }
        $s.=implode(" && ",$tp);
    }else{
        $s.="id='$co'";
    }
    return pdo()->exec($s);
}

function gt($h){
    header("Location:$h");
}

function agt(){
    if(!empty($_GET["pg"])) gt($_GET["pg"].".php?do=".$_GET["pgdo"]);
}

function ckf($file="file",$dir="img"){
    if(!empty($_FILES[$file]["tmp_name"])){
        move_uploaded_file($_FILES[$file]["tmp_name"],"./$dir/".$_FILES[$file]["name"]);
        $_POST[$file]="./$dir/".$_FILES[$file]["name"];
    }
}

function pgln($n,$pgs,$h){
    if($n>1){
        echo "<a href='$h&p=".($n-1)."'> < </a>";
    }
    for($i=1;$i<=$pgs;$i++){
        if($i == $n){
            echo "<span style='font-size:32px;'> $i </span>";
        }else{
            echo "<a href='$h&p=$i'> $i </a>";
        }
    }
    if($n<$pgs){
        echo "<a href='$h&p=".($n+1)."'> > </a>";
    }
}


// save("test",["name"=>"123","file"=>123]);
// print_r(f("test"));
// save("test",["id"=>3,"name"=>"1234","file"=>1234]);
// print_r(f("test"));
// del("test",3);
// print_r(f("test"));
// pgln(3,5,"base.php?");
// echo mx("test");
?>