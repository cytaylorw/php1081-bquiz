<fieldset>
    <legend>會員登入</legend>
    <form id="form1">
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
                <td><input type="button" value="登入" id="sub"><input type="reset" value="清除"></td>
                <td><a href="?do=forget">忘記密碼</a><a href="?do=reg">尚未註冊</a></td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    $(function(){
        $("#sub").on("click",function(){
            let acc=$("#acc").val();
            let pw=$("#pw").val();
            if(acc && pw){
                $.post("api.php?do=login",{acc,pw},function(r){
                    console.log(r);
                    if(r == "1"){
                        location.href=(acc=="admin")?"admin.php":"index.php";
                    }else if(r == "2"){
                        alert("密碼錯誤");
                    }else if(r == "3"){
                        alert("查無帳號");
                    }
                    form1.reset();
                })
            }else{
                alert("不可空白");
            } 
        })
    })

</script>