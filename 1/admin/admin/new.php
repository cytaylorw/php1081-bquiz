<p class="t cent botli">管理者帳號</p>
<form method="post" action="api.php?do=save&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" enctype="multipart/form-data">
    <table width="100%">
        <tbody>
            <tr class="">
                <td >帳號：</td>
                <td ><input type="text" name="name" id=""></td>
            </tr>
            <tr class="">
                <td >密碼：</td>
                <td ><input type="text" name="file" id="" value=""></td>

            </tr>
            <tr class="">
                <td >確認密碼：</td>
                <td ><input type="text" name="" id="" value=""></td>

            </tr>
            <tr>
                <td><input type="submit" value="新增"><input type="reset" value="重置">
                <td></td>
                </td>
            </tr>
        </tbody>
    </table>

</form>