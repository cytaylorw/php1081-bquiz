<fieldset>
    <legend>新增問卷</legend>
    <form action="api.php?do=addQue" method="post">
        <table style="margin:auto;width:80%;">
            <tr>
                <td>問卷名稱</td>
                <td><input type="text" name="subj"></td>
            </tr>
            <tr>
                <td colspan="2" id="opt"><div>選項<input type="text" name="opt[]"><input type="button" value="更多" id="more"></div></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="新增"><input type="submit" value="清空"></td>
            </tr>
        </table>
    </form>

    </form>
</fieldset>

<script>
    $(function(){
        $("#more").on("click",function(){
            $("#opt").prepend(`<div>選項<input type="text" name="opt[]"></div>`);
        })
    })

</script>

