<?php header("location:default.php")?>
<?php
session_start();
$name=$_SESSION["user"];
$mes=$_POST["mes"];
if($mes=="")
{
	echo "<script>alert('留言不能為空');</script>";
	die();
}
$time=time();
include("ur.php");
mysql_query("SET NAMES utf8");
//mysql_select_db("留言");
$sql="INSERT INTO mess (ID,mes,tim) VALUES ('$name','$mes',$time)";
mysql_query($sql);
?>