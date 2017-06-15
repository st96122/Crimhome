<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
include("ur.php");
$f=mysql_query("SELECT * FROM login WHERE user = '$_SESSION["user"]' AND seed = '$_SESSION['seed']");
$ff=mysql_num_rows($f);
if($ff==1)
{
	echo "成功";
	echo "<meta http-equiv=REFRESH CONTENT=1;url=default.php>";
	
}else{
	echo "失敗";
	echo "<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
}
?>