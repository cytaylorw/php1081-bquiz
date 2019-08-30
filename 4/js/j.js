function gt(h){
    location.href=h;
}

$(".del").on("click",function(){
    let id = $(this).parent().data("id");
    let tb = $(this).parent().data("tb");
    $.post("api.php?do=del&tb="+tb,{id},function(){
        location.reload();
    })
})

$(".delc").on("click",function(){
    let id = $(this).parent().data("id");
    $.post("api.php?do=delc",{id},function(r){
        // console.log(r);
        gt("?do=buycart");
    })
})

$(".edit").on("click",function(){
    let id = $(this).parent().data("id");
    let tb = $(this).parent().data("tb");
    let name = prompt("請輸入名稱");
    if(name != null){
        $.post("api.php?do=save&tb="+tb,{id,name},function(){
            location.reload();
        })
    }
})

$(".off").on("click",function(){
    let id = $(this).parent().data("id");
    let tb = $(this).parent().data("tb");
    let sh = 0;
    $.post("api.php?do=save&tb="+tb,{id,sh},function(){
        location.reload();
    })
})

$(".on").on("click",function(){
    let id = $(this).parent().data("id");
    let tb = $(this).parent().data("tb");
    let sh = 1;
    $.post("api.php?do=save&tb="+tb,{id,sh},function(){
        location.reload();
    })
})