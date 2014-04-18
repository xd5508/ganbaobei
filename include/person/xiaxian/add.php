<?php

$token = '';
if(isset($_GET['token'])) $token = $_GET['token'];

if($token != '') {
    if($token != $_SESSION['token']) {
    
    	$s = array(
    		'table' => 'user',
    		'condition' => 'phone = ' . $_POST['phone']
    	);
    	$r = $mysql->row($s);
    	if(!is_array($r)) {
	        if($mysql->insert('user', $_POST)) {
	            $o = $user->getID($own, $o['id']);
	        }else{
	            echo mysql_error();
	        }
	    }else{
		    echo '<script type="text/javascript">alert("联系电话已经存在，请更换!");</script>';
	    }
        $_SESSION['token'] = $_GET['token'];
    }else{
        header("Location: /?s=xiaxian");
    }
}
	
$s = array(
	'table' => 'user',
	'condition' => 'uid = ' . $o['id']
);
$r = $mysql->select($s);
	
?>
<style type="text/css">
    div.mian ol{padding-bottom: 100px;}
    div.mian ol li{font-size: 12px; padding-top: 5px; padding-bottom: 10px;}
    div.mian ol li a{font-size: 14px; cursor: pointer;}
    div.mian ol li a:hover{text-decoration: underline;}

    div.mian ol li label{display: inline-block; width: 100px; font-size: 12px; font-weight: bold; color: #000; padding: 5px; vertical-align: top;}
    div.mian ol li input{padding: 5px; font-size: 12px; width: 272px;}
    div.mian ol li input.check, div.mian ol li label.auto{width: auto;}
    div.mian ol li select.max{width: 212px;}
    div.mian ol li select{padding: 5px;}

    div.mian ol li ul.city{display: inline-block; width: 680px; margin-left: -4px; border: 1px solid #ffd88a; background: #FFE69F; padding: 10px;}
    div.mian ol li ul li{position: relative; display: inline-block; font-size: 14px; padding: 5px; cursor: pointer;}
    div.mian ol li ul li ul{position: absolute; display: none; left: 36px; top: 0; z-index: 3; width: 40px; border: 1px solid #4898F8; background: #FFF;}
    div.mian ol li ul li.hover{background: #4898F8; color: #FFF;}
    div.mian ol li ul li.hover ul{display: inline-block;}
    div.mian ol li ul li ul li{display: block; font-size: 12px;}
    div.mian ol li ul li ul li a{font-size: 12px;}
    div.mian ol li ul li ul li a:hover, div.mian ol li ul li ul li:hover a, div.mian ol li ul li ul li:hover{background: #4898F8; color: #FFF; text-decoration: none;}
    div.mian ol li ul h1{display: inline-block; border: none; font-size: 12px; font-weight: normal; color: #333; background: RGB(201, 201, 201); cursor: pointer;}

    textarea{width: 272px; padding: 5px; height: 80px;}
    button{padding: 5px 20px;}
</style>



<ol class="account">

    <form action="?s=xiaxian&i=add&token=<?php echo md5(rand(0, 100000000)); ?>" method="post">
        <h1>基本资料<span>( <b>*</b>必须填写项 )</span></h1>
        <span class="h2">每位用户可以添加 <b style="color: red;">3</b> 个下线。当前已经添加 <b style="color: green;"><?php echo count($r); ?></b> 个。</span>
        <?php if(count($r) < 3) { ?>
        <li>
            <label>姓名：</label>
            <input name="username" value="" />
        </li>

        <li>
            <label>联系电话：</label>
            <input name="phone" value="" />
        </li>
        <li>
            <label>银行卡号：</label>
            <input name="card" value="" />
        </li>
        <li>
            <label>密码：</label>
            <input name="password" value="123456" />
        </li>

        <input type="hidden" name="uid" value="<?php echo $o['id']; ?>" />
        <input type="hidden" name="xianshi" value="0" />
        <input type="hidden" name="timer" value="<?php echo time(); ?>" />
        
        <li class="bu">
            <button>添加</button>
            <span class="result"></span>
        </li>
        <?php } ?>
    </form>
</ol>