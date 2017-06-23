<?php
//session_start();
header("Content-Type:text/html; charset=utf-8");
include("ur.php");
$u=$_POST["user"];
$p=$_POST["password"];
$count = $pdo->prepare("SELECT * FROM login WHERE user = '$u' AND password = '$p'");   
$count->execute();   
$ff=$count->rowCount(); 
if($ff==1)
{
$g = $pdo -> query("SELECT * FROM login WHERE user = '$u' AND password = '$p'");
	$uu=$g -> fetch();
	$_SESSION["user"]=$uu[3];
	$_SESSION["id"]=$uu[0];
	echo "<meta http-equiv=REFRESH CONTENT=0;url=index.php>";
}else{
	echo "失敗";
	echo "<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
}
?>