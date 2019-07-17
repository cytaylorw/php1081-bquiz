<div>首頁 > 分類網誌 > <span id="nav"></span></div>
<fieldset style="display:inline-block;width:15%">
    <legend>網誌分類</legend>
    <ul class="type">
        <li><a data-type="1">健康新知</a></li>
        <li><a data-type="2">菸害防治</a></li>
        <li><a data-type="3">癌症防治</a></li>
        <li><a data-type="4">慢性病防治</a></li>
    </ul>
</fieldset>
<fieldset style="display:inline-block;width:50%;vertical-align:top">
    <legend>文章列表</legend>
    <div id="list"></div>
    <div id="text"></div>
</fieldset>

<script>
    let news;
    $(function(){
        getPo(1);
        $(".type a").on("click",function(){
            let type=$(this).data("type");
            getPo(type);
        })

        $("#list").on("click","a",function(){
            $("#list").hide();
            $("#text").html(`<pre>${news[$(this).index()].text}</pre>`).show();
        })
    })

    function getPo(type){
        $("#nav").text($(`a[data-type="${type}"]`).text());
        $.post("api.php?do=po",{type},function(r){
                news = JSON.parse(r);
                console.log(news);
                let str="";
                news.forEach(function(n){
                    str+=`<div><a>${n.title}</a></div>`;
                })
                $("#text").hide();
                $("#list").html(str).show();
            })
    }
</script>