<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");
session_start();
$get_start_time = time();
require_once("lib/mysql.class.php");
require_once("include/php/php.php");
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
        <script type="text/javascript" src="<?php echo HOST_URL; ?>include/js/changeSize.js"></script>
        <script type="text/javascript">
        function login() {
            t = $('button').parent();
            t.hide();
            yan = $('li.result');
            $.ajax({
                type: "post",
                url: "include/php/login.php",
                data: {
                    username:$('#username').val(),
                    password:$('#password').val()
                },
                beforeSend: function(re){
                    yan.show();
                    yan.html('努力登陆...');
                },
                success: function(data, textStatus){
                    yan.html(data);
                    if(data != '登陆成功！'){
                        t.show();
                    }else{
                        location.href="<?php echo $_GET['url']?$_GET['url']:'/'; ?>";
                    }
                }
            });
        }
        $(function() {

            size(-1, 'login');

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
			<h1>登陆</h1>
		</div>
		
        	<ul>
	        	<li>
	        		<label>手机号：</label>
	        		<input name="username" id="username" type="text" value="" />
				<span class="ur"></span>
	        	</li>
	        	<li>
	        		<label>密码：</label>
	        		<input name="password" id="password" type="password" value="" />
	        	</li>
	        	<li class="result"></li>
	        	<li><button type="button" onclick="login();">登陆</button></li>
	        </ul>

        	<br class="clear" />
        </div>
    </body>
</html>
