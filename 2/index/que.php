<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table class="ma">
        <tr>
            <td>編號</td>
            <td>問卷題目</td>
            <td>投票總數</td>
            <td>結果</td>
            <td>狀態</td>
        </tr>
        <?php
            $que=qa("SELECT *, SUM(vote) as t FROM que GROUP BY title ORDER BY id");
            foreach($que as $k => $q){
        ?>
        <tr>
            <td><?=$k+1;?></td>
            <td><?=$q['title'];?></td>
            <td><?=$q['t'];?></td>
            <td><a href="?do=queResult&title=<?=$q['title'];?>&sum=<?=$q['t'];?>">結果</a></td>
            <td><?=(empty($_SESSION['login']))?"請先登入":"<a href='?do=queVote&title=".$q['title']."'>參與投票</a>";?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>