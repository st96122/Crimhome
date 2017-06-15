<?php
header("Content-Type:text/html; charset=utf-8");
session_start();

include("ur.php");
$u=$_POST["user"];
$p=$_POST["password"];
$i=$_POST["ID"];
if($u=="" or $p=="" or $i=="")
{
    echo "<meta http-equiv=REFRESH CONTENT=1;url=reg.html>";
    die();
}
$f=mysql_query("SELECT * FROM login WHERE user = '$u'");
$ff=mysql_num_rows($f);
if($ff==0)
{
	echo "成功";
	mysql_query("INSERT INTO login (user,password,ID) VALUES ('$u','$p','$i')");
	echo "<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
}else{
	echo "已使用的帳號";
	echo "<meta http-equiv=REFRESH CONTENT=1;url=reg.html>";
}
?>