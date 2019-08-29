<?php
  $v=f1("mv",$_GET["id"]);

?>

<div class="tab rb" style="width:87%;">
  <div style="background:#FFF; width:100%; color:#333; text-align:left">
    <video src="<?=$v['trail'];?>" width="300px" height="250px" controls="" style="float:right;"></video>
    <font style="font-size:24px"> <img src="<?=$v['post'];?>" width="200px" height="250px"
        style="margin:10px; float:left">
      <p style="margin:3px">影片名稱 ：
        <input type="button" value="線上訂票" onclick="gt('?do=ord&id=<?=$v['id'];?>')"
          style="margin-left:50px; padding:2px 4px" class="b2_btu">
      </p>
      <p style="margin:3px">影片分級 ： <img src="./icon/03C0<?=$v['rate']+1;?>.png" style="width:20px"><?=$rs[$v['rate']];?> </p>
      <p style="margin:3px">影片片長 ： <?=$v['dur'];?>時/分</p>
      <p style="margin:3px">上映日期 <?=$v['sdate'];?></p>
      <p style="margin:3px">發行商 ： <?=$v['pub'];?></p>
      <p style="margin:3px">導演 ： <?=$v['dir'];?></p>
      <br>
      <br>
      <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<?=$v['intro'];?><br>
      </p>
    </font>
    <table width="100%" border="0">
      <tbody>
        <tr>
          <td align="center"><input type="button" value="院線片清單" onclick="gt('index.php')"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>