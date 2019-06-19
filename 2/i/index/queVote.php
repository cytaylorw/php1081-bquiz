<?php
    if(empty($_GET["title"])){
        gt("index.php?do=que");
    }else{
        $opt=find("que",["title"=>$_GET["title"]]);
    }
?>

<fieldset style="width:60%;margin:auto;">
    <legend>目前位置：首頁 > 問卷調查 > <?=$_GET["title"];?></legend>
    <form action="api.php?do=queVote" method="post">
         <h3><?=$_GET["title"];?></h3>
         <ul style="list-style-type:none;padding:0;">
            <?php
                foreach($opt as $k => $o){
            ?>
                <li><input type="radio" name="vote" value="<?=$o["id"];?>"><?=$o["opt"];?></li>
            <?php
                }
                ?>
        </ul>
        <input type="submit" value="我要投票">
    </form>
    
    
    </fieldset>