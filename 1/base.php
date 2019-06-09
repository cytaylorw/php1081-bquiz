<?php
session_start();

function pdo(){
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db191";
    return new PDO($dsn,"root","");
}

function qa($sql){
    // echo $sql;
    return pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function find($table,$col=null){
    $sql = "SELECT * FROM $table";
    if(isset($col)){
        if(is_array($col)){
            foreach($col as $k => $v){
                $str[]=sprintf("%s='%s'",$k,$v);
            }
            $sql.=" WHERE ".implode(" && ",$str);
        }else{
            $sql.=" WHERE id='$col'";
        }
    }
    return qa($sql);
}

function rc($table,$col=null){
    return count(find($table,$col));
}

function save($table,$col){
    if(isset($col["id"])){
        $id=$col["id"];
        foreach($col as $k => $v){
            $str[]=sprintf("%s='%s'",$k,$v);
        }
        $sql = "UPDATE $table SET ".implode(",",$str)." WHERE id='$id'";
    }else{
        $sql = "INSERT INTO $table(".implode(",",array_keys($col)).") VALUES('".implode("','",array_values($col))."')";
    }
    return pdo()->exec($sql);
}

function del($table,$id){
    $sql = "DELETE FROM $table WHERE id='$id'";
    return pdo()->exec($sql);
}

function gt($url,$get=null){
    (isset($get))?header("location:$url?$get"):header("location:$url");
}

function ckFile(){
    if(isset($_FILES['file']['tmp_name'])){
        $file = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],"./img/$file");
        return $file;
    }else{
        return false;
    }
}
?>