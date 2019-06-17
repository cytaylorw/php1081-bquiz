<fieldset style="width:50%;padding:20px;margin:auto;">
    <legend>忘記密碼</legend>
    <form>
        <table>
            <tr>
                <td>請輸入信箱以查詢密碼</td>
            </tr>
            <tr>
                <td><input type="text" name="email" id="email" style="width:300px;"></td>
            </tr>
            <tr>
                <td id="result"></td>
            </tr>
            <tr>
                <td><input type="button" value="尋找" onclick="forget()"></td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    function forget(){
        let email = $("#email").val();
        $.post("api.php?do=forget",{email},function(res){
            $("#result").text(res);
        })
    }


</script>