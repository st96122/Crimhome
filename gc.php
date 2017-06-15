
<?php
$time=time();
$color=$_POST['color'];
$x=$_POST['x'];
$y=$_POST['y'];
include("ur.php");
//mysql_select_db("留言");
$sql="INSERT INTO Gomoku (color,x,y,tim) VALUES ('$color','$x','$y','$time')";
$pdo -> query($sql);
?>