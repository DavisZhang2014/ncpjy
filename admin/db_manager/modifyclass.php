<?php
/**
* TestGuest Version1.0
* ================================================
* Copy 2014
* Web: http://www.yc60.com
* ================================================
* Author:zhangshuhui
* Date: 2014-6-16
*/
session_start();
define('IN_TG',true);
//定义一个常量，用来指定本页的内容
define('SCRIPT', 'index');
//引入公共文件
require dirname(__FILE__).'/../../includes/common.inc.php'; //转换成硬路径，速度更快
include ROOT_PATH.'includes/check.func.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>处理上传图片功能</title>
</head>
<body>
<?php 

if($_GET['action']=='modify'){
		$_clean = array();
		$_clean['id']=$_POST['id'];
		$_clean['name']=_check_username(@$_POST['title'],2,20);
		$_clean['material'] = @$_POST['material'];
		$_clean['seasoning'] = @$_POST['seasoning'];
		$_clean['content'] = @$_POST['content'];
		$_clean['sort'] = @$_POST['sort'];
		$_clean['price'] = floatval(@$_POST['price']);
		$_clean['count'] = intval(@$_POST['count']);
		$_clean['sort'] = @$_POST['sort'];
		_query("UPDATE
						tb_food
				SET 
						name = '{$_clean['name']}',
						material = '{$_clean['material']}',
						seasoning = '{$_clean['seasoning']}',
						content = '{$_clean['content']}',
						sort = '{$_clean['sort']}',
						price = '{$_clean['price']}',
						stock = '{$_clean['count']}',
						date_time = NOW()
				WHERE 
						id='{$_clean['id']}'			
			");
		if (_affected_rows() == 1)
					{
					_close();
					_alert_back("修改成功");
		}
		else
			{
			_close();
			_alert_back("修改失败");
		}
}
else{
	_alert_back("非法操作");
}
?>
</body>
</html>