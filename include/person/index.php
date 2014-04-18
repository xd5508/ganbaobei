<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-9-6
 * Time: 下午5:49
 * To change this template use File | Settings | File Templates.
 */
?>

<div class="myself">

    <?php

    if(!isset($_GET['i'])) {
        $page = 'index';
    }else{
        $page = $_GET['i'];
    }
    
    $s = array(
		'table' => 'tixian',
		'condition' => 'uid = ' . $o['id'] . ' and tongguo = 1'
	);
	//print_r($s);
	$r = $mysql->select($s);
	//print_r($r);
	$yitiqu = 0;
	
	foreach($r as $key => $value) {
		$v = $value['tixian'];
		$yitiqu += $v['money'];
	}
	
	$s = array(
		'table' => 'tixian',
		'condition' => 'uid = ' . $o['id'] . ' and tongguo = 0'
	);
	//print_r($s);
	$r = $mysql->select($s);
	//print_r($r);
	$dongjie = 0;
	
	foreach($r as $key => $value) {
		$v = $value['tixian'];
		$dongjie += $v['money'];
	}
    
    ?>
    <ul class="own">
        <li>总金额：<?php echo $o['money']; ?></li>
        <li>已提取：<?php echo $yitiqu; ?></li>
        <li>已冻结：<?php echo $dongjie; ?></li>
    </ul>

</div>

<?php
include_once('include/person/index/' . $page . '.php');
?>

<div class="clear"></div>