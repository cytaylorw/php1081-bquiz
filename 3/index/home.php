<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;height:350px">
        <div style="position:relative;height:250px">
        <?php
          $po=find("poster",["sh"=>1]," ORDER BY ord ASC");
          foreach($po as $p){
        ?>
          <div class="bg" style="position:absolute">
            <img src="<?=$p['file'];?>" style="width:200px">
            <div class="w-100 ct"><?=$p['name'];?></div>
          </div>
        <?php
          }
        ?>
        </div>
        <div>
          <div style="display:inline-block;font-size:72px" id="left">&ltrif;</div>
          <div style="display:inline-block;width:280px;height:80px;overflow:hidden">
          <?php
            echo "<div style='width:".(70*count($po))."px'>";
            foreach($po as $p){
              echo "<img src='".$p['file']."' style='width:70px' class='sm'>";
            }
            echo "</div>";
          ?>
          </div>
          <div style="display:inline-block;font-size:72px" id="right">&rtrif;</div>
        </div>
      </div>
    </div>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;height:350px">
            <?php
              $d1 = date("Y-m-d",strtotime("-2 days"));
              $mvs=find("movie",null," WHERE sdate BETWEEN '$d1' AND '".date("Y-m-d")."'");
              $div=4;
              $now=(empty($_GET['p']))?1:$_GET['p'];
              $pages=ceil(count($mvs)/$div);
              $slice=array_slice($mvs,($now-1)*$div,$div);
              foreach($slice as $m){
            ?>
        <table style="width:49%;display:inline-block;font-size:14px">
              <tr>
            <td><img src="<?=$m['po'];?>" style="width:70px"></td>
            <td><ul class="ul-list">
              <li>片名：<?=$m['name'];?></li>
              <li>分級：<img src="./icon/03C0<?=$m["cat"]+1;?>.png"  style="width:20px;"><?=$opt[$m['cat']];?></li>
              <li>上映日期：<?=$m['sdate'];?></li>
            </ul></td>
          </tr>
          <tr>
            <td colspan="2">
              <button style="font-size:12px" onclick="lof('?do=intro&id=<?=$m['id'];?>')">劇情簡介</button>
              <button style="font-size:12px" onclick="lof('?do=order&id=<?=$m['id'];?>')">線上訂票</button></td>
          </tr>
        </table>
        <?php
          }
          echo "<div>";
          pages($now,$pages,"index.php?p");
          echo "</div>";
        ?>
      </div>
    </div>

<script>
  $(".sm, .bg:not(:nth-of-type(1))").hide();
  let ani=<?=find1("ani")["mode"];?>;
  let ck = null;
  // ani=0;
  setInterval(() => {
    let show = $(".bg:visible");
    switch(ani){
      case 0:
        show.hide(1000,function(){
          if(ck != null){
            $(".bg").eq(ck).show(1000);
            ck=null;
          }else if(show.next().length){
            show.next().show(1000);
          }else{
            $(".bg").eq(0).show(1000);
          }
        })
        break;
      case 1:
      show.fadeOut(1000,function(){
          if(ck != null){
            $(".bg").eq(ck).fadeIn(1000);
            ck=null;
          }else if(show.next().length){
            show.next().fadeIn(1000);
          }else{
            $(".bg").eq(0).fadeIn(1000);
          }
        })
        break;
      case 2:
      show.slideUp(1000,function(){
          if(ck != null){
            $(".bg").eq(ck).slideDown(1000);
            ck=null;
          }else if(show.next().length){
            show.next().slideDown(1000);
          }else{
            $(".bg").eq(0).slideDown(1000);
          }
        })
        break;
    }
  }, 2000);
  
  for(let i=0;i<4;i++){
    $(".sm").eq(i).show();
  }

  $("#left").on("click",function(){
    if($(".sm:visible").eq(0).prev().length){
      $(".sm:visible").eq(0).prev().show();
      $(".sm:visible").eq($(".sm:visible").length).hide();

    }
  })
  $("#right").on("click",function(){
    if($(".sm:visible").eq(3).next().length){
      $(".sm:visible").eq(3).next().show();
      $(".sm:visible").eq(0).hide();

    }
  })

  $('.sm').on("click",function(){
    ck=$(this).index();
  })
</script>