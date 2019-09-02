function gt(h){
    location.href=h;
}

$(".del").on("click",function(){
    let tb = $(this).parent().data("tb");
    let id = $(this).parent().data("id");
    $.post("api.php?do=del&tb="+tb,{id},function(){
        location.reload();
    })
})

$(".edit").on("click",function(){
    let tb = $(this).parent().data("tb");
    let id = $(this).parent().data("id");
    let name = prompt("請輸入");
    if(name != null){
        $.post("api.php?do=edit&tb="+tb,{id,name},function(){
            location.reload();
        })
    }
})

$(".delc").on("click",function(){
    let id = $(this).parent().data("id");
    $.post("api.php?do=delc",{id},function(){
        location.href="index.php?do=buycart";
    })
})

$(".on").on("click",function(){
    let tb = $(this).parent().data("tb");
    let id = $(this).parent().data("id");
    let sh = 1;
    $.post("api.php?do=save&tb="+tb,{id,sh},function(){
        location.reload();
    })
})

$(".off").on("click",function(){
    let tb = $(this).parent().data("tb");
    let id = $(this).parent().data("id");
    let sh = 0;
    $.post("api.php?do=save&tb="+tb,{id,sh},function(){
        location.reload();
    })
})
