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
    ?>
    <ul class="own">
    	<a class="li<?php if($page == 'index') {echo ' on';} ?>" href="?s=xiaxian">图谱</a>
    	<a class="li<?php if($page == 'add') {echo ' on';} ?>" href="?s=xiaxian&i=add">添加下线</a>
    	<a class="li<?php if($page == 'tixian') {echo ' on';} ?>" href="?s=xiaxian&i=tixian">提现记录</a>
    	<a class="li<?php if($page == 'password') {echo ' on';} ?>" href="?s=xiaxian&i=password">修改密码</a>
    </ul>

</div>

<?php
include_once('include/person/xiaxian/' . $page . '.php');
?>

<div class="clear"></div>