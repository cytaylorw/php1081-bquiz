<!--正中央-->
<span class="t botli">更多最新消息區
    <?php
		$div=5;
		$pages=ceil(rc("news")/$div);
		$now=(!empty($_GET['p']))?$_GET['p']:1;		
		$start=($now-1)*$div;
		$rows=limit("news",$start,$div);
                
    ?>
    </span>
    <ol start="<?=$start+1;?>" class="ssaa" style="list-style-type:decimal;">
    <?php
        
        foreach($rows as $r){
            ?>
            <li><?=explode("\n",$r['text'])[0];?><span class="all" style="display:none;"><?=$r['text'];?></span></li>
            <?php
        }
    ?>
    </ol>
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
        $("#altt").hover(function(){
            $("#altt").show();
        },function(){
            $("#altt").hide();
        })
        $(".ssaa li").mouseout(
            function () {
                $("#altt").hide()
            }
        )
    </script>
<div style="text-align:center;">
	<?php
	pages($now,$pages,"?do=news&p");
	?>
</div>
</div>