<style>
    .all {
        display: none;
        position: absolute;
        width: 350px;
        min-height: 100px;
        word-break: break-all;
        text-align: justify;
        background-color: rgb(255, 255, 204);
        top: 50px;
        left: 400px;
        z-index: 99;
        display: none;
        padding: 5px;
        border: 3px double rgb(255, 153, 0);
        background-position: initial initial;
        background-repeat: initial initial;
    }

</style>

<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td>人氣</td>
        </tr>
        <?php
$now = (empty($_GET["p"])) ? "1" : $_GET["p"];
$news = find("news", ["sh" => "checked"]);
$num = count($news);
$div = 5;
$pages = ceil($num / $div);
$start = ($now - 1) * $div;
$slice = array_slice($news, $start, $div);
$type=["健康新知","菸害防治","癌症防治","慢性病防治"];
foreach ($slice as $n) {
    ?>
        <tr>
            <td class="title clo"><?=$n["title"];?></td>
            <td>
                <span class="part"><?=mb_substr($n["text"], 0, 20);?>...</span>
                <pre class="all"><h4><?=$type[$n["type"]-1];?></h4><?=$n["text"];?></pre>
            </td>
            <td>
                <?php
echo "<span id='vie" . $n['id'] . "'>" . $n["good"] . "</span>個人說<img src='./icon/02B03.jpg' style='height:20px'>";
    if ($_SESSION["login"]) {
        if (find("nlog", ["nid" => $n['id'], "acc" => $_SESSION["login"]])) {
            echo " - <a id='good" . $n['id'] . "' onclick=good('" . $n['id'] . "',2,'" . $_SESSION["login"] . "')>收回讚</a>";
        } else {
            echo " - <a id='good" . $n['id'] . "' onclick=good('" . $n['id'] . "',1,'" . $_SESSION["login"] . "')>讚</a>";

        }
    }
    ?>
            </td>
        </tr>
        <?php }?>
        <tr>
            <td colspan="2">
                <?=pages($now, $pages, "?do=pop&p");?>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    $(function () {
        $(".title").hover(function () {
            $(this).next().find(".all").show();
        },function(){
            $(this).next().find(".all").hide();
        })
    })
</script>