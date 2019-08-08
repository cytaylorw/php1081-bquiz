<?php
  $m=find1("movie",$_GET['id']);
?>

<div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="<?=$m['mv'];?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px"> <img src="<?=$m['po'];?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$m['name'];?>
          <input type="button" value="線上訂票" onclick="lof('?do=order&id=<?=$m['id'];?>')" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： <img src="./icon/03C0<?=$m["cat"]+1;?>.png" style="display:inline-block;"><?=$opt[$m['cat']];?> </p>
        <p style="margin:3px">影片片長 ： <?=$m['dur'];?>時/分</p>
        <p style="margin:3px">上映日期 ： <?=$m['sdate'];?></p>
        <p style="margin:3px">發行商 ： <?=$m['pub'];?></p>
        <p style="margin:3px">導演 ： <?=$m['dir'];?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<?=$m['intro'];?><br>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center"><input type="button" value="院線片清單" onclick="lof('index.php')"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>