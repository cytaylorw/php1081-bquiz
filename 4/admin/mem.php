<h1 class="tc">會員管理</h1>

<table class="w100">
    <tr class="tt">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
        $rs=f($do);
        foreach($rs as $k => $v){
    ?>
    <tr class="pp">
        <td><?=$v["name"];?></td>
        <td><?=$v["acc"];?></td>
        <td><?=$v["rdate"];?></td>
        <td data-tb="<?=$do;?>" data-id="<?=$v["id"];?>"><button onclick="gt('?do=editmem&id=<?=$v['id'];?>')">修改</button><button class="del">刪除</button></td>
    </tr>
    <?php
        }
    ?>
</table>