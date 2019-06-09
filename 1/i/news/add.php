
<h4 class="cent"><?=$title2;?></h4>
<hr>
<form action="<?=$api;?>" method="post" enctype="multipart/form-data">
<table class="ma">
    <tr>
        <td class="ar"><?=$col2[0][0];?>：</td>
        <td class="al"><textarea name="<?=$col2[0][1];?>" cols="30" rows="3"></textarea></td>
    </tr>
    <tr>
        <td colspan="2" class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></td>
        <input type="hidden" name="sh" value="0">
    </tr>
</table>
</form>