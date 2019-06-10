<?php
session_start();

if(empty($_SESSION['sum'])){
    $sum=find("total")[0];
    $sum['text']++;
    save("total",$sum);
    $_SESSION['sum']=$sum;
}

function pdo(){
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db191";
    return new PDO($dsn,"root","");
}

function qa($sql){
    // echo $sql;
    return pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function limit($table,$start,$div){
    return qa("SELECT * FROM $table LIMIT $start,$div");
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

function pages($now,$pages,$href){
    if($now>1){
        $p=$now-1;
        echo "<a href='$href=$p'> < </a>";
    }
    for ($i=1; $i<=$pages; $i++) {
        if($now==$i){
            echo "<span style='font-size:24px;'>$i</span>";
        }else{
            echo "<a href='$href=$i'> $i </a>";                      # code...
        }
    }
    if($now<$pages){
        $n=$now+1;
        echo "<a href='$href=$n'> > </a>";
    }
}
?>