<style>
    .room *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .room{
        width: 540px;
        height: 370px;
        margin:auto;
        background-image: url("./icon/03D04.png");
        padding-top: 17px;
    }

    .info{
        width: 540px;
        height: 150px;
        background-color: #ccc;
        margin:auto;
    }

    .sr{
        display: inline-flex;
        padding-left: 111px;
    }

    .seat{
        width: 63px;
        height: 87px;
        position: relative;
    }

    .emp{
        background: url("./icon/03D02.png") no-repeat center;
    }

    .bked{
        background: url("./icon/03D03.png") no-repeat center;
    }

    .chk{
        position: absolute;
        right: 0;
        bottom: 6px;
    }
</style>

<form id="order">
    <ul style="list-style-type:none;padding:0;margin:auto;width:40%">
        <li>電影：<select name="movie" id="movie">
        <?php
            $today=date("Y-m-d");
            $sDate=date("Y-m-d",strtotime("-2 days"));
            $mvs=qa("SELECT * FROM movie WHERE rDate BETWEEN '$sDate' AND '$today' && sh='1' ORDER BY rank");
            foreach($mvs as $m){
                echo "<option value='".$m["id"]."'".((!empty($_GET["id"]) && $_GET["id"]==$m["id"])?" selected":"").">".$m["name"]."</option>";
            }
        ?>
        </select></li>
        <li>日期：<select name="date" id="date">
        <?php
        $first=(empty($_GET["id"]))?$mvs[0]:find("movie",$_GET["id"])[0];
        $fdate=strtotime($first["rDate"]);
        for($i=0;$i<3;$i++){
            $d=date("Y-m-d",strtotime("+$i days",$fdate));
            if($d >= $today) echo "<option value='".$d."'>".$d."</option>";
        }
        ?>
        </select></li>
        <li>場次：<select name="session" id="session">
        <?php
            $ses=[
                6=> "14:00~16:00",
                5=> "16:00~18:00",
                4=> "18:00~20:00",
                3=> "20:00~22:00",
                2=> "22:00~24:00",
            ];
            $now=ceil((24-date("G"))/2);
            $start=($now<=6)?$now:6;
            for($i=$start;$i>=2;$i--){
                $booked=20-qa("SELECT SUM(qt) as q FROM ord WHERE movie='".$first["name"]."' && odate='".$today."' && ses='".$ses[$i]."'")[0]["q"];
                echo "<option value='".$ses[$i]."'>".$ses[$i]." 剩餘座位 $booked</option>";
            }
        ?>
        </select></li>
        <li>
            <input type="button" value="確定" id="book">
            <input type="reset" value="重置">
        </li>
    </ul>
</form>

<div id="seat" style="display:none">
    <div class="room"></div>
    <div class="info">
        您選擇的電影是：<span id="mname"></span><br>
        您選擇的時刻是：<span id="mTime"></span><br>
        您已經勾選<span id="qt"></span>張票，最多可以購買四張票
        <div class="ct">
            <button id="porder">上一步</button><button id="chkout">訂購</button>
        </div>
    </div>
</div>

<div id="result" style="display:none;width:50%;margin:auto">
    感謝您的訂購，您的訂單編號是：<span id="no"></span><br>
    電影名稱：<span id="rname"></span><br>
    日期：<span id="rdate"></span><br>
    場次時間：<span id="rses"></span><br>
    座位：<br><span id="rseat"></span>
</div>

<script>
    $("#movie").on("change",function(){
        location.href="?do=order&id="+$(this).val();
    })

    $("#date").on("change",function(){
        movie=$("#movie option:selected").text();
        odate=$("#date option:selected").text();
        $.post("api.php?do=qtSession",{movie,odate},function(r){
            $(`#session`).html(r);
        })
    })

    $("#book").on("click",function(){
        $("#order").hide();
        let movie=$("#movie option:selected").text();
        let odate=$("#date option:selected").text();
        let ses=$("#session option:selected").val();
        $("#mname").text(movie);
        $("#mTime").text(odate+" "+ses);
        $("#qt").text(0);
        let str="";
        let seat=[];
        $.post("api.php?do=getOrd",{movie,odate,ses},function(r){
            seat = JSON.parse(r);
            for(let i=0;i<4;i++){
                str+="<div class='sr'>";
                for(let j=0;j<5;j++){
                    if(seat.indexOf(`${i+1}排${j+1}號`) > -1){
                        str+=`<div class='bked seat ct'>${i+1}排${j+1}號</div>`;
                    }else{                       
                        str+=`<div class='emp seat ct'>${i+1}排${j+1}號<input type="checkbox" id="no${i}${j}" class="chk" value="${i+1}排${j+1}號"></div>`;
                    }
                }
                str+="</div>";
            }
            $(".room").empty().html(str);
            $("#seat").show();
        })
    })

    $(".room").on("change",".chk",function(){
        if($(".chk:checked").length > 4){
            $(this).prop("checked",false);
        }else{
            $("#qt").text($(".chk:checked").length);
        }
        if($(this).prop("checked")){
            $(this).parent().removeClass("emp").addClass("bked");
        }else{
            $(this).parent().removeClass("bked").addClass("emp");
        }
    })

    $("#porder").on("click",function(){
        $("#seat").hide();
        $("#order").show();
    })

    $("#chkout").on("click",function(){
        $("#seat").hide();
        let movie=$("#movie option:selected").text();
        let odate=$("#date option:selected").text();
        let ses=$("#session option:selected").val();
        let seat=[];
        $(".chk:checked").each(function(i,el){
            seat.push($(el).val());
        })
        $.post("api.php?do=order",{movie,odate,ses,seat},function(no){
            $("#no").text(no);
            $("#rname").text(movie);
            $("#rdate").text(odate);
            $("#rses").text(ses);
            $("#rseat").html(seat.join("<br>")+`<br>共${seat.length}張電影票`);
            $("#result").show();
        })
    })
</script>