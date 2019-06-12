<?php
session_start();

/* 
    宣告pdo，避免重複使用global
*/
function pdo(){
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db191";
    return new PDO($dsn,"root","");
}

/* 
    自訂函式全部使用 query()->fetchAll()
*/
function qa($sql){
    // echo $sql;
    return pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

/* 
    查詢資料表資料，使用qa()。
        - $col預設為空值，回傳所有資料。
        - $col使用陣列，索引為欄位名稱，值為欄位資料。
        - $col使用單一值時，欄位名稱為id。
*/
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

/* 
    切割回傳資料，分頁使用。
*/
function limit($start,$div,$table,$col=null){
    return array_slice(find($table,$col),$start,$div);
}

/* 
    計算回傳資料筆數。
*/
function rc($table,$col=null){
    return count(find($table,$col));
}

/* 
    儲存表單資料至資料庫，INSERT和UPDATE合併成一個函式。
        - $col必須是陣列，有索引為id會執行UPDATE，沒有則執行INSERT。
*/
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

/* 
    刪除資料表資料。
*/
function del($table,$id){
    $sql = "DELETE FROM $table WHERE id='$id'";
    return pdo()->exec($sql);
}

/* 
    Goto網址重新導向。
*/
function gt($url,$get=null){
    (isset($get))?header("location:$url?$get"):header("location:$url");
}

/* 
    檢查上傳檔案，無上傳資料回傳false。
*/
function ckFile($saveDir="img"){
    if(isset($_FILES['file']['tmp_name'])){
        $file = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],"./$saveDir/$file");
        return $file;
    }else{
        return false;
    }
}

/* 
    產生分頁連結。
        - $href為字串，結尾必須為GET的頁數變數名稱("index.php?do=xxx&p")
*/
function pages($now,$pages,$href){
    if($now>1){
        $p=$now-1;
        echo "<a href='$href=$p'> < </a>";
    }
    for ($i=1; $i<=$pages; $i++) {
        if($now==$i){
            echo "<span style='font-size:24px;'>$i</span>";
        }else{
            echo "<a href='$href=$i'> $i </a>";
        }
    }
    if($now<$pages){
        $n=$now+1;
        echo "<a href='$href=$n'> > </a>";
    }
}
?>