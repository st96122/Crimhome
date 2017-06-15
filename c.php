<?php
include("ur.php");
$name=$_SESSION["user"];
$mes=$_POST["mes"];
if($mes=="")
{
	echo "<script>alert('留言不能為空');</script>";
	die();
}
$time=time();

//mysql_select_db("留言");
$sql="INSERT INTO mess (ID,mes,tim) VALUES ('$name','$mes',$time)";
$pdo -> query($sql);
?>