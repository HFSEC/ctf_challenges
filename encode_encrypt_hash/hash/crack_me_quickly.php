<?php 
session_start();

function set_answer(){
	$_SESSION['time_quick'] = time() + 10;
	$s = '';
	for($i = 0; $i < 5; $i++){
		$t = mt_rand(0, 15);
		$s .= dechex($t);
	}
	$_SESSION['answer_quick'] = substr(hash('sha256', $s), 0, 8);
	// echo $s;
}

if (!isset($_SESSION['answer_quick']) OR ($_SESSION['time_quick'] - time() <= 0)) {
	set_answer();
}



if(isset($_POST['check']) AND $check = $_POST['check']){
	if (preg_match('/([0-9]|[a-f]){5}/', $check) && substr(hash('sha256', $check), 0, 8) === $_SESSION['answer_quick']) {
		include './flags.php';
		echo "Congratulation! Flag is ", $crack_me_quick_flag;
	}else{
		echo "Wrong...";
	}
	set_answer();
}else{
	echo "what's your answer?";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="check">
		<br>
		substr(hash('sha256', 'xxx'), 0, 8) === '<?php echo $_SESSION['answer_quick']?>'
		<br>
		['xxx' = 00000~fffff]
		<br>
		Crack me in 10s
		<br>
		<br>
		<input type="submit" >
	</form>
<?php echo "Left time:", $_SESSION['time_quick'] - time(), "s "; ?>
</body>
</html>