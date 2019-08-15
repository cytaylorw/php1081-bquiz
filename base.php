<?php
session_start();
/* 第一題
if(empty($_SESSION['total'])){
    $total=find1("total");
    $_SESSION['total']=$total['name']++;
    save("total",$total);
    
}
 */
/* 第二題
if(empty($_SESSION['total'])){
    if(rc('total',['tdate'=> date("Y-m-d")])){
        $day = find1('total',['tdate'=> date("Y-m-d")]);
        $day['total']++;
        save('total',$day);
    }else{
        save('total',['tdate'=> date("Y-m-d")]);
    }
    $_SESSION['total']=date("Y-m-d");
}
 */
/* 第三題
$opt=["普通級","輔導級","保護級","限制級"];
$mt=[
    6 => "14:00~16:00",
    5 => "16:00~18:00",
    4 => "18:00~20:00",
    3 => "20:00~22:00",
    2 => "22:00~24:00",
];
 */
function pdo(){
    return new PDO("mysql:host=localhost;charset=utf8;dbname=db193","root","");
}

function qa($sql){
    // echo $sql;
    return pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function find($table,$col=null,$more=""){
    $sql = "SELECT * FROM $table ";
    if(!empty($col)){
        if(is_array($col)){
            $str=[];
            foreach($col as $k=>$c){
                $str[]=sprintf("%s='%s'",$k,$c);
            }
            $sql.= "WHERE ".implode(" && ",$str);
        }else{
            $sql.= "WHERE id='$col'";
        }
    }
    return qa($sql.$more);
}

function find1($table,$col=null,$more=""){
    return find($table,$col,$more)[0];
}

function rc($table,$col=null,$more=""){
    return count(find($table,$col,$more));
}

function limit($idx,$len,$table,$col=null,$more=""){
    return array_slice(find($table,$col,$more),$idx,$len);
}

function save($table,$col){
    if(empty($col['id'])){
        $sql="INSERT INTO $table("
        .implode(",",array_keys($col)).") VALUES('"
        .implode("','",array_values($col))."')";
    }else{
        $id=$col['id'];
        foreach($col as $k=>$c){
            $str[]=sprintf("%s='%s'",$k,$c);
        }
        $sql= "UPDATE $table SET ".implode(",",$str)." WHERE id='$id'";
    }
    // echo $sql;
    return pdo()->exec($sql);
}

function del($table,$col){
    $sql = "DELETE FROM $table ";
    if(is_array($col)){
        $str=[];
        foreach($col as $k=>$c){
            $str[]=sprintf("%s='%s'",$k,$c);
        }
        $sql.= "WHERE ".implode(" && ",$str);
    }else{
        $sql.= "WHERE id='$col'";
    }
    return pdo()->exec($sql);
}

function gt($href){
    header("location:$href");
}

function chkFile($dir="img",$name="file"){
    if(!empty($_FILES[$name]['tmp_name'])){
        move_uploaded_file($_FILES[$name]['tmp_name'],"./$dir/".$_FILES[$name]['name']);
        $_POST[$name]="./$dir/".$_FILES[$name]['name'];
    }
}

function pages($now,$pages,$href){
    if($now>1){
        echo "<a href='$href=".($now-1)."'> < </a>";
    }
    for($i=1;$i<=$pages;$i++){
        if($i==$now){
            echo "<span style='font-size:24px'>$i</span>";
        }else{
            echo "<a href='$href=$i'> $i </a>";
        }
    }
    if($now<$pages){
        echo "<a href='$href=".($now+1)."'> > </a>";
    }

}
?>