<fieldset>
    <legend>新增問卷</legend>
    <form action="api.php?do=addQue" method="post">
        <table>
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td colspan="2" id="newOp" class="clo">
                    選項 <input type="text" name="opt[]" id="">
                    <input type="button" value="更多" onclick="more()">
                </td>

            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="新增"><input type="reset" value="清空"></td>
            </tr>
        </table>
    </form>
    </fieldset>

    <script>
        function more(){
            $("#newOp").prepend(`選項 <input type="text" name="opt[]" id=""><br>`)
        }
    </script>