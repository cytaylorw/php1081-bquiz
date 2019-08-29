<style>
    .em{
        width: 40px;
        height: 60px;
        background: url("./icon/03D02.png") center no-repeat;
    }
    .bk{
        width: 40px;
        height: 60px;
        background: url("./icon/03D03.png") center no-repeat;
    }
</style>

<div id="mv">
    <form action="">
        <table class="ma">
            <tr>
                <td>電影</td>
                <td><select name="name" id="name">
                    <?php
                        $td=date("Y-m-d");
                        $sd=date("Y-m-d",strtotime("-2 days"));
                        $rs=f("mv",""," WHERE sdate BETWEEN '$sd' AND '$td'");
                        $m;
                        foreach($rs as $k => $v){
                            if(!empty($_GET['id']) && $_GET['id']==$v['id']){
                                $m=$v;
                                echo "<option value='".$v['id']."' selected>".$v['name']."</option>";
                            }else{

                                echo "<option value='".$v['id']."'>".$v['name']."</option>";
                            }
                        }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td>日期</td>
                <td><select name="odate" id="odate">
                <?php
                        for($i=0;$i<=2;$i++){
                            $d=date("Y-m-d",strtotime($m["sdate"]." +$i days"));
                            if($d >= $td){
                                if(!empty($_GET['date']) && $_GET['date']==$d){

                                    echo "<option value='$d' selected>$d</option>";
                                }else{

                                    echo "<option value='$d'>$d</option>";
                                }}
                        }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td>場次</td>
                <td><select name="ses" id="ses">
    
                </select></td>
            </tr>
        </table>
        <div class="ct"><input type="button" value="確定" id="ok1"><input type="reset" value="重置"></div>
    </form>
</div>
<div id="seat" class="dn">
    <table id="st" class="ma"></table>
    <ul class="ul-i tc">
        <li>您選擇的電影是：<span id="smv"></span></li>
        <li>您選擇的時刻是：<span id="stime"></span></li>
        <li>您已經勾選了<span id="num"></span>張票，最多可以購買四張</li>
        <li><input type="button" value="確定" id="bt1"><input type="button" value="訂購" id="ord"></li>
    </ul>
</div>
<div id="result" class="dn">
    
</div>

<script>
    function ses(){
        let name = $("#name option:selected").text();
        let odate = $("#odate option:selected").text();
        // let ses = $("#ses option:selected").text();
        $.post("api.php?do=getses",{name,odate},function(r){
            // console.log(r);
            $("#ses").html(r);
        })
    }
    ses();

    $("#name, #odate").on("change",function(){
        let name = $("#name option:selected").val();
        let odate = $("#odate option:selected").val();
        gt(`?do=ord&id=${name}&date=${odate}`);
    })

    $("#ok1").on("click",function(){
        $("#mv").hide();
        let name = $("#name option:selected").text();
        let odate = $("#odate option:selected").text();
        let ses = $("#ses option:selected").val();
        $("#smv").text(name);
        $("#stime").text(odate+" "+ses);
        $("#num").text(0);
        $.post("api.php?do=getseat",{name,odate,ses},function(r){
            // console.log(r);
            let ss = JSON.parse(r);
            let h="";
            for(let i=1;i<=4;i++){
                h+="<tr>";
                for(let j=1;j<=5;j++){
                    if(ss.includes(`${i}排${j}號`)){
                        h+=`<td class="bk">${i}排${j}號</td>`;
                    }else{
                        h+=`<td class="em">
                            ${i}排${j}號
                            <input type="checkbox" name="seat[]" class="seats" value="${i}排${j}號">
                            </td>`;
                    }
                }
                h+="</tr>";
            }
            $("#st").html(h);
        })
        
        $("#seat").show();
    })

    $("#st").on("click",".seats",function(){
        if($(".seats:checked").length > 4){
            $(this).attr("checked",false);
        }else{
            console.log($(".seats:checked").length);
            $("#num").text($(".seats:checked").length);
        }
    })

    $("#bt1").on("click",function(){
        $("#seat").hide();
        $("#mv").show();
    })

    $("#ord").on("click",function(){
        let name = $("#name option:selected").text();
        let odate = $("#odate option:selected").text();
        let ses = $("#ses option:selected").val();
        let total = $(".seats:checked").length;
        let seat = [];
        $(".seats:checked").each(function(){
            seat.push($(this).val());
        })
        $.post("api.php?do=order&tb=ord",{name,odate,ses,seat,total},function(no){
            
            seat.join(",");
            $("#result").html(`<table class="ma">
        <tr>
            <td>${no}</td>
        </tr>
        <tr>
        <td>${name}</td>
        </tr>
        <tr>
        <td>${odate}</td>
        </tr>
        <tr>
        <td>${ses}</td>
        </tr>
        <tr>
        <td>${seat}</td>
        </tr>
        <tr>
            <td><button onclick="gt('index.php')">確認</button></td>
        </tr>
    </table>
            `);
            $("#seat").hide();
            $("#result").show();
        })
    })
</script>