<h1 class="tc">管理者帳號管理</h1>
<div class="tc"><button onclick="gt('?do=newadmin')">新增管理員</button></div>
<table class="w100">
    <tr class="tt">
        <td>帳號</td>
        <td>密碼</td>
        <td>操作</td>
    </tr>
    <?php
        $rs=f($do);
        foreach($rs as $k => $v){
    ?>
    <tr class="pp">
        <td><?=$v["acc"];?></td>
        <td><input type="password" name="pw" id="pw" value="<?=$v["pw"];?>" readonly></td>
        <td data-tb="<?=$do;?>" data-id="<?=$v["id"];?>">
            <?php
                if($v["acc"]=="admin"){
                    echo "此帳號為最高權限";
                }else{
            ?>
            <button onclick="gt('?do=editadmin&id=<?=$v['id'];?>')">修改</button>
            <button class="del">刪除</button>
                <?php
                }
                ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>