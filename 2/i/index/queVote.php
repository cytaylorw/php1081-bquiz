<style>
    .queList{
        list-style-type: none;
    }
</style>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$_GET["subj"];?></legend>
        <form action="api.php?do=queVote" method="post">
            <h4><?=$_GET["subj"];?></h4>
            <ul class="queList">
            <?php
                $opt = find("que",["subj"=>$_GET["subj"]]);
                foreach($opt as $o){
            ?>
                <li><input type="radio" name="vote" value="<?=$o['id'];?>"><?=$o['opt'];?></li>
                <?php } ?>
            </ul>
            <input type="submit" value="我要投票">
        </form>
    
</fieldset>