<?php

$token = '';
if(isset($_GET['token'])) $token = $_GET['token'];

if($token != '') {
    if($token != $_SESSION['token']) {
    	$_POST['timer'] = time();
        if($mysql->insert('tixian', $_POST)) {
        	//$mysql->update('user', array('dongjie' => $_POST['money']), 'id = ' . $_POST['uid']);
            header("Location: /");
        }else{
            echo mysql_error();
        }
        $_SESSION['token'] = $_GET['token'];
    }else{
        header("Location: /");
    }
}
	
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

    div.mian ol ul{border-top: 1px #CCC solid;}
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


<style type="text/css">
	table{width: 100%; border-collapse: collapse;}
	table tr td{padding: 5px; border: 1px #CCC solid; font-size: 12px;}
	table tr td input{padding: 3px;}
</style>

<ol>

<table>
	
	<tr>
	
		<td>说明</td>
		<td>金额</td>
		<td>时间</td>
	
	</tr>

<?php
	
	$s = array(
		'table' => 'money',
		'condition' => 'uid = ' . $o['id']
	);
	//print_r($s);
	$r = $mysql->select($s);
	//print_r($r);
	$zong = 0;
	
	foreach($r as $key => $value) {
		$v = $value['money'];
		$zong += $v['money'];
	
	
?>
	
	<tr>
	
		<td><?php if($v['fenhong'] == 1) {echo '营业分红';}else{echo '下线返还';} ?></td>
		<td><?php echo $v['money']; ?></td>
		<td><?php echo date('Y.m.d H:i:s', $v['timer']); ?></td>
	
	</tr>
	
	<?php } ?>
	
</table>

		<ul>
			
			<li>
				<form action="?token=<?php echo md5(rand(0, 100000000)); ?>" method="post">
					总计：<?php echo $zong; ?> | 已提取：<?php echo $yitiqu; ?> | 已冻结：<?php echo $dongjie; ?> | 未提取：<?php $yue = $zong - $yitiqu - $dongjie; echo $yue; ?> | 还可提取：<?php if($zong > $o['money']) {$zong = $o['money'];} $yue = $zong - $yitiqu - $dongjie; echo $yue; ?>
					<input type="hidden" name="card" value="<?php echo $o['card']; ?>" />
					<input type="hidden" name="username" value="<?php echo $o['username']; ?>" />
					<input type="hidden" name="money" value="<?php echo $yue; ?>" />
					<input type="hidden" name="uid" value="<?php echo $o['id']; ?>" />
					<button>提现</button>
				</form>
			</li>
			
		</ul>
</ol>