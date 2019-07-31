<?php
session_start();

function pdo(){
    return new PDO("mysql:host=localhost;charset=utf8;dbname=db19","root","");
}

function qa($sql){
    return pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function find($table,$col=null,$more=""){
    $sql = "SELECT * FROM $table ";
    if(is_array($col)){
        $str=[];
        foreach($col as $k=>$c){
            $str[]=sprintf("%s='%s'",$k,$c);
        }
        $sql.= "WHERE ".implode(" && ",$str);
    }else{
        $sql.= "WHERE id='$col'";
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
        $sql="INSERT INTO $table(".implode(",",array_keys($col)).") VALUES('".implode("','",array_values($col))."')";
    }else{
        $id=$col['id'];
        foreach($col as $k=>$c){
            $str[]=sprintf("%s='%s'",$k,$c);
        }
        $sql= "UPDATE $table SET ".implode(",",$str)." WHERE id='$id'";
    }
    return pdo()->exec($sql);
}

function del($table,$col){
    $sql = "DELETE FROM $table WHERE id";
    if(is_array($col)){
        $sql.= " IN (".implode(",",array_values($col)).")";
    }else{
        $sql.= "='$col'";
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