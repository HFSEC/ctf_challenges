<?php 
session_start();

function set_answer(){
	$_SESSION['time_coll'] = time() + 10;
	$s = '';
	for($i = 0; $i < 5; $i++){
		$t = mt_rand(0, 15);
		$s .= dechex($t);
	}
	$_SESSION['answer_coll'] = $s;
	// echo $s;
}

if (!isset($_SESSION['answer_coll']) OR ($_SESSION['time_coll'] - time() <= 0)) {
	set_answer();
}



if(isset($_POST['check']) AND $check = $_POST['check']){
	if (substr(hash('sha256', $check), 0, 5) === $_SESSION['answer_coll']) {
		include './flags.php';
		echo "Congratulation! Flag is ", $crack_me_by_collision;
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
		substr(hash('sha256', 'xxx'), 0, 5) === '<?php echo $_SESSION['answer_coll']?>'
		<br>
		['xxx' is some characters]
		<br>
		Crack me in 10s
		<br>
		<br>
		<input type="submit" >
	</form>
<?php echo "Left time:", $_SESSION['time_coll'] - time(), "s "; ?>
</body>
</html>