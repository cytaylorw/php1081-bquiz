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

$(".ed").on("click",function(){
    let tb = $(this).parent().data("tb");
    let id = $(this).parent().data("id");
    let name = prompt("請輸入");
    if(name != null){
        $.post("api.php?do=save&tb="+tb,{id,name},function(){
            location.reload();
        })
    }
})