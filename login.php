<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");
session_start();
$get_start_time = time();
require_once("lib/mysql.class.php");
include_once("lib/user.class.php");
require_once("include/php/php.php");


if($_GET['login'] == 'yes') {

	$own = new mysql();
	
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
			$re = '登陆成功！';
			break;
		case 1001:
			$re = '账号不存在！';
			break;
		case 1002:
			$re = '密码错误！';
			break;
		case 1012:
			$_SESSION['user'] = $user->person;
			$re = '登陆成功！';
			header("Location: /");
			break;
		default:
			$re = '未知错误，错误代码：＃'.$result;
	        break;
	}
	
	echo '<script type="text/javascript">alert("' . $re . '");</script>';
	if($re == '登陆成功！') echo '<script type="text/javascript">window.location.href="/";</script>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>登陆<?php echo HOST_NAME; ?></title>
    <meta name="keywords" content="<?php echo '注册圈网帐号，' . KEYWORDS; ?>" />
    <meta name="description" content="<?php echo DESCRIPTION; ?>" />
    <link href="include/css/head.css" rel="stylesheet" type="text/css">
    <link href="include/css/rl.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="include/js/jquery.js"></script>
    <script type="text/javascript">
        $(function() {

            //size(-1, 'login');

            $('input').focus(function() {
                $(this).parent().find('span').addClass('on');
            }).keyup(function() {
                if($(this).val() != '') {
                    $(this).parent().find('span').hide();
                }else{
                    $(this).parent().find('span').show();
                }
            }).blur(function() {
                if($(this).val() == '') $(this).parent().find('span').removeClass('on');
            });

            $('ul li span').click(function() {
                $(this).parent().find('input').focus();
            });

            $('input#password').keypress(function(e) {
                if(e.keyCode == '13') {
                    login();
                }
            });
        });
    </script>
</head>
<body>

<div class="mian">
    <div>
        <h1>系统登陆</h1>
    </div>

    <ul>
	    <form action="?login=yes" method="post">
	        <li>
	            <label>账号：</label>
	            <input name="username" id="username" type="text" value="" />
	            <span class="ur"></span>
	        </li>
	        <li>
	            <label>密码：</label>
	            <input name="password" id="password" type="password" value="" />
	        </li>
	        <li class="result"></li>
	        <li><button>登陆</button></li>
	    </form>
    </ul>

    <br class="clear" />
</div>
</body>
</html>
