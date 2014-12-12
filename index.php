<?php
/**
* TestGuest Version1.0
* ================================================
* Copy 2014
* Web: http://www.yc60.com
* ================================================
* Author:zhangshuhui
* Date: 2014-6-15
*/
//定义个常量，用来授权调用includes里面的文件
session_start();
define('IN_TG',true);
//定义一个常量，用来指定本页的内容
define('SCRIPT', 'index');
//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
$_percent = 0.8;
global $_pagesize,$_pagenum;
_page("SELECT id FROM tb_food",6);   //第一个参数获取总条数，第二个参数，指定每页多少条
$_result=_query("SELECT id,name,pic,price FROM tb_food");
$_result2 = _query("SELECT id,name,pic FROM tb_food WHERE recommend = '1' LIMIT 1");
$_result3 = _query("SELECT id,name,pic FROM tb_food WHERE recommend = '1' ORDER BY date_time LIMIT 1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统——首页</title>
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="js/slide.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<?php 
	require ROOT_PATH.'includes/header.inc.php';
?>
<div id="ext">
	<div id="banner">	
		<div id="banner_bg"></div>  <!--标题背景-->
		<div id="banner_info"></div> <!--标题-->
	    <ul>
	        <li class="on">1</li>
	        <li>2</li>
	        <li>3</li>
	        <li>4</li>
	    </ul>
	   <div id="banner_list">
	        <a href="#" target="_blank"><img src="adv/adv1.jpg" title="广告图片1" alt="广告图片1" /></a>
	        <a href="#" target="_blank"><img src="adv/adv2.jpg" title="广告图片2" alt="广告图片2" /></a>
	        <a href="#" target="_blank"><img src="adv/adv3.jpg" title="广告图片3" alt="广告图片3" /></a>
	        <a href="#" target="_blank"><img src="adv/adv4.jpg" title="广告图片4" alt="广告图片4" /></a>
		</div>
	</div>
	<div id="recommend">
		<div id="recommend_bg"><!--标题背景-->
			<dl>今日推荐</dl>
		</div>	
		<?php 
			if(!!$_rows2 = _fetch_array_list($_result2)){
				$_html2 = array();
				$_html2['id'] = $_rows2['id'];
				$_html2['name'] = $_rows2['name'];
				$_html2['pic'] = $_rows2['pic'];
				$_html2 = _html($_html2);
			}
		?>
		<dl>
			<a href="food_detail.php?id=<?php echo $_html2['id']?>"><img src="thumb.php?filename=<?php echo 'uploads/'.$_html2['pic']?>&percent=<?php echo $_percent?>" /></a>
		</dl>
	</div>
	<div id="new">
		<div id="new_bg">	<!--标题背景-->
			<dl>新品上市</dl>
		</div>
		<?php 
			if(!!$_rows3 = _fetch_array_list($_result3)){
				$_html3 = array();
				$_html3['id'] = $_rows3['id'];
				$_html3['name'] = $_rows3['name'];
				$_html3['pic'] = $_rows3['pic'];
				$_html3 = _html($_html3);
			}
		?>
		<dl>
			<a href="food_detail.php?id=<?php echo $_html3['id']?>"><img src="thumb.php?filename=<?php echo 'uploads/'.$_html3['pic']?>&percent=<?php echo $_percent?>" /></a>
		</dl>
	</div>
</div>
<div id="subject">
	<?php 
	$_i=1;
 		while (!!$_rows = _fetch_array_list($_result)) {
 			$_html = array();
 			$_html['id'] = $_rows['id'];
 			$_html['name'] = $_rows['name'];
 			$_html['pic'] = $_rows['pic'];
 			$_html['price'] = $_rows['price'];
 			$_html = _html($_html);
 			
	//echo "<div id='list".$_i++."' class='list'>";
 	//问题，当鼠标放置在图片上方，显示<ul>中信息，在index.js文件中编写jQuery代码
	?>
	
	<div  class="list">
		<dl>
			<a href="food_detail.php?id=<?php echo $_html['id']?>"><img src="uploads/<?php echo $_html['pic']?>" alt="<?php echo $_html['name']?>" /></a>
		</dl>
		<ul>
			<li class="name"><strong><?php echo $_html['name']?></strong></li>
			<li class="price"><strong><?php echo $_html['price']?>元</strong></li>
		</ul>
	</div>
<?php 

}
?>
</div>

<?php
require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>