<fieldset>
    <legend>會員註冊</legend>
        <div style="color:red">*請設定您要註冊的帳號及密碼(最常12個字元)Step:登入</div>
        <form action="?do=reg" method="POST">
            <table>
                <tr>
                    <td>Step1:登入帳號</td>
                    <td><input type="text" name="acc" id="acc"></td>
                </tr>
                <tr>
                    <td>Step2:登入密碼</td>
                    <td><input type="password" name="pw" id="pw"></td>
                </tr>
                <tr>
                    <td>Step3:再次確認密碼</td>
                    <td><input type="password" name="pw2" id="pw2"></td>
                </tr>
                <tr>
                    <td>Step4:信箱(忘記密碼時使用)</td>
                    <td><input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><input type="button" value="註冊" id="reg"><input type="reset" value="清除"></td>
                    <td></td>
                </tr>
            </table>
        </form>
</fieldset>