<!DOCTYPE html>
<?php session_start();?>
<?header("Content-Type:text/html; charset=utf-8");?>
<html>
<head>
<meta charset="utf-8">
    <style>
    html,body { height: 90%; }
    </style>
	<title></title>
</head>
<body scrolling="no">
<?php
		
if($_SESSION["user"]=="")
{
	echo "請登入<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
	die();
}else{
?>
<div style="text-align: right;"><input type="button" onclick="window.location.href='logout.php';" value="登出"></div>
<div><input type="button" onclick="window.location.href='GG.php';" value="五子棋"></div>
<div><input type="button" onclick="window.location.href='mg.php';" value="留言板"></div>
<?php
}
 
?>

</body>
</html>