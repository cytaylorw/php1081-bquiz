<?php
    $c1=rand(10,99);
    $c2=rand(10,99);

    // if(!empty($_SESSION['mem'])) gt("buycart.php");

?>
<h1>第一次購物</h1>
<button onclick="lof('?do=reg')">按此註冊</button>
<h1>會員登入</h1>
    <table class="w-80 ma">
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
            <td class="pp"><?="$c1 + $c2";?><input type="text" name="vcode" id="vcode"></td>
        </tr>
    </table>
    <div class="ct"><input type="button" value="確認" id="login"></div>
<script>
    let c1 = <?=$c1;?>;
    let c2 = <?=$c2;?>;
    $("#login").on("click",function(){
        let acc = $("#acc").val();
        let pw = $("#pw").val();
        let vcode = $("#vcode").val();
        
        if(vcode == (c1+c2)){
            $.post("api.php?do=login&tb=mem",{acc,pw},function(r){
                if(r*1){
                    lof("index.php");
                }else{
                    alert("對不起，您輸入的帳號或密碼有錯誤請您重新輸入");
                }
            })
        }else{
            alert("對不起，您輸入的驗證碼有錯誤請您重新輸入");
        }
    })
</script>