<fieldset>
    <legend>新增問卷</legend>
    <form action="api.php?do=newque&tb=que&pg=admin&pgdo=que" method="POST">
        <table class="ma">
            <tr>
                <td>問卷名稱</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <ul class="ul-list">
                        <li>選項<input type="text" name="opt[]"><input type="button" value="更多" id="more"></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="新增"><input type="reset" value="清除"></td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    $("#more").on("click",function(){
        $(this).parents("ul").append(`<li><input type="text" name="opt[]"></li>`);
    })
</script>