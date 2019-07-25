<?php
    if(empty($_SESSION["mem"])){ 
        gt("?do=login"); 
        exit();
    }
?>