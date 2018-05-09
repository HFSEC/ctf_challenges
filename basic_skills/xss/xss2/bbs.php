<?php

$host = 'sqld.duapp.com';
$user = '780480a5d2194c5d9ac6f80ca91fdb07';
$pass = 'be8c2e3b960f461284f4d1d77d65c63f';
$dbname = 'LtWfQMcjElCpfYAusCOq';
$port = 4050;

// $host = '127.0.0.1';
// $user = 'root';
// $pass = 'root';
// $dbname = 'xss2';
// $port = 3306;

$dsn = "mysql:host=$host;dbname=$dbname;port=$port";
try {
		//建立持久化的PDO连接
	$pdo = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));		
} catch (Exception $e) {
	die('连接数据库失败!');		
}
// $r = $pdo->query('SELECT * FROM `msg`');

// var_dump($r->fetchAll());
// die('~');

$sb = isset($_COOKIE['token']) ? $_COOKIE['token'] : sha1('fuckyou'.mt_rand(1,9999999).time());
$sb = addslashes($sb);

isset($_POST['do']) OR die();
$sssssssssss = false;
switch ($_POST['do']) {
  case 'getMsg':
	if(isset($_COOKIE['token']) AND $_COOKIE['token'] === 'a41acc7effe601de1dc2099a4e2fdd7c'){
		$r = $pdo->query("SELECT * FROM `msg` WHERE looked = 0",PDO::FETCH_ASSOC);
		$sssssssssss = true;
	}else{
		$r = $pdo->query("SELECT * FROM `msg` WHERE sb = '$sb'",PDO::FETCH_ASSOC);
	}
    // var_dump($r->fetchAll());
    // die();
    foreach ($r->fetchAll() as $key => $value) {
			echo $value['msg'], '<br />';
			$sssssssssss AND $pdo->exec("UPDATE `msg` SET looked = 1 WHERE id = {$value['id']}");
    }
    exit();
	break;
  case 'submit':		
		$msg = isset($_POST['msg']) ? $_POST['msg'] : '';
		$msg = addslashes($msg);
    $r = $pdo->query("INSERT msg(msg,sb) VALUES('$msg', '$sb')");
    exit();
	break;
	default:
		# code...
	break;
}

?>