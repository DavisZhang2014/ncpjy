<?php
/**
* TestGuest Version1.0
* ================================================
* Copy 2014
* Web: http://www.yc60.com
* ================================================
* Author:zhangshuhui
* Date: 2014-6-18
*/
define('IN_TG',true);
//定义一个常量，用来指定本页的内容
define('SCRIPT', 'food_detail');
//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
$_id=$_GET['id'];
$_result=_query("SELECT * FROM tb_food WHERE id= '$_id' LIMIT 1");
$_result2 = _query("SELECT id,username,content,date_time FROM tb_comment WHERE food_id='$_id'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>商品详情</title>
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/food_detail.js"></script>
</head>
<body>
<?php 
	require ROOT_PATH.'includes/header.inc.php';
?>

<?php 
	$_rows=_fetch_array_list($_result);
	$_html = array();
	$_html['id'] = $_rows['id'];
	$_html['name'] = $_rows['name'];
	$_html['pic'] = $_rows['pic'];
	$_html['material']=$_rows['material'];
	$_html['seasoning']=$_rows['seasoning'];
	$_html['content'] = $_rows['content'];
	$_html['price'] = $_rows['price'];
	$_html = _html($_html);	
?>
<div id="food_detail_up">
	<div id="food_detail_left">
		<img src="uploads/<?php echo $_html['pic']?>"></img>
	</div>
	
	<div id="food_detail_right">
			<h2><?php echo $_html['name']?></h2>
			<dl><strong>价格:</strong><?php echo $_html['price']?>元</dl>
			<p class="line"></p>
			<dl><strong>用料:</strong><?php echo $_html['material']?></dl>
			<p class="line"></p>
			<dl><strong>调料:</strong><?php echo $_html['seasoning']?></dl>
			<ul>
				<li><a href="orders_buy.php?food_id=<?php echo $_html['id']?>"><button>购买</button></a></li>
				<li><a href="shoppingcart_add.php?id=<?php echo $_html['id']?>"><button>加入购物车</button></a></li>
			</ul>
	</div>
</div>
<div id="food_detail_bottom">
	<div id="cooking">
		<dl>
			<dt><strong class="cooking">做法</strong><strong class="comment" >评价</strong></dt>
			<p class="line"></p>
			<dd><?php echo _wrap($_html['content'])?></dd>
		</dl>
	</div>
	<div id="comment">
		<dl>
			<dt><strong class="cooking">做法</strong><strong class="comment" >评价</strong></dt>
		</dl>
		<p class="line"></p>		
			<?php 
				$_i=0;
				while (!!$_rows2 = _fetch_array_list($_result2)){
					$_html2 = array();
					$_html2['id'] = $_rows2['id'];
					$_html2['username'] = $_rows2['username'];
					$_html2['content'] = $_rows2['content'];
					$_html2['date_time'] = $_rows2['date_time'];
					$_html2=_html($_html2);
					$_i++;
			?>	
			<dl class="comment">
				<dd class="floor">#<?php echo $_i?></dd>
				<dd class="con"><?php echo $_html2['content']?></dd>
				<dd class="username"><?php echo $_html2['username']?></dd>
				<dd class="time"><?php echo $_html2['date_time']?></dd>
			</dl>
				<?php 

				//获取该评论下所有回复
				$_result3 = _query("SELECT username,content,date_time FROM tb_reply WHERE to_comment_id = '{$_html2['id']}'");
				while (!!$_rows3 = _fetch_array_list($_result3)){
					$_html3 = array();
					$_html3['username'] = $_rows3['username'];
					$_html3['content'] = $_rows3['content'];
					$_html3['date_time'] = $_rows3['date_time'];
					$_html3=_html($_html3);
					?>
					<p class="line"></p>
					<dl class="reply">
						<dd class="con"><?php echo $_html3['content']?></dd>
						<dd class="username"><?php echo $_html3['username']?></dd>
						<dd class="time"><?php echo $_html3['date_time']?></dd>
					</dl>
					<p class="line2"></p>
			<?php }
				?>
				<p class="line"></p>
			<?php 
				}
			?>
	</div>
</div>
<?php
require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>