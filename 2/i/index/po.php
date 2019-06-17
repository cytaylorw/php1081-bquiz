<div>目前位置：首頁 > 分類網誌 > <span id="nav">健康新知</span></div>
<fieldset style="width:20%;display:inline-block;vertical-align:top;">
    <legend>網誌分類</legend>
    <ul class="type">
        <li><a>健康新知</a></li>
        <li><a>菸害防治</a></li>
        <li><a>癌症防治</a></li>
        <li><a>慢性病防治</a></li>
    </ul>
</fieldset>
<fieldset style="width:70%;display:inline-block;">
    <legend>文章列表</legend>
    <div id='list'></div>
    <div id="text"></div>
</fieldset>

<script>
    let article;
    getList(1); 
    $(".type li").on("click",function(){
        $("#nav").html($(this).text());
        let type = $(this).index()+1;
        getList(type);        
    })

    function getList(type){
        $.post("api.php?do=getPo",{type},function(res){
            article = JSON.parse(res);
            console.log(article);
            let list="";
            article.forEach((art,idx) => {
                list+=`<div><a href="javascript:showPost(${idx})">${art.title}</a></div>`;
            });
            $("#text").hide();
            $("#list").html(list).show();
        })
    }

    function showPost(idx){
        $("#list").hide();
        $("#text").html(`<pre>${article[idx].text}</pre>`).show();
        
    }
</script>