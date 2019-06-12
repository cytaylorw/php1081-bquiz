<?php
include_once "base.php";

/* 
    根據GET值載入對應功能的檔案。
    - 先完成title，再直接複製整個資料夾。
    - 完整註解也在title資料夾內，其他功能只放複製後需要變動的部分。
*/

$do=(empty($_GET['do']))?gt("index.php"):$_GET['do'];
$on=(empty($_GET['on']))?gt("index.php"):$_GET['on'];
$api = "api.php?on=$on&do=$do";
include "./i/$on/var.php"; // 變數檔
include "./i/$on/$do.php";
?>