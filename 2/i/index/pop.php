<style>
    .all {
        color: white;
        position: absolute;
        width: 350px;
        min-height: 100px;
        background-color: rgba(0, 0, 0, 0.7);
        top: 50px;
        left: 200px;
        z-index: 99;
        display: none;
        padding: 5px;
        border: none;
        background-position: initial initial;
        background-repeat: initial initial;
    }
</style>

<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table style="width:95%;margin:auoto;">
        <tr>
            <td style="width:30%">標題</td>
            <td style="width:50%">內容</td>
            <td>人氣</td>
        </tr>
        <?php

$nType = [
    1 => "健康新知",
    2 => "菸害防治",
    3 => "癌症防治",
    4 => "慢性病防治",
];

$news = qa("SELECT * FROM news WHERE sh='checked' ORDER BY good DESC");
$num = count($news);
$div = 5;
$pages = ceil($num / $div);
$now = (empty($_GET["p"])) ? 1 : $_GET["p"];
$list = array_slice($news, ($now - 1) * $div, $div);
foreach ($list as $k => $n) {
    ?>
        <tr>
            <td class="ti clo" style="cursor:pointer"><?=$n['title'];?></td>
            <td>
                <div class="line"><?=mb_substr($n["text"], 0, 10, "utf8");?>...</div>
                <div class="all" style="display:none">
                    <h3 style="color:lightblue"><?=$nType[$n["type"]];?></h3>
                    <pre><?=$n["text"];?></pre>
                </div>
            </td>
            <td>
                <?php
echo "<span id='vie" . $n['id'] . "'>" . $n['good'] . "</span>個人說讚<img src='./icon/02B03.jpg' style='width:20px'>";
    if (!empty($_SESSION["login"])) {
        if (find("log", ["nid" => $n["id"], "user" => $_SESSION["login"]])) {
            ?>
                <a id="good<?=$n["id"];?>" href='#'
                    onclick="good('<?=$n["id"];?>','2','<?=$_SESSION["login"];?>')">收回讚</a>
                <?php
} else {
            ?>
                <a id="good<?=$n["id"];?>" href='#'
                    onclick="good('<?=$n["id"];?>','1','<?=$_SESSION["login"];?>')">讚</a>
                <?php
}}
    ?>
            </td>
        </tr>
        <?php
}
?>
        <tr>
            <td>
                <?php if ($pages > 1) {pages($now, $pages, "index.php?do=pop&p");}?>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</fieldset>
<script>
    $(".ti").hover(
        function () {
            $(".all").hide();
            $(this).next().find(".all").show();
        },
        function () {
            $(".all").hide();
        }
    )
</script>