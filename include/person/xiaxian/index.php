
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
    
    ol li{text-align: center;}
    
    ol li div{border: 1px #CCC solid; display: inline-block; width: 200px; padding: 10px; text-align: center;}
    ol li div.min{border: 1px #CCC solid; display: inline-block; width: 60px; padding: 10px; text-align: center;}
    ol li div span{display: block;}
    ol li div span.ok{color: green;}
    ol li div span.no{color: red;}
</style>

<ol class="account">

<?php
	
	if(isset($_GET['id'])) {
		$u = $user->getID($mysql, $_GET['id']);
	}else{
		$u = $o;
	}
	
?>


	<li>
		<div>
			<span><?php echo $u['username']; ?></span>
			<span>下线总数：<?php echo renshu($u['id']); ?></span>
			<?php if($u['xianshi'] == 1) { ?>
			<span class="ok">已激活</span>
			<?php }else{ ?>
			<span class="no">未激活</span>
			<?php } ?>
		</div>
	</li>

	<li>

<?php 

	$userid = array();
	
	$s = array(
		'table' => 'user',
		'condition' => 'uid = ' . $u['id'],
		'limit' => 'LIMIT 0, 3'
	);
	$r = $mysql->select($s);
	//print_r($r);
	
	foreach($r as $key => $value) {
		$v = $value['user'];
		$userid[] = $v['id'];
		
?>

		<div>
			<span><a href="?s=xiaxian&id=<?php echo $v['id']; ?>"><?php echo $v['username']; ?></a></span>
			<span>下线总数：<?php echo renshu($v['id']); ?></span>
			<?php if($v['xianshi'] == 1) { ?>
			<span class="ok">已激活</span>
			<?php }else{ ?>
			<span class="no">未激活</span>
			<?php } ?>
		</div>

<?php
		
		
	}
	
?>


<?php
	
	for($i = 0; $i < (3 - count($r)); $i++) {
		
?>

		<div>
			<span>---</span>
			<span>未添加</span>
			<span>---</span>
		</div>

<?php	
		
	}
	
	
?>

	</li>
	
	<li>

<?php 

	foreach($userid as $k) {
	
		$s = array(
			'table' => 'user',
			'condition' => 'uid = ' . $k,
			'limit' => 'LIMIT 0, 3'
		);
		$r = $mysql->select($s);
		//print_r($r);
		
		foreach($r as $key => $value) {
			$v = $value['user'];
		
?>

		<div class="min">
			<span><a href="?s=xiaxian&id=<?php echo $v['id']; ?>"><?php echo $v['username']; ?></a></span>
			<span><?php echo renshu($v['id']); ?></span>
			<?php if($v['xianshi'] == 1) { ?>
			<span class="ok">已激活</span>
			<?php }else{ ?>
			<span class="no">未激活</span>
			<?php } ?>
		</div>

<?php
		
		
		}
		
		
		for($i = 0; $i < (3 - count($r)); $i++) {
		
?>

		<div class="min">
			<span>---</span>
			<span>未添加</span>
			<span>---</span>
		</div>

<?php	
		
		}
		
		
	}
	
?>

	</li>

</ol>

<?php
	
	function renshu($id) {
	
		//echo $id;
		$mysql = new mysql;
		$geshu = 0;
		
		$s = array(
			'table' => 'user',
			'condition' => 'uid = ' . $id
		);
		$r = $mysql->select($s);
		
		//print_r($r);
		
		//echo $id;
		
		if($r) {
			
			foreach($r as $key => $value) {
				$geshu++;
				//echo $value['user']['id'];
				$geshu += renshu($value['user']['id']);
			}
			
		}
		
		return $geshu;
			
	}
	
?>