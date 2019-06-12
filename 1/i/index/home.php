<div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
        <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
    </div>
</div>
<?php
/* 動畫輪播區，使用版型提供的javascript */
    $rows=find("mvim",["sh"=>1]);
    foreach($rows as $r){
        $mvs[]=$r['file'];
    }

?>
<script>
    var lin=<?=json_encode($mvs);?>;
    var now=0;
    if(lin.length>=1)
    {
        setInterval("ww()",3000);
        now=1;
    }
    ww();

    function ww() {
        $("#mwww").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>");
        //$("#mwww").attr("src",lin[now])
        now++;
        if (now >= lin.length)
            now = 0;
    }
</script>
<div
    style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
    <span class="t botli">最新消息區
    <?php
        /* 
            最新消息區，使用#altt的script，完成後再複製到更多最新消息區
        */
        $news=find("news",["sh"=>1]);
        $max=5;
        if(count($news) > $max){
            echo "<br><a href='index.php?do=news' style='display:block;text-align:right'>More...</a>";
            $news=array_slice($news,0,5);
        } 
            
    ?>
    </span>
    <ul class="ssaa" style="list-style-type:decimal;">
    <?php
        
        foreach($news as $r){
            ?>
            <li><?=explode("\n",$r['text'])[0];?><span class="all" style="display:none;"><?=$r['text'];?></span></li>
            <?php
        }
    ?>
    </ul>
    <div id="altt"
        style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
    </div>
    <script>
        $(".ssaa li").hover(
            function () {
                $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                $("#altt").show()
            }
        )
        $(".ssaa li").mouseout(
            function () {
                $("#altt").hide()
            }
        )
    </script>
</div>
</div>