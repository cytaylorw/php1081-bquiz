<?php
include_once "base.php";

$do=(empty($_GET['do']))?gt("index.php"):$_GET['do'];
$table=(empty($_GET['on']))?gt("index.php"):$_GET['on'];



switch($do){
    case "add":
    case "update":
        $file = ckFile();
        if($file) $cols['file'] = $file;
        foreach($_POST as $k => $v){
            $cols[$k] = $v;
        }
        print_r($cols);
        save($table,$cols);
        gt("admin.php","on=$table");
        break;
    case "edit":
        foreach($_POST as $id => $cols){
            if(is_array($cols)){
                if(isset($cols['del'])){
                    del($table,$id);
                }else{
                    $cols['id'] = $id;
                    if(isset($_POST["sh"])){
                        $cols['sh'] = ($_POST['sh'] == $id)?1:0;
                    }else{
                        $cols['sh'] = (isset($cols['sh']))?1:0;
                    }
                    print_r($cols);
                    save($table,$cols);
                }
            }
        }
        gt("admin.php","on=$table");
        break;
    case "login":
        echo (rc($table,$_POST))? 1:0;
        break;
    case "get":
        $rows=find($table,["sh"=>1]);
        $mvs=[];
        foreach($rows as $m){
            $mvs[]=$m[$_GET['get']];
        }
        echo json_encode($mvs);
        break;
    default:
        echo "test";
}
?>