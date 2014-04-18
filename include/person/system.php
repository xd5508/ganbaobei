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
        <a class="li<?php if($page == 'index') {echo ' on';} ?>" href="?s=system">用户列表</a>
        <a class="li<?php if($page == 'money') {echo ' on';} ?>" href="?s=system&i=money">取款列表</a>
        
    </ul>

</div>
<?php
include_once('include/person/system/' . $page . '.php');
?>

<div class="clear"></div>