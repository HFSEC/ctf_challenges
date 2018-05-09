<?php 
session_start();
if (!isset($_SESSION['answer'])) {
	$s = '';
	for($i = 0; $i < 5; $i++){
		$t = mt_rand(0, 15);
		$s .= dechex($t);
	}
	$_SESSION['answer'] = substr(hash('sha256', $s), 0, 8);
	// echo $s;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="crack_me.php">
		<input type="text" name="check">
		<br>
		substr(hash('sha256', 'xxx'), 0, 8) === <?php echo $_SESSION['answer']?>
		<br>
		['xxx' = 00000~fffff]
		<br>
		<input type="submit" >
	</form>
	<?php 
		if(isset($_GET['check'])){
			if (preg_match('/([0-9]|[a-f]){5}/', $_GET['check']) && substr(hash('sha256', $_GET['check']), 0, 8) === $_SESSION['answer']) {
				include './flags.php';
				echo "Congratulation! Flag is ", $crack_me_flag;
			}else{
				echo "Wrong...";
			}
		}
	
	?>
</body>
</html>