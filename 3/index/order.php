<style>
    #seat table{
        boder: 1px solid black;
    }

    #seat table td{
        width: 60px;
        height:80px;
    }

    .bk{
        background: url("./icon/03D03.png") bottom no-repeat;
    }
    .em{
        background: url("./icon/03D02.png") bottom no-repeat;
    }
</style>

<div id="show" class="wrap">
    <form action="">
    <table class="ma">
        <tr>
            <td>電影</td>
            <td><select name="name" id="name">
                <?php
                    
                    $d1 = date("Y-m-d",strtotime("-2 days"));
                    $mvs=find("movie",null," WHERE sdate BETWEEN '$d1' AND '".date("Y-m-d")."'");
                    $id=(empty($_GET['id']))?$mvs[0]['id']:$_GET['id'];
                    $mv;
                    foreach($mvs as $m){
                        if($m['id']==$id){
                            $mv=$m;
                            echo "<option value='".$m['id']."' selected>".$m['name']."</option>";
                        }else{
                            echo "<option value='".$m['id']."'>".$m['name']."</option>";

                        }
                    }
                ?>
                </select></td>
        </tr>
        <tr>
            <td>日期</td>
            <td><select name="sdate" id="sdate">
                <?php
                    for($i=0;$i<3;$i++){
                        $d = date("Y-m-d",strtotime($mv['sdate']." +$i days"));
                        if( $d >= date("Y-m-d")){
                            echo "<option value='$d'>$d</option>";
                        }
                    }
                ?>
            </select></td>
        </tr>
        <tr>
            <td>場次</td>
            <td><select name="stime" id="stime">

            </select></td>
        </tr>
        <tr>
            <td><input type="button" value="確定" id="ok1"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
        </table>
        </form>
</div>

<div id="seat" class="wrap" style="display:none">
    <div id="seattable">
    </div>
    <div class="ma" style="width:350px;">
        您選擇的電影是：<span id="seatname"></span><br>
        您選擇的時刻是：<span id="seattime"></span><br>
        您已經勾選<span id="sel"></span>最多購買四張票<br>
        <input type="button" value="上一步" id="back">
        <input type="button" value="訂購" id="buy">
    </div>
</div>

<div id="result" class="wrap" style="display:none"></div>

<script>

    $('#name').on('change',function(){
        location.href='?do=order&id='+$(this).val();
    })

    $('#sdate').on('change',function(){
        getTimes();
    })

    function getTimes(){
        let name = $('#name option:selected').text();
        let sdate = $('#sdate').val();
        $.post("api.php?do=getTimes",{name,sdate},function(r){
            $('#stime').html(r);
        })
    }
    getTimes();

    $('#ok1').on('click',function(){
        $('.wrap').hide();
        let name = $('#name option:selected').text();
        let sdate = $('#sdate').val();
        let stime = $('#stime').val();
        $('#seatname').text(name);
        $('#seattime').text(sdate+" "+stime);
        $.post("api.php?do=getSeat",{name,sdate,stime},function(r){
            seat=JSON.parse(r);
            str="<table class='ma'>";
            for(let i=1;i<=4;i++){
                str+='<tr>';
                for(let j=1;j<=5;j++){
                    if(seat.includes(`${i}排${j}號`)){
                        str+=`<td class='bk'>${i}排${j}號</td>`;
                    }else{
                        str+=`<td class='em'>${i}排${j}號 <input type="checkbox" name="seat[]" class="seat" value='${i}排${j}號'></td>`;
                    }
                }
                str+='</tr>';
            }
            str+='</table>';
            $('#seattable').html(str);
            $('#sel').text(0);
            $('#seat').show();
        })


    })

    $('#seat').on("click",".seat",function(){
        if($(".seat:checked").length > 4){
            $(this).attr('checked',false);
        }else{
            $('#sel').text($(".seat:checked").length);
        }
    })

    $('#back').on('click',function(){
        $('.wrap').hide();
        $('#show').show();
    })

    $('#buy').on('click',function(){
        let name = $('#name option:selected').text();
        let sdate = $('#sdate').val();
        let stime = $('#stime').val();
        let seat=[];
        $('.seat:checked').each(function(){
            seat.push($(this).val());
        });
        let total = $('.seat:checked').length;
        console.log({name,sdate,stime,seat,total});
        $.post("api.php?do=order",{name,sdate,stime,seat,total},function(r){
            $('.wrap').hide();
            seat.join(',');
            let res =`
            <table class="ma">
                <tr>
                    <td>訂單編號:${r}</td>
                </tr>
                <tr>
                    <td>電影名稱:${name}</td>
                </tr>
                <tr>
                    <td>日期:${sdate}</td>
                </tr>
                <tr>
                    <td>場次：${stime}</td>
                </tr>
                <tr>
                    <td>座位:${seat} <br>
                        共${total}張票
                    </td>
                </tr>
                <tr>
                    <td><input type="button" value="確定" onclick="location.href='index.php'"></td>
                </tr>
            </table>
            `;
            $('#result').html(res).show();
        })
    })
</script>


