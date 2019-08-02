<p class="t cent botli">新增動態文字廣告</p>
<form method="post" action="api.php?do=save&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" enctype="multipart/form-data">
    <table width="100%">
        <tbody>
            <!-- <tr class="">
                <td >標題區圖片：</td>
                <td ><input type="file" name="file" id=""></td>
            </tr> -->
            <tr class="">
                <td >動態文字廣告：</td>
                <td ><input type="text" name="name" id="" value=""></td>

            </tr>
            <tr>
                <td><input type="submit" value="新增"><input type="reset" value="重置">
                <td></td>
                </td>
            </tr>
        </tbody>
    </table>

</form>