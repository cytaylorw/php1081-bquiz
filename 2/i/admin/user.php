<fieldset>
    <legend>帳號管理</legend>
    <form action="api.php?do=delUser" method="post">
        <table style="margin:auto;">
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $user=find("user");
            
            foreach($user as $u){
            ?>
            <tr>
                <td><?=$u["acc"]?></td>
                <td><?=str_repeat("*",mb_strlen($u["pw"]))?></td>
                <td><input type="checkbox" name="del[]" value="<?=$u["id"]?>"></td>
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
    <form>
    <table>
        <tr>
            <td colspan="2" style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
        </tr>
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
            <td><input type="button" value="新增" id="sub"><input type="reset" value="清除"></td>
            <td></td>
        </tr>
    </table>
    </form>
</fieldset>

<script>
    $(function(){
        $("#sub").on("click",function(){
            let acc=$("#acc").val();
            let pw=$("#pw").val();
            let pw2=$("#pw2").val();
            let email=$("#email").val();
            if(acc && pw && pw2 && email){
                $.post("api.php?do=reg",{acc,pw,email},function(r){
                    alert((r*1)?"註冊完成，歡迎加入":"帳號重複");
                    if(r*1) location.href="admin.php?do=user";
                })
            }else{
                alert("不可空白");
            } 
        })
    })

</script>