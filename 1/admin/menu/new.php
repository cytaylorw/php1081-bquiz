<p class="t cent botli">新增主選單</p>
<form method="post" action="api.php?do=save&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" enctype="multipart/form-data">
    <table width="100%">
        <tbody>
            <tr class="">
                <td >主選單名稱：</td>
                <td ><input type="text" name="name" id=""></td>
            </tr>
            <tr class="">
                <td >主選單連結網址：</td>
                <td ><input type="text" name="file" id="" value=""></td>

            </tr>
            <input type="hidden" name="pid" value="0">
            <tr>
                <td><input type="submit" value="新增"><input type="reset" value="重置">
                <td></td>
                </td>
            </tr>
        </tbody>
    </table>

</form>