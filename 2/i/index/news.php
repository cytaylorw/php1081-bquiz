<style>
    .all {
        display: none;
    }
</style>

<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td></td>
        </tr>
        <?php
        $now=(empty($_GET["p"]))?"1":$_GET["p"];
        $news=find("news",["sh"=>"checked"]);
        $num=count($news);
        $div=5;
        $pages=ceil($num/$div);
        $start=($now-1)*$div;
        $slice=array_slice($news,$start,$div);

        foreach($slice as $n){
        ?>
        <tr>
            <td class="title clo"><?=$n["title"];?></td>
            <td>
                <span class="part"><?=mb_substr($n["text"],0,20);?>...</span>
                <pre class="all"><?=$n["text"];?></pre>
            </td>
            <td>
            <?php
                if($_SESSION["login"]){
                    if(find("nlog",["nid"=>$n['id'],"acc"=>$_SESSION["login"]])){
                        echo "<a id='good".$n['id']."' onclick=good('".$n['id']."',2,'".$_SESSION["login"]."')>收回讚</a>";
                    }else{
                        echo "<a id='good".$n['id']."' onclick=good('".$n['id']."',1,'".$_SESSION["login"]."')>讚</a>";

                    }
                }
                ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2">
            <?=pages($now,$pages,"?do=news&p");?>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    $(function(){
        $(".title").on("click",function(){
            $(this).next().find(".part, .all").toggle();
        })
    })
</script>