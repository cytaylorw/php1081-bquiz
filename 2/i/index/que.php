<fieldset>
    <legend>目前位置：首頁 > 問卷調查 <span id="nav"></span></legend>
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
            <td><a href="javascript:queResult('<?=$t["title"];?>')">結果</a></td>
            <td><?=(empty($_SESSION["login"]))?"請先登入":"已登入";?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    </fieldset>