<?php

$token = '';
if(isset($_GET['token'])) $token = $_GET['token'];

if($token != '') {
    if($token != $_SESSION['token']) {

        if($mysql->update('user', $_POST, 'id = ' . $_GET['id'])) {

        }else{
            echo mysql_error();
        }
        $_SESSION['token'] = $_GET['token'];
    }else{
        header("Location: /?s=xiaxian");
    }
}

if(isset($_GET['del']) and $_GET['del'] == 'yes') {

    $mysql->delete('money', 'uid = ' . $_GET['id']);
    $mysql->delete('tikuan', 'uid = ' . $_GET['id']);

    $mysql->update('user', array('money' => 0, 'xianshi' => 0, 'timer' => time()), 'id = ' . $_GET['id']);

}

$s = array(
    'table' => 'user',
    'condition' => 'id = ' . $_GET['id']
);
$r = $mysql->row($s);
//print_r($r);
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

    <form action="?s=system&i=xiugai&id=<?php echo $_GET['id']; ?>&token=<?php echo md5(rand(0, 100000000)); ?>" method="post">
        <h1>修改资料<span>( <b>*</b>必须填写项 )</span></h1>
        <span class="h2"></span>

        <li>
            <label>姓名：</label>
            <input name="username" value="<?php echo $r['username']; ?>" />
        </li>
        <li>
            <label>身份证：</label>
            <input name="shenfen" value="<?php echo $r['shenfen']; ?>" />
        </li>
        <li>
            <label>联系电话：</label>
            <input name="phone" value="<?php echo $r['phone']; ?>" />
        </li>
        <li>
            <label>银行卡号：</label>
            <input name="card" value="<?php echo $r['card']; ?>" />
        </li>
        <li>
            <label>密码：</label>
            <input name="password" value="<?php echo $r['password']; ?>" />
        </li>

        <li class="bu">
            <button>修改</button>
            <span class="result"></span>
            <a href="?s=system&i=xiugai&id=<?php echo $_GET['id']; ?>&del=yes">清除该用户返利及取款数据</a>
        </li>

    </form>

</ol>