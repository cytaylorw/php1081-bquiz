
<h4 class="cent"><?=$title2;?></h4>
<hr>
<form action="<?=$api;?>" method="post" enctype="multipart/form-data">
<table class="ma">
    <tr>
        <td class="ar"><?=$col2[1][0];?>：</td>
        <td class="al"><input type="text" name="<?=$col2[1][1];?>"></td>
    </tr>
    <tr>
        <td class="ar"><?=$col2[0][0];?>：</td>
        <td class="al"><input type="text" name="<?=$col2[0][1];?>"></td>
    </tr>
    <tr>
        <td colspan="2" class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></td>
        <input type="hidden" name="sh" value="0">
        <input type="hidden" name="pid" value="0">
    </tr>
</table>
</form>