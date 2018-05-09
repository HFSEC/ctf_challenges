<?php
error_reporting(0);
require_once 'flag.php';

$encode = base64_encode($flag_base64);
if (isset($_GET['get_string'])) {
	print_r($encode);
	if ($_GET['flag'] === $flag_base64) {
		echo '<br/>That is!<br/>';
	}else{
		echo '<br/>Oops... try harder<br/>';
	}
}

highlight_file(__FILE__);