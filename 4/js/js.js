// JavaScript Document
function lof(x)
{
	location.href=x
}

$(".del[data-id]").on("click",function(){
	let id = $(this).data("id");
	let tb = $(this).data("tb");
	$.post("api.php?do=del&tb="+tb,{id},function(){
		location.reload();
	})
})