<?php
include_once "base.php";

$do=(empty($_GET['do']))?gt("index.php"):$_GET['do'];
$table=(empty($_GET['on']))?gt("index.php"):$_GET['on'];

/* 
    前端在設計表單時，input name必須有對應的表格欄位名稱。
        - add/update:   只會處理單筆資料，所以name直接使用對應的表格欄位名稱。
                        update必須加id進表單(隱藏輸入)
        - edit:         會處理多筆資料，所以name使用 <id>[<欄位名稱>]，api在收到資料時會先依id整理好。
                        顯示為checkbox時，比需加一個空值的隱藏輸入在上方，並使用相同name。(不然部分只有更改顯示的功能會無法取消)
*/

switch($do){
    case "add":
    case "update":
        // 上傳檔案不會在$_POST，所以先檢查是否有上傳檔案。
        $file = ckFile();
        if($file) $cols['file'] = $file;
        // 再處理剩下在$_POST裡的值。
        foreach($_POST as $k => $v){
            $cols[$k] = $v;
        }
        print_r($cols);
        save($table,$cols);
        gt("admin.php","on=$table");
        break;
    case "edit":
        print_r($_POST);
        foreach($_POST as $id => $cols){
            // 必須為陣列
            if(is_array($cols)){
                // ? 刪除資料 : 更新資料
                if(isset($cols['del'])){
                    del($table,$id);
                }else{
                    $cols['id'] = $id;
                    // ? 處理顯示radio : 處理顯示checkbox
                    if(isset($_POST["sh"])){
                        $cols['sh'] = ($_POST['sh'] == $id)?1:0;
                    }else{
                        // 輸入空值為空字串，必須使用empty檢查
                        $cols['sh'] = (empty($cols['sh']))?0:1;
                    }
                    print_r($cols);
                    save($table,$cols);
                }
            }
        }
        gt("admin.php","on=$table");
        break;
    default:
        echo "test";
}
?>