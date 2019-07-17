<?php
    
?>
<h1>管理登入</h1>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
                $a=rand(10,99);
                $b=rand(10,99);
                $_SESSION["chk"]=$a+$b;
                echo "$a + $b = ";
            ?>
            <input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<div class="ct"><button id="login">確認</button></div>

<script>
    $("#login").on("click",function(){
        let acc=$("#acc").val();
        let pw=$("#pw").val();
        let chk=$("#chk").val();
        if(chk == '<?=$_SESSION["chk"];?>'){
            // alert("驗證成功");
            $.post("api.php?do=chkAcc&tb=admin",{acc,pw},function(r){
                console.log(r);
                if(r*1){
                    lof("backend.php");
                }else{
                    alert("帳號或密碼錯誤，請重新登入。");
                }
            })
        }else{
            alert("對不起，您輸入的驗證碼錯誤，請重新登入");
        }
    })
</script>