<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
        <table>
            <tr>
                <td>編號</td>
                <td>問卷項目</td>
                <td>投票總數</td>
                <td>結果</td>
                <td>狀態</td>
            </tr>
            <?php
                $que=qa("SELECT *, SUM(vote) as t FROM que GROUP BY subj");
                foreach($que as $k => $q){
            ?>
            <tr>
                <td><?=$k+1;?></td>
                <td><?=$q["subj"];?></td>
                <td><?=$q["t"];?></td>
                <td><a href="?do=queResult&sum=<?=$q["t"];?>&subj=<?=$q["subj"];?>">結果</a></td>
                <td>
                <?php
                    if(empty($_SESSION["login"])){
                        echo "請先登入";
                    }else{
                        echo "<a href=?do=queVote&subj=".$q["subj"].">參與投票</a>";
                    }
                ?>

                </td>
            </tr>
                <?php } ?>
        </table>
    
</fieldset>