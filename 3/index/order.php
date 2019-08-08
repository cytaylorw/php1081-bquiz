<div id="show">
    <form action="">
    <table class="ma">
        <tr>
            <td>電影</td>
            <td><select name="name" id="name">
                <?php
                    
                    $d1 = date("Y-m-d",strtotime("-2 days"));
                    $mvs=find("movie",null," WHERE sdate BETWEEN '$d1' AND '".date("Y-m-d")."'");
                    $id=(empty($_GET['id']))?$mvs[0]['id']:$_GET['id'];
                    foreach($mvs as $m){
                        echo "<option value='".$m['name']."'".((!empty($_GET['id']) && $m['id']==$id)?"selected":"").">".$m['name']."</option>";
                    }
                ?>
                </select></td>
        </tr>
        <tr>
            <td>日期</td>
            <td><select name="sdate" id="sdate">

            </select></td>
        </tr>
        <tr>
            <td>場次</td>
            <td><select name="stime" id="stime">

            </select></td>
        </tr>
        <tr>
            <td><input type="button" value="確定"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
        </table>
        </form>
</div>

<script>
    $(function(){
        
    })
</script>