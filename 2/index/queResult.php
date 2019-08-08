<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$_GET['title'];?></legend>
        <div style="font-weight:bold"><?=$_GET['title'];?></div>
        <form action="api.php?do=quevote&tb=que&pg=index&pgdo=que" method="POST">
            <table>
            <?php
                $que=find("que",["title"=>$_GET['title']]," ORDER BY id");
                foreach($que as $k => $q){
                    $rate=round(($q['vote']/$_GET['sum']),2);
            ?>
                <tr>
                    <td style="width:40%"><?=$k+1;?>. <?=$q['opt'];?></td>
                    <td style="width:60%">
                        <div style="display:inline-block;height:20px;background:#ccc;width:<?=$rate*80;?>%"></div>
                        <span><?=$q['vote'];?>票(<?=$rate*100;?>%)</span>
                    </td>
                </tr>
            <?php
            }
            ?>
            </table>
            <div><input type="button" value="返回" onclick="lof('?do=que')"></div>
        </form>
    </table>
</fieldset>