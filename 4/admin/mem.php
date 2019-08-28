<!-- <div class="ct"><button onclick="lof('?do=newAdmin')">新增管理員</button></div> -->
<h1 class="ct">會員管理</h1>
<table class="ma w-80">
    <tr class="tt">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>管理</td>
    </tr>
    <?php
        $rows=find($do);
        foreach($rows as $k => $v){
    ?>
    <tr class="pp">
        <td><?=$v['name'];?></td>
        <td><?=$v['acc'];?></td>
        <td><?=$v['rdate'];?></td>
        <!-- <td><?=str_repeat("*",mb_strlen($v['pw']));?></td> -->
        <td data-id="<?=$v['id'];?>" data-tb="<?=$do;?>"><button onclick="lof('?do=editMem&id=<?=$v['id'];?>')">修改</button><button class="del">刪除</button></td>
    </tr>
    <?php
        }
    ?>
</table>