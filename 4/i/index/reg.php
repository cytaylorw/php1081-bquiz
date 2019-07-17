<h1>會員註冊</h1>
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"><button id="chkAcc">檢測帳號</button></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="text" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct"><button id="reg">註冊</button><button id="reset">重置</button></div>

<script>
    $("#chkAcc").on("click",function(){
        let acc = $("#acc").val();
        if(acc != "admin"){
            $.post("api.php?do=chkAcc",{acc},function(r){
                if(r*1){
                    alert("此帳號已存在");
                }else{
                    alert("此帳號可使用");

                }
            })
        }else{
            alert("不可以使用admin");
        }
    })
    $("#reg").on("click",function(){
        let name = $("#name").val();
        let acc = $("#acc").val();
        let pw = $("#pw").val();
        let tel = $("#tel").val();
        let addr = $("#addr").val();
        let email = $("#email").val();

        if(acc != "admin"){
            $.post("api.php?do=chkAcc&tb=mem",{acc},function(r){
                if(r*1){
                    alert("此帳號已存在");
                }else{
                    $.post("api.php?do=reg&tb=mem",{name,acc,pw,tel,addr,email},function(){
                        alert("註冊成功");
                        lof("?do=login");
                    });
                }
            })
        }else{
            alert("不可以使用admin");
        }
    })
    $("#reset").on("click",function(){
        $("input").val("");
    })
</script>
