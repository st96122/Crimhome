<!DOCTYPE html>
<?php session_start();?>
<?header("Content-Type:text/html; charset=utf-8");?>
<html>
<head>
<meta charset="utf-8">
    <style>
    html,body { height: 90%; }
    body{
			background-image: url('pw9.jpg');
			background-attachment:fixed;
			background-repeat:no-repeat;
			background-size:cover;
		}
    </style>
	<title></title>
</head>
<body>
<?php
		
if($_SESSION["user"]=="")
{
	echo "請登入<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
	die();
}else{
?>
<div style="text-align: right;"><input type="button" onclick="window.location.href='logout.php';" value="登出"></div>
<div><input type="button" onclick="window.location.href='GG.php';" value="五子棋"></div>
<div><input type="button" onclick="window.location.href='pook.html';" value="翻牌遊戲"></div>
<div><input type="button" onclick="window.location.href='mg.php';" value="留言板"></div>
<div><input type="button" onclick="window.location.href='edge.html';" value="邊緣偵測"></div>
<?php
}
 
?>

</body>
</html>