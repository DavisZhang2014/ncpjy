<?php
/**
* TestGuest Version1.0
* ================================================
* Copy 2014
* Web: http://www.yc60.com
* ================================================
* Author:zhangshuhui
* Date: 2014-9-21
*/
session_start();
define('IN_TG',true);
//引入公共文件
//定义一个常量，用来指定本页的内容
define('SCRIPT', 'db_food_list');
//引入公共文件
require dirname(__FILE__).'/../../includes/common.inc.php';
include ROOT_PATH.'includes/check.func.php';
//是否正常登录
if(!isset($_COOKIE['username'])){
	_alert_back('非法登录');
}

$_percent = 0.2;
//分页模块
global $_pagesize,$_pagenum,$_system;
$_sortid=$_GET['sort'];
_page("SELECT id FROM tb_product WHERE stock<='10'",10);
$_result = _query("SELECT id,name,pic,stock FROM tb_product WHERE stock<='10'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品列表</title>
<?php
	require ROOT_PATH.'includes/db_title.inc.php';
?>
</head>
<body>
<?php 
	require ROOT_PATH.'includes/db_header.inc.php';
?>

<div id="member">
		<?php 
			require ROOT_PATH.'includes/db_manager.inc.php';
		?>
	<div id="food_list">
		<h2>缺货商品</h2>
		<table cellspacing="1">
		<tr><th>图片</th><th>名称</th><th>库存量</th><th>操作</th></tr>
			<?php 
				while (!!$_rows = _fetch_array_list($_result)){
					$_html = array();
					$_html['id'] = $_rows['id'];
					$_html['pic'] = $_rows['pic'];
					$_html['name'] = $_rows['name'];
					$_html['stock'] = $_rows['stock'];
					$_html = _html($_html);
			?>
			<tr>
				<td><img src="../../thumb.php?filename=<?php echo 'uploads/'.$_html['pic']?>&percent=<?php echo $_percent?>" /></td>
				<td><?php echo $_html['name']?></td><td><?php echo $_html['stock']?></td>
				<td><form method ="post" action="db_food_count_add.php?ids=<?php echo $_html['id']?>" >
					+ <input type="text" name="adds" size="1" value="0"></input> 
					<input type="submit" name="sub" value="添加"/>
					</form>
				</td>
					
			</tr>
			<?php 
				}
			?>
		</table>
	</div>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>