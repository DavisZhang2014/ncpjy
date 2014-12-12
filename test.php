<form action="modifyclass.php?action=modify" method="post">
			<input type="hidden" name="id" value=<?php echo $_html['id']?>> 
			<dl class="food_intro">	
				<dt>名称: <input type="text" name="title" value=<?php echo $_html['name']?> ></input></dt>
				<dt>类别：<select name="sort">
						<option value="0">荤菜</option>
						<option value="1">素菜</option>
						<option value="2">凉菜</option>
						<option value="3">汤类</option>
						<option value="4">粥类</option>
					</select>
				</dt>
				<dd class="food_count">价格: <input type="text" name="price" value=<?php echo $_html['price']?> ></input></dd>
				<dd class="food_count">数量: <input type="text" name="count" value=<?php echo $_html['stock']?> size="3"></input></dd>
				<dd class="food_mater">用料：<textarea name="material" rows="2" cols="46" ><?php echo $_html['material']?></textarea></dd>
				<dd class="food_sea">调料：<textarea name="seasoning" rows="2" cols="46" ><?php echo $_html['seasoning']?></textarea></dd>
			</dl>
			<dl class="method">
				<dt>做法：</dt>
				<dd><textarea name="content" rows="8" cols="80"><?php echo $_html['content']?></textarea></dd>
				<dd><input type="submit" value="修改" /></dd>
			</dl>
		</form>
		</div>
	</div>