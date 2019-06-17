<fieldset style="width:50%;padding:20px;margin:auto;">
    <legend>會員登入</legend>
    <form>
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td><input type="button" value="登入" onclick="login()"><input type="reset" value="清除"></td>
                <td class="r"><a href="?do=forget">忘記密碼</a><a href="?do=reg">尚未註冊</a></td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
    function login(){
        let acc = $("#acc").val();
        let pw = $("#pw").val();

        $.post("api.php?do=login",{acc,pw},function(x){
            console.log(x);
            switch(x*1){
                case 1:
                    location.href="admin.php";
                    break;
                case 2:
                    location.href="index.php";
                    break;
                case 3:
                    alert("密碼錯誤");
                    break;
                case 4:
                    alert("查無帳號");
                    break;
            }
            $("#acc,#pw").val("");
        })
    }

</script>