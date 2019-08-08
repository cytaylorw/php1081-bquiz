<fieldset>
    <legend>忘記密碼</legend>
        <form action="?do=forget" method="POST">
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
                    <td><input type="button" value="尋找" id="forget"></td>
                </tr>
            </table>
        </form>
</fieldset>

<script>
    $('#forget').on('click',function(){
        let email = $('#email').val();
        if(email){
            $.post('api.php?do=forget&tb=user',{email},function(r){
                $('#result').text(r);
            })
        }
    })
</script>