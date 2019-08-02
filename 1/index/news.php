<?php
					$items=find("news",["sh"=>1]);
					$p=(empty($_GET['p']))?1:$_GET['p'];				
					$div=5;
					$num=count($items);
					$pages=ceil($num/$div);
					$start=($p-1)*$div;				
					?>
				<!--正中央-->
				<div style="text-align:center;">
				
					<ul class="ssaa"  style="text-align:left;">
					<?php
						$news=array_slice($items,$start,$div);
										
										foreach($news as $k => $n){
											echo "<li>".mb_substr($n['name'],0,20)."<span class='all' style='display:none'>".$n['name']."</span></li>";
										}
					?>
					</ol>
					<?php
						pages($p,$pages,"?do=news&p");
					?>
				</div>
				<div id="altt"
						style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
					</div>
					<script>
						$(".ssaa li").hover(
							function () {
								$("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
								$("#altt").show()
							}
						)
						$(".ssaa li").mouseout(
							function () {
								$("#altt").hide()
							}
						)
					</script>
