$(".del").on("click",function(){
    let id = $(this).parent().data("id");
    let tb = $(this).parent().data("tb");
    $.post(`api.php?do=del&tb=${tb}&pg=admin&pgdo=${tb}`,{id},function(){
        location.reload();
    })
})
$(".edit").on("click",function(){
    let id = $(this).parent().data("id");
    let tb = $(this).parent().data("tb");
    let name = prompt("請輸入",$(this).parent().prev().text());
    if(name != null){
        $.post(`api.php?do=save&tb=${tb}&pg=admin&pgdo=${tb}`,{id,name},function(){
            location.reload();
        })
    }
})

$(".ons").on("click",function(){
    let id = $(this).parent().data("id");
    let tb = $(this).parent().data("tb");
    let ons = 1;
    $.post(`api.php?do=save&tb=${tb}&pg=admin&pgdo=${tb}`,{id,ons},function(){
        location.reload();
    })
})
$(".offs").on("click",function(){
    let id = $(this).parent().data("id");
    let tb = $(this).parent().data("tb");
    let ons = 0;
    $.post(`api.php?do=save&tb=${tb}&pg=admin&pgdo=${tb}`,{id,ons},function(){
        location.reload();
    })
})