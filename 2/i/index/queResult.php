

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$_GET["subj"];?></legend>
        <table>
            <tr>
                <td colspan="2"><h4><?=$_GET["subj"];?></h4></td>

            </tr>
            <?php
                $opt = find("que",["subj"=>$_GET["subj"]]);
                foreach($opt as $k=>$o){
                    $rate=round($o["vote"]/$_GET["sum"],2);
            ?>
            <tr>
                <td style="width:30%"><?=($k+1).".".$o["opt"];?></td>
                <td><div style="display:inline-block;background-color:#ddd;height:20px;width:<?=80*$rate;?>%"></div><?=$o["vote"];?>票(<?=100*$rate;?>%)</td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="2"><button onclick="location.href='?do=que'">返回</button></td>
            </tr>
        </table>
                
    
</fieldset>