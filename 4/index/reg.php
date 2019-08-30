<h1 class="tc">會員註冊</h1>

<form action="api.php?do=save&tb=mem&pg=index&pgdo=login" method="POST">
    <table class="ma">
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"><input type="button" value="檢測帳號" id="chk"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <td class="tt">住址</td>
            <td class="pp"><input type="text" name="addr" id="addr"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <input type="hidden" name="rdate" value="<?=$td;?>">
    <div class="tc"><input type="submit" value="註冊"><input type="reset" value="重置"></div>
</form>

<script>
    $("#chk").on("click",function(){
        let acc = $("#acc").val();
        $.post("api.php?do=rc&tb=mem",{acc},function(r){
            if(r*1 || acc=="admin"){
                alert("帳號已存在");
            }else{
                alert("帳號可使用");

            }
        })
    })
</script>