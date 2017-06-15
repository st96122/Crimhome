<?php
header("Content-Type:text/html; charset=utf-8");


include("ur.php");
$u=$_POST["user"];
$p=$_POST["password"];
$i=$_POST["ID"];
if($u=="" or $p=="" or $i=="")
{
    echo "<meta http-equiv=REFRESH CONTENT=1;url=reg.html>";
    die();
}

$count = $pdo->prepare("SELECT * FROM login WHERE user = '$u'");   
$count->execute();   
$ff=$count->rowCount(); 
if($ff==0)
{
	echo "成功";
	$pdo -> query("INSERT INTO login (user,password,ID) VALUES ('$u','$p','$i')");
	echo "<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
}else{
	echo "已使用的帳號";
	echo "<meta http-equiv=REFRESH CONTENT=1;url=reg.html>";
}
?>