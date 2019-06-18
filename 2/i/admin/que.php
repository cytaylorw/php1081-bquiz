<fieldset>
    <legend>問卷管理</legend>
    <form action="api.php?do=addQue" method="post">
        <table>
            <tr>
                <td style="background-color:#ddd">問卷名稱</td>
                <td><input type="text" name="title" id=""></td>
            </tr>
            <tr>
                <td colspan="2" style="padding:0;">
                <table style="width:100%;margin:0;background-color:#ddd">
                    <tr>
                        <td id="newOp">
                        </td>
                        <td style="vertical-align:bottom;"><input type="button" value="更多" onclick="more()"></td>
                    </tr>
                </table>
                </td>

            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="新增"><input type="reset" value="清空"></td>
            </tr>
        </table>
    </form>
    </fieldset>

    <script>
        more();
        function more(){
            $("#newOp").append(`<div class="newOp">選項 <input type="text" name="opt[]" id=""></div>`)
        }
    </script>