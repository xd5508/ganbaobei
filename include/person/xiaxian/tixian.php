<?php
	
$s = array(
	'table' => 'tixian',
	'condition' => 'uid = ' . $o['id'],
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

		<td>提款金额</td>
		<td>时间</td>
		<td></td>
	
	</tr>
	
	<?php foreach($r as $key => $value) { $v = $value['tixian']; ?>
	
	
	<tr>
	
		<td><?php echo $v['money']; ?></td>
		<td><?php echo date('Y.m.d H:i:s', $v['timer']); ?></td>
		<td>

			<?php if($v['tongguo'] == 1) { ?>
			已处理
			<?php }else{ ?>
			未处理
			<?php } ?>
			
		</td>
	
	</tr>
	
	<?php } ?>
	
</table>

</ol>