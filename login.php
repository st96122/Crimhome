<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
include("ur.php");
$u=$_POST["user"];
$p=$_POST["password"];
$f=mysql_query("SELECT * FROM login WHERE user = '$u' AND password = '$p'");
$ff=mysql_num_rows($f);
if($ff==1)
{
	$g=mysql_query("SELECT * FROM login WHERE user = '$u' AND password = '$p'");
	$uu=mysql_fetch_row($g);
	$_SESSION["user"]=$uu[3];
	echo "成功";
	echo "<meta http-equiv=REFRESH CONTENT=1;url=default.php>";
}else{
	echo "失敗";
	echo "<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
}
?>