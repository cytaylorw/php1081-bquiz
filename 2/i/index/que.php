<fieldset>
    <legend>目前位置：首頁 > 問卷調查 </legend>

    <div id="que">
        <table>
            <tr>
                <td>編號</td>
                <td>問卷題目</td>
                <td>投票總數</td>
                <td>結果</td>
                <td>狀態</td>
            </tr>
            <?php
            $titles = qa("SELECT title, SUM(vote) as total FROM que GROUP BY title");
            foreach($titles as $k => $t){
            ?>
            <tr>
                <td><?=$k+1;?>.</td>
                <td><?=$t["title"];?></td>
                <td><?=$t["total"];?></td>
                <td><a href="index.php?do=queResult&sum=<?=$t["total"];?>&title=<?=$t["title"];?>">結果</a></td>
                <td><?=(empty($_SESSION["login"]))?"請先登入":"<a href=index.php?do=queVote&title=".$t["title"].">參與投票</a>";?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    </fieldset>