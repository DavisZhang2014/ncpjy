<?php
/**
* TestGuest Version1.0
* ================================================
* Copy 2014
* Web: http://www.yc60.com
* ================================================
* Author:zhangshuhui
* Date: 2014-6-26
*/
if (!defined('IN_TG'))		//防止恶意调用
{
	exit('非法调用');
}

?>
<div id="member_sidebar">
	<h2>中心导航</h2>
	<dl>
		<dt>账户管理</dt>
		<dd><a href="index.php">信息中心</a></dd>
		<dd><a href="db_member_modify.php">个人信息</a></dd>
		<dd><a href="db_member_PSW_modify.php">密码管理</a></dd>
	</dl>
	<dl>
		<dt>商品管理</dt>
		<dd><a href="db_product_add.php">商品添加</a></dd>
		<dd><a href="db_food_list.php?sort=0">荤菜列表</a></dd>
		<dd><a href="db_food_list.php?sort=1">素菜列表</a></dd>
		<dd><a href="db_food_list.php?sort=2">凉菜列表</a></dd>
		<dd><a href="db_food_list.php?sort=3">汤类列表</a></dd>
		<dd><a href="db_food_list.php?sort=4">粥类列表</a></dd>
	</dl>
</div>