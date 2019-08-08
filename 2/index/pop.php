<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table class="ma">
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td>人氣</td>
        </tr>
        <?php
            $news=find("news",null," ORDER BY id");
            $now=(empty($_GET['p']))?1:$_GET['p'];
            $div=5;
            $pages=ceil(count($news)/$div);
            $slice=array_slice($news,($now-1)*$div,$div);
            foreach($slice as $k => $q){
                $sum=qa("SELECT COUNT(*) as c FROM good WHERE nid='".$q['id']."'")[0]['c'];
        ?>
        <tr>
            <td><?=$q['title'];?></td>
            <td>
                <span class="intro"><?=mb_substr($q['text'],0,20);?>...</span>
                <pre class="all" style="display:none"><?=$q['text'];?></pre>
            </td>
            <td>
                <span id="vie<?=$q['id'];?>"><?=$sum;?></span>個人說<img src="./icon/02B03.jpg" style="width:20px;"> - 
                <?php
                    $id=find1("user",["acc"=>$_SESSION['login']])['id'];
                    if(rc("good",["nid"=>$q['id'],"uid"=>$id])){
                        echo "<a id='good".$q['id']."'onclick='good(".$q['id'].",2,$id)'>收回讚</a>";
                    }else{
                        echo "<a id='good".$q['id']."'onclick='good(".$q['id'].",1,$id)'>讚</a>";
                    }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?=pages($now,$pages,"?do=news&p");?>
</fieldset>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 0px; left: 350px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
						$(".intro").hover(
							function ()
							{
								$("#alt").html(""+$(this).next().html()+"").css({"top":$(this).offset().top-200})
								$("#alt").show()
							}
						)
						$(".intro").mouseout(
							function()
							{
								$("#alt").hide()
							}
						)
                        </script>