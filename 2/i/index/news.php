<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table style="width:95%;margin:auoto;">
        <tr>
            <td style="width:30%">標題</td>
            <td>內容</td>
            <td></td>
        </tr>
        <?php
        $news=find("news",["sh"=>"checked"]);
        $num=count($news);
        $div=5;
        $pages=ceil($num/$div);
        $now=(empty($_GET["p"]))?1:$_GET["p"];
        $list=array_slice($news,($now-1)*$div,$div);
        foreach($list as $k => $n){
        ?>
        <tr>
            <td class="ti clo" style="cursor:pointer"><?=$n['title'];?></td>
            <td>
                <div class="line"><?=mb_substr($n["text"],0,10,"utf8");?>...</div>
                <div class="all" style="display:none"><pre><?=$n["text"];?></pre></div>
            </td>
            <td>
            <?php
                if(!empty($_SESSION["login"])){
                    if(find("log",["nid"=>$n["id"],"user"=>$_SESSION["login"]])){
                        ?>
                        <a id="good<?=$n["id"];?>" href='#' onclick="good('<?=$n["id"];?>','2','<?=$_SESSION["login"];?>')">收回讚</a>
                    <?php
                    }else{
                    ?>
                        <a id="good<?=$n["id"];?>" href='#' onclick="good('<?=$n["id"];?>','1','<?=$_SESSION["login"];?>')">讚</a>
                    <?php
                        }}
                    ?>
            </td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td><?php if($pages>1)pages($now,$pages,"index.php?do=news&p");?></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</fieldset>

<script>
    $(".ti").on("click",function(){
        $(this).siblings().find(".all").toggle();
        $(this).siblings().find(".line").toggle();
    })
</script>