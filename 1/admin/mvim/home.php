﻿					<p class="t cent botli">動畫圖片管理</p>
					<form method="post" action="api.php?do=edit&tb=<?=$do;?>&pg=admin&pgdo=<?=$do;?>">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="45%">動畫圖片</td>
									<!-- <td width="23%">替代文字</td> -->
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>
								<?php
									$items=find($do);
									foreach($items as $k => $i){
								?>
								<tr class="">
									<td width="45%"><embed src="<?=$i['file'];?>" style="width:300px"></td>
									<!-- <td width="23%"><input type="text" name="<?=$i['id'];?>[name]" id="" value="<?=$i['name'];?>" style="width:300px"></td> -->
									<input type="hidden" name="<?=$i['id'];?>[sh]" value="0">
									<td width="7%"><input type="checkbox" name="<?=$i['id'];?>[sh]" value="1" <?=($i['sh'])?"checked":"";?>></td>
									<td width="7%"><input type="checkbox" name="<?=$i['id'];?>[del]" id=""></td>
									<td><input type="button" value="更新動畫" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=<?=$do;?>&id=<?=$i['id'];?>&#39;)"></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<td width="200px">
										<input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=<?=$do;?>&#39;)"
											value="新增動畫圖片"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
									</td>
								</tr>
							</tbody>
						</table>

					</form>