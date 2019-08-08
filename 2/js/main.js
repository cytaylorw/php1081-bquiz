$(".tabs").on("click",function(){
    $('.info').hide().eq($(this).index()).show();
})
$(".types").on("click",function(){
    $('.info').hide();
    $('.list').hide().eq($(this).index()).show();
    $('.navtype').text($(this).text());
})
$(".list li").on("click",function(){
    $('.list').hide();
    $('.info').hide().eq($(this).parent().data('type')).show();
})

$('#reg').on("click",function(){
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let email = $('#email').val();
    if(acc && pw && pw2 && email){
        $.post("api.php?do=rc&tb=user",{acc,pw,email},function(r){
            // console.log(r);
            if(r*1){
                alert("帳號重複");
            }else{
                $.post("api.php?do=save&tb=user",{acc,pw,email},function(r){
                    alert("註冊成功，歡迎加入");
                    location.reload();
                })
            }
        })
    }else{
        alert("不可空白");
    }
})

function lof(href){
    location.href=href;
}