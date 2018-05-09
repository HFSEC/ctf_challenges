<html>
<head>
	<meta charset="UTF-8">

</head>
<body>

<?php
setcookie("zhengbanqunzhu", "0",time()+3600,null,null,null,1);
if (isset($_COOKIE["zhengbanqunzhu"]) && $_COOKIE["zhengbanqunzhu"] == 1)
{
  echo "干得漂亮<br/>";
  echo "HFCTF{******}";
}
else
  echo "只有正版群主才能拿到flag";
?>

</body>
</html>