<?php
error_reporting(0);
require_once 'flag.php';

if (isset($_GET['get_string'])) {
    print_r(c_base64_encode($flag_base64_harder));
    echo "<br/>";
    if (isset($_GET['code'])) {
        echo "<br/>", c_base64_encode($_GET['code']), "<br/>";
    }
    if (isset($_GET['flag'])) {
    	if ($_GET['flag'] === $flag_base64_harder) {
    		echo "Good Luck!";
    	}
    }
}

function c_base64_encode($src){
	global $table_harder;
    $base = $table_harder;
    $slen=strlen($src);
    $smod = ($slen%3);
    $snum = floor($slen/3);
    $desc = array();
    for($i=0;$i<$snum;$i++)
    {
        $_arr = array_map('ord',str_split(substr($src,$i*3,3)));
        $_dec0= $_arr[0]>>2;
        $_dec1= (($_arr[0]&3)<<4)|($_arr[1]>>4);
        $_dec2= (($_arr[1]&0xF)<<2)|($_arr[2]>>6); 
        $_dec3= $_arr[2]&63;
        $desc = array_merge($desc,array($base[$_dec0],$base[$_dec1],$base[$_dec2],$base[$_dec3]));
    }
    if($smod==0) return implode('',$desc);
    $_arr = array_map('ord',str_split(substr($src,$snum*3,3)));
    $_dec0= $_arr[0]>>2;
    if(!isset($_arr[1]))
    {
        $_dec1= (($_arr[0]&3)<<4);
        $_dec2=$_dec3="?";
    }
    else
    {
        $_dec1= (($_arr[0]&3)<<4)|($_arr[1]>>4);
        $_dec2= $base[($_arr[1]&7)<<2];
        $_dec3="?";
    }
    $desc = array_merge($desc,array($base[$_dec0],$base[$_dec1],$_dec2,$_dec3));
    return implode('',$desc);
}

highlight_file(__FILE__);