<p class="t cent botli">更新動畫圖片</p>
<form method="post" action="api.php?do=save&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>" enctype="multipart/form-data">
    <table width="100%">
        <tbody>
            <tr class="">
                <td >動畫圖片：</td>
                <td ><input type="file" name="file" id=""></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                <td><input type="submit" value="修改確定"><input type="reset" value="重置">
                <td></td>
                </td>
            </tr>
        </tbody>
    </table>

</form>