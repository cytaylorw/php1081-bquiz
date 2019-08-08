<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$_GET['title'];?></legend>
        <div style="font-weight:bold"><?=$_GET['title'];?></div>
        <form action="api.php?do=quevote&tb=que&pg=index&pgdo=que" method="POST">
            <ul class="ul-list">
            
            <?php
                $que=find("que",["title"=>$_GET['title']]," ORDER BY id");
                foreach($que as $k => $q){
            ?>
                <li>
                    <input type="radio" name="vote" value="<?=$q['id'];?>">
                    <?=$q['opt'];?>
                </li>
            <?php
            }
            ?>
            </ul>
            <div><input type="submit" value="我要投票"></div>
        </form>
    </table>
</fieldset>