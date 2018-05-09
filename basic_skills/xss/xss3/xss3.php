<?php

function xssFilter($string)
{
  $patterns = array();
  $patterns[0] = '/script/i';
  $patterns[1] = '/alert/i';
  $patterns[2] = '/on/i';
  $replacements = array();
  $replacements[0] = '';
  $replacements[1] = '*****';
  $replacements[2] = '';  
  //替换script,alert
  $string = preg_replace($patterns,$replacements,$string);
  return $string;
}

if (isset($_POST['msg'])) {
  echo xssFilter($_POST['msg']);
}
?>