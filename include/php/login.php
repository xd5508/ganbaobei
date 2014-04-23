<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");
session_start();
$get_start_time = time();
include_once("../../lib/mysql.class.php");
include_once("../../lib/user.class.php");

$own = new mysql();

if($_POST['username'] == '') die('请填写您的账号!');
if($_POST['password'] == '') die('请填写您的密码！');

$a = array(
    'phone'=>$_POST['username'],
    'password'=>$_POST['password']
);

//print_r($a);


$user = new user($a);
$result = $user->login($own);

//print_r('error:' . $result . '. ');

switch($result) {
	case 1000:
		$_SESSION['user'] = $user->person;
		die('登陆成功！');
		break;
	case 1001:
		die('账号不存在！');
		break;
	case 1002:
		die('密码错误！');
		break;
	case 1012:
		$_SESSION['user'] = $user->person;
		die('登陆成功！');
		break;
	default:
		die('未知错误，错误代码：＃'.$result);
        break;
}
?>
