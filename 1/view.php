<?php
include_once "base.php";

$do=(empty($_GET['do']))?gt("index.php"):$_GET['do'];
$on=(empty($_GET['on']))?gt("index.php"):$_GET['on'];
$api = "api.php?on=$on&do=$do";
include "./i/$on/var.php";
include "./i/$on/$do.php";
?>