<div class="ct"><button onclick="lof('?do=newAdmin')">新增管理員</button></div>
<table class="ma w-80">
    <tr class="tt">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
        $rows=find($do);
        foreach($rows as $k => $v){
    ?>
    <tr class="pp">
        <td><?=$v['acc'];?></td>
        <td><?=str_repeat("*",mb_strlen($v['pw']));?></td>
        <td data-id="<?=$v['id'];?>" data-tb="<?=$do;?>"><button onclick="lof('?do=editAdmin&id=<?=$v['id'];?>')">修改</button><button class="del">刪除</button></td>
    </tr>
    <?php
        }
    ?>
</table>