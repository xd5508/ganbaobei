<?php

$token = '';
if(isset($_GET['token'])) $token = $_GET['token'];

if($token != '') {
    if($token != $_SESSION['token']) {
        if($mysql->update('tixian', array("tongguo" => 1), "id = " . $_GET['id'])) {
            header("Location: /?s=system&i=money");
        }else{
            echo mysql_error();
        }
        $_SESSION['token'] = $_GET['token'];
    }else{
        header("Location: /?s=system&i=money");
    }
}
	
$s = array(
	'table' => 'tixian',
	'order' => 'id desc'
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
	
		<td>姓名</td>
		<td>银行卡号</td>
		<td>提款金额</td>
		<td>时间</td>
		<td></td>
	
	</tr>
	
	<?php foreach($r as $key => $value) { $v = $value['tixian']; ?>
	
	
	<tr>
	
		<td><?php echo $v['username']; ?></td>
		<td><?php echo $v['card']; ?></td>
		<td><?php echo $v['money']; ?></td>
		<td><?php echo date('Y.m.d H:i:s', $v['timer']); ?></td>
		<td>
			<?php //print_r($v['tongguo']); ?>
			<?php if($v['tongguo'] == 1) { ?>
			已完成
			<?php }else{ ?>
			<a href="?s=system&i=money&id=<?php echo $v['id']; ?>&token=<?php echo md5(rand(0, 100000000)); ?>">完成</a>
			<?php } ?>
			
		</td>
	
	</tr>
	
	<?php } ?>
	
</table>

</ol>