<fieldset>
    <legend>忘記密碼</legend>
    <form>
        <table>
            <tr>
                <td>請輸入信箱以查詢密碼</td>
            </tr>
            <tr>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td id="result"></td>
            </tr>
            <tr>
                <td><input type="button" value="尋找" id="sub"></td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    $(function(){
        $("#sub").on("click",function(){
            let email=$("#email").val();
            $.post("api.php?do=forget",{email},function(r){
                $("#result").text(r)
            })

        })
    })

</script>