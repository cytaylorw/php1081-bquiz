
<style>

  .lbtn, .rbtn{
    font-size: 60px;
    color: orange;
  }

  .controls{
    display:flex;
    justify-content: center;
    align-items: center;
  }

  .controls *{
    box-sizing: border-box;
  }
  .pos{
    text-align:center;
    width: 100%;
    height: 100%;
    display:none;
  }

  .lists{
    margin:auto;
    width: 200px;
    height: 250px;

  }

  .pos img{
    width: 200px;
  }

  .btns{
    display:flex;
    width: 320px;
    height: 120px;
    overflow: hidden;
  }
  .posi{
    padding: 2px;
    width: 80px;
    flex-shrink: 0;
    position: relative;
  }

  .posi img{
    width: 100%
  }
</style>

<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <div class="lists">
          <?php
          $posters=qa("SELECT * FROM poster WHERE sh='1' ORDER BY rank");
          foreach($posters as $p){
            echo "<div class='pos' data-ani='".$p["ani"]."'><img src='./poster/".$p["file"]."'><br>".$p["name"]."</div>";
          }

?>
          </div>
          <div class="controls">
            <div class="lbtn">&ltrif;</div>
            <div class="btns">
            <?php
          foreach($posters as $p){
            echo "<div class='posi'><img src='./poster/".$p["file"]."'><br>".$p["name"]."</div>";
          }

?>
            </div>
            <div class="rbtn">&rtrif;</div>
          </div>
        </div>
      </div>
    </div>

<script>
  let total = $(".pos").length;
  let mo=0;
  let interval = 1500;
  let next = false;
  $(".pos").eq(0).show();
  setInterval(function(){
    if(!next) next = $(".pos:visible").next();
    let show = (next.length)?next:$(".pos").eq(0);
    switch (show.data("ani")) {
      case 1:
        $(".pos:visible").fadeOut(interval/2,function(){
          show.fadeIn(interval/2);
        });
        break;
      case 2:
        $(".pos:visible").slideUp(interval/2,function(){
          show.slideDown(interval/2);
        });
        break;   
      case 3:
        $(".pos:visible").hide(interval/2,function(){
          show.show(interval/2);
        });        
        break;
    }
    next = false;
  },interval);
  $(".rbtn").on("click",function(){
    if(mo<(total-4)){
      mo++;
      $(".posi").animate({right:80*mo});
    }

  })
  $(".lbtn").on("click",function(){
    if(mo>0){
      mo--;
      $(".posi").animate({right:80*mo});
    }
  })
  $(".posi").on("click",function(){
    next = $(".pos").eq($(this).index());
  })
</script>

    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
      <?php
        $today=date("Y-m-d");
        $sDate=date("Y-m-d",strtotime("-2 days"));
        $now=(empty($_GET["p"]))?1:$_GET["p"];
        $mvs=qa("SELECT * FROM movie WHERE rDate BETWEEN '$sDate' AND '$today' && sh='1' ORDER BY rank");
        $div=4;
        $num=count($mvs);
        $pages=ceil($num/$div);
        $start=($now-1)*$div;
        $slice=array_slice($mvs,$start,$div);
        foreach($slice as $m){
      ?>
        <table style="width:49%;display:inline-block;">
            <tr>
              <td><img src="./movie/<?=$m["poster"];?>" style="width:50px;height:70px;" onclick="location.href='?do=intro&id=<?=$m['id'];?>'"></td>
              <td><ul style="list-style-type: none;padding:0;margin:0;">
                <li>片名：<?=$m["name"];?></li>
                <li>分級：<img src="./icon/03C0<?=$m["lvl"]?>.png" style="display:inline-block;width:15px;"><?=$lvlname[$m["lvl"]];?></li>
                <li>上映日期：<?=$m["rDate"];?></li>
              </ul></td>
             </tr>
            <tr>
              <td colspan="2"><button onclick="location.href='?do=intro&id=<?=$m['id'];?>'">劇情簡介</button>
                <button onclick="location.href='?do=order&id=<?=$m['id'];?>'">線上訂票</button></td>
            </tr>
        </table>
        <?php
        }
        ?>
        <div class="ct"><?=pages($now,$pages,"?p");?> </div>
      </div>
    </div>