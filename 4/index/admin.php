
    <table class="ma">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt">驗證碼</td>
            <td class="pp"><?="$vc1 + $vc2";?><input type="text" name="val" id="val"></td>
        </tr>
    </table>
    <div class="tc"><input type="button" value="登入" id="login"></div>

<script>
    $("#login").on("click",function(){
        let sum=<?=$vc1 + $vc2;?>;
        let val=$("#val").val();
        let acc=$("#acc").val();
        let pw=$("#pw").val();
        if(val == sum){
            $.post("api.php?do=login&tb=admin",{acc,pw},function(r){
                if(r*1){
                    gt("admin.php");
                }else{
                    alert("帳號或密碼錯誤請您重新登入");
                }
            })
        }else{
            alert("對不起，您輸入的驗證碼有錯誤請您重新登入");
        }
    })
</script>