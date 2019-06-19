<?php
    if(empty($_GET["title"])){
        gt("index.php?do=que");
    }else{
        $opt=find("que",["title"=>$_GET["title"]]);
    }
?>

<fieldset style="width:80%;margin:auto;">
    <legend>目前位置：首頁 > 問卷調查 > <?=$_GET["title"];?></legend>
    <form action="api.php?do=queVote" method="post">
        <table style="width:100%;margin:auto;">
            <tr>
                <td colspan="2"><h4><?=$_GET["title"];?></h4></td>
            </tr>
            <?php
                foreach($opt as $k => $o){
                    $rate=round($o["vote"]/$_GET["sum"],2);
            ?>
            <tr>
                <td style="width:50%"><?=$k+1;?>. <?=$o["opt"];?></td>
                <td style="width:50%">
                    <div style="display:inline-block;background-color:#ddd;height:20px;width:<?=$rate*60;?>%"></div>
                    <?=$o["vote"];?>票(<?=$rate*100;?>%)</td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td class="ct" colspan="2"><input type="button" value="返回" onclick="location.href='index.php?do=que'"></td>
            </tr>
        </table>
    </form>
    
    
    </fieldset>