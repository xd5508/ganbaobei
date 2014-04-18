<?php

$token = '';
if(isset($_GET['token'])) $token = $_GET['token'];

if($token != '') {
    if($token != $_SESSION['token']) {
        if($mysql->update('user', $_POST, "id = " . $_POST['id'])) {
        	$mysql->insert('shouru', array('money' => 600, 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $_POST['id']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 60, 'uid' => $r['uid'], 'timer' => time()));
        	//echo mysql_error();
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 40, 'uid' => $r['uid'], 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 20, 'uid' => $r['uid'], 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 10, 'uid' => $r['uid'], 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 10, 'uid' => $r['uid'], 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 10, 'uid' => $r['uid'], 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 10, 'uid' => $r['uid'], 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 10, 'uid' => $r['uid'], 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 10, 'uid' => $r['uid'], 'timer' => time()));
        	
        	$s = array(
        		'table' => 'user',
        		'condition' => 'id = ' . $r['uid']
        	);
        	$r = $mysql->row($s);
        	print_r($r);
        	$mysql->insert('money', array('fenhong' => 0, 'money' => 6, 'uid' => $r['uid'], 'timer' => time()));
        	
        	
            //header("Location: /?s=system");
        }else{
            echo mysql_error();
        }
        $_SESSION['token'] = $_GET['token'];
    }else{
        header("Location: /?s=system");
    }
}
	
$s = array(
	'table' => 'user'
);
$r = $mysql->select($s);
	
	
?>

<style type="text/css">
	table{width: 100%; border-collapse: collapse;}
	table tr td{padding: 5px; border: 1px #CCC solid; font-size: 12px;}
	table tr td input{padding: 3px;}
</style>

<ol>

<table>
	
	<tr>
	
		<td>上级用户</td>
		<td>姓名</td>
		<td>电话</td>
		<td>银行卡</td>
		<td>密码</td>
		<td>下级个数</td>
		<td></td>
	
	</tr>
	
	<?php foreach($r as $key => $value) { $v = $value['user']; ?>
	
	
	<tr>
	
		<?php
			
			$s_one = array(
				'table' => 'user',
				'condition' => 'id = ' . $v['uid']
			);
			$one = $mysql->row($s_one);
			
			$s_xia = array(
				'table' => 'user',
				'condition' => 'uid = ' . $v['id']
			);
			$xia = $mysql->select($s_xia);
			
		?>
	
		<td><?php echo $one['username']; ?></td>
		<td><?php echo $v['username']; ?></td>
		<td><?php echo $v['phone']; ?></td>
		<td><?php echo $v['card']; ?></td>
		<td><?php echo $v['password']; ?></td>
		<td><?php echo count($xia); ?>/3</td>
		<?php if($v['xianshi'] != 1) { ?>
		<td>
			
			<form action="?s=system&token=<?php echo md5(rand(0, 100000000)); ?>" method="post">
				<input type="hidden" name="money" value="600" />
				<input type="hidden" name="id" value="<?php echo $v['id']; ?>" />
				<input type="hidden" name="xianshi" value="1" />
				<button>激活</button>
			</form>
			
		</td>
		<?php }else{ ?>
		<td>
			<form action="?s=system&token=<?php echo md5(rand(0, 100000000)); ?>" method="post">
				金额：<?php echo $v['money']; ?>
				<input type="hidden" name="money" value="<?php echo $v['money'] + 600; ?>" />
				<input type="hidden" name="id" value="<?php echo $v['id']; ?>" />
				<button>增加</button>
			</form>
		</td>
		<?php } ?>
	
	</tr>
	
	<?php } ?>
	
</table>

</ol>