<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");
session_start();



$get_start_time = time();
require_once("lib/mysql.class.php");
require_once("lib/user.class.php");
require_once("include/php/php.php");
if(!isset($_SESSION['user'])) header("Location: http://{$_SERVER['HTTP_HOST']}/login.php?url=" . curPageURL());
if(isset($_GET['out']) and $_GET['out'] == 'yes') {
    unset($_SESSION['user']);
    header("Location: http://{$_SERVER['HTTP_HOST']}/");
}
$mysql = new mysql;

//echo date('H');

if(date('H') >= 17) {

	$zuotian = date('Y-m-') . (date('d') - 1) . ' 17:0:0';
	$jintian = date('Y-m-d 17:0:0');

	$s = array(
		'table' => 'money',
		'condition' => 'fenhong = 1',
		'order' => 'id desc'
	);
	$r = $mysql->row($s);
    //print_r($r);
    if(!is_array($r)) $r['timer'] = 0;
    //echo $r['timer'];
    //echo $zuotian . ':' . $jintian;
	if($r['timer'] < strtotime($zuotian)) {

		//print_r(date('Y-m-d H:i:s', strtotime($zuotian)) . '<br />' . date('Y-m-d H:i:s', strtotime($jintian)) . '<br />');
		$s = array(
			'table' => 'shouru',
			'condition' => 'timer > ' . strtotime($zuotian) . ' and timer < ' . strtotime($jintian)
		);
		$r = $mysql->select($s);
		//print_r($r);
		$qian = 0;
		foreach($r as $key => $value) {
			//print_r(date('Y-m-d H:i:s', $value['shouru']['timer']) . '<br />');
			$qian += $value['shouru']['money'];
		}
		//print_r($qian);
		$qian = $qian * 0.2;
		//print_r($qian);
		$s = array(
			'table' => 'user',
			'condition' => 'xianshi = 1'
		);
		$r = $mysql->select($s);
        //print_r($r);
		//$qian = $qian;
        $zongrenshu = 0;
		foreach($r as $key => $value) {
			$v = $value['user'];
			if($v['xianshi'] == 1) {
                $zongrenshu++;
            }
		}
        $qian = $qian / $zongrenshu;
        //print_r($qian);
        foreach($r as $key => $value) {
            $v = $value['user'];
            if($v['xianshi'] == 1) {
                $mysql->insert('money', array('fenhong' => 1, 'money' => $qian, 'uid' => $v['id'], 'timer' => time()));
                //echo mysql_error();
            }
        }
		
	}else{
		//echo '分红已经发放！';
	}
	
	
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $o['username'].' - '.HOST_NAME; ?></title>
    <meta name="keywords" content="<?php echo '会员中心，' . KEYWORDS; ?>" />
    <meta name="description" content="<?php echo DESCRIPTION; ?>" />
    <link href="include/css/head.css" rel="stylesheet" type="text/css">
    <link href="include/css/i.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="include/js/jquery.js"></script>
    <script type="text/javascript">
        $(function() {
            if($('body').height() < $(window).height()) {
                $('div.myself').height($(window).height() - 40);
            }else{
                $('div.myself').height($('body').height() - 40);
            }
            $(window).bind("resize", function() {
                if($('body').height() < $(window).height()) {
                    $('div.myself').height($(window).height() - 40);
                }else{
                    $('div.myself').height($('body').height() - 40);
                }
            });
        });
    </script>
    <style type="text/css">
        div.top div.logo{float: left;}
        div.top div.logo a{padding: 5px; font-size: 20px; font-weight: bold; background: #4898F8; color: #FFF; border-radius: 5px;}
        div.top div.logo input.keyword{padding: 5px; font-size: 20px; width: 500px;}
    </style>
</head>
<body>
<?php
if(!isset($_GET['s'])) {
    $s = 'index';
}else{
    $s = $_GET['s'];
}
?>
<div class="m">
    <h1>
        系统中心
    </h1>
    <ul>
        <li<?php if($s == 'index') {echo ' class="active"';} ?>><a href="/">返利信息</a></li>
        <li<?php if($s == 'xiaxian') {echo ' class="active"';} ?>><a href="?s=xiaxian">我的下线</a></li>
        <?php if($o['id'] == 123456789) { ?>
        <li<?php if($s == 'system') {echo ' class="active"';} ?>><a href="?s=system">总管理</a></li>
        <?php } ?>
        <li style="float: right"><a href="/?out=yes">退出</a></li>
        <br style="clear: both;" />
    </ul>
</div>
<div class="mian">
    <?php
    include_once('include/person/' . $s . '.php');
    ?>
</div>
</body>
</html>
<?php
function curPageURL()
{
    $pageURL = 'http';

    if ($_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    }
    else
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
?>