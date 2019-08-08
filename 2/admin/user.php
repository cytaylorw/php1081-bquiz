<fieldset>
    <legend>帳號管理</legend>
    <form action="api.php?do=edit&tb=user&pg=admin&pgdo=user" method="POST">
        <table class="ma">
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
                $users = find("user");
                foreach($users as $u){
            ?>
            <tr>
                <td><?=$u['acc'];?></td>
                <td><?=str_repeat("*",mb_strlen($u['pw']));?></td>
                <td><input type="checkbox" name="<?=$u['id'];?>[del]"></td>
            </tr>
            <?php
        }
            ?>
            <tr>
                <td colspan="3"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></td>
            </tr>
        </table>
    </form>

    <h1>新增會員</h1>
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


