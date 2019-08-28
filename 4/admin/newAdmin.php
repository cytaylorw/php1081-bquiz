<h1 class="ct">新增管理員帳號</h1>
<form action="api.php?do=save&tb=admin&pg=admin&pgdo=admin" method="POST">
    <table class="w-80 ma">
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id=""></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" id=""></td>
        </tr>
        <tr>
            <td class="tt">權限</td>
            <td class="pp">
                <ul class="ul-list">
                    <!-- <input type="hidden" name="per[]" value="0"> -->
                    <li><input type="checkbox" name="per[]" value="1">商品分類與管理</li>
                    <li><input type="checkbox" name="per[]" value="2">訂單管理</li>
                    <li><input type="checkbox" name="per[]" value="3">會員管理</li>
                    <li><input type="checkbox" name="per[]" value="4">頁尾版權區管理</li>
                    <li><input type="checkbox" name="per[]" value="5">最新消息區管理</li>
                </ul>
            </td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>