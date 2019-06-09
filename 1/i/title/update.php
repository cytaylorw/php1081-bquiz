
<h4 class="cent"><?=$title3;?></h4>
<hr>
<form action="<?=$api;?>" method="post" enctype="multipart/form-data">
<table class="ma">
    <tr>
        <td class="ar"><?=$col3[0][0];?>：</td>
        <td class="al"><input type="file" name="<?=$col3[0][1];?>"></td>
    </tr>
    <tr>
        <td colspan="2" class="cent"><input type="submit" value="更新"><input type="reset" value="重置"></td>
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    </tr>
</table>
</form>