<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table class="ma">
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td></td>
        </tr>
        <?php
            $news=find("news",null," ORDER BY id");
            $now=(empty($_GET['p']))?1:$_GET['p'];
            $div=5;
            $pages=ceil(count($news)/$div);
            $slice=array_slice($news,($now-1)*$div,$div);
            foreach($slice as $k => $q){
        ?>
        <tr>
            <td><?=$q['title'];?></td>
            <td>
                <span class="intro"><?=mb_substr($q['text'],0,20);?>...</span>
                <pre class="all" style="display:none"><?=$q['text'];?></pre>
            </td>
            <td>
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

<script>
    $(".intro").on("click",function(){
        $(".all").hide();
        $(this).hide().next().show();
    })
    $(".all").on("click",function(){
        $(this).hide();
        $(this).prev().show();
    })
</script>