<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <span class="rb tab" style="width:95%;">
        <div style="height:200px">
        <?php
            $rs1 = f("post",["sh"=>1]);
            foreach($rs1 as $k => $v){
                if($k == 0){

                    echo "<img class='bg' src='".$v['file']."' style='height:200px'>";
                }else{
                    echo "<img class='bg dn' src='".$v['file']."' style='height:200px'>";

                }
            }
        ?>
        </div>
        <span>
            <span id="ml" style="font-size:52px">&ltrif;</span>
            <span style="width:320px">
            <?php
            foreach($rs1 as $k => $v){
                if($k < 4){

                    echo "<img class='sm' src='".$v['file']."' style='width:80px'>";
                }else{
                    echo "<img class='sm dn' src='".$v['file']."' style='width:80px'>";

                }
            }
        ?>
            </span>
            <span id="mr" style="font-size:52px">&rtrif;</span>
        </div>

<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <?php
            $td=date("Y-m-d");
            $sd=date("Y-m-d",strtotime("-2 days"));
            $rs2=f("mv",""," WHERE sh='1' && sdate BETWEEN '$sd' AND '$td'");
            $div=4;
            $pgs=ceil(count($rs2)/$div);
            $now=(empty($_GET['p']))?1:$_GET['p'];
            $sl=array_slice($rs2,($now-1)*$div,$div);
            foreach($sl as $k => $v){
        ?>
        <table class="w-49 dib">
            <tr>
                <td><img src="<?=$v['post'];?>" style="width:80px"></td>
                <td>
                    <ul class="ul-i">
                        <li>片名：<?=$v['name'];?></li>
                        <li>分級：<img src="./icon/03C0<?=$v['rate']+1;?>.png" style="width:20px"><?=$rs[$v['rate']];?></li>
                        <li>上映時間：<?=$v['sdate'];?></li>
                    </ul>
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button onclick="gt('?do=intro&id=<?=$v['id'];?>')">劇情簡介</button><button onclick="gt('?do=ord&id=<?=$v['id'];?>')">線上訂票</button>
                </td>
            </tr>
        </table>
        <?php
            }
        ?>
        <div class="ct"> 
        <?php
            pgln($now,$pgs,"?p")
        ?>
        </div>
    </div>
</div>

<script>
    let iv = 2000;
    let ani = <?=f1("ani")["ord"];?>;
    let nx;
    setInterval(function(){
        if(nx == null){
            nx =$(".bg:visible").next();
            if(nx.length < 1){
                nx = $(".bg").eq(0);
            }
        }
        switch(ani){
            case 0:
                $(".bg:visible").hide(iv/2,function(){
                    nx.show(iv/2);
                    nx=null;
                })
                break;
            case 1:
                $(".bg:visible").fadeOut(iv/2,function(){
                    nx.fadeIn(iv/2);
                    nx=null;
                })
                break;
            case 2:
                $(".bg:visible").slideUp(iv/2,function(){
                    nx.slideDown(iv/2);
                    nx=null;
                })
                break;
        }
    },2000);

    $("#ml").on("click",function(){
        let ns = $(".sm:visible").eq(0).prev();
        if(ns.length > 0){
            $(".sm:visible").eq(3).hide();
            ns.show();
        }
    })
    $("#mr").on("click",function(){
        let ns = $(".sm:visible").eq(3).next();
        if(ns.length > 0){
            $(".sm:visible").eq(0).hide();
            ns.show();
        }
    })

    $(".sm").on("click",function(){
        nx = $(".bg").eq($(this).index());
    })

</script>