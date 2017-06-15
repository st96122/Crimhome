<?php
include("ur.php");
if(isset($_POST['timm']))
{
$t=$_POST['timm'];
$j=$pdo -> query("SELECT * FROM Gomoku WHERE tim >'$t'");
$kk=$j->rowCount();
	if($kk>0)
	{
		$count = $pdo->prepare("SELECT * FROM Gomoku ");   
$count->execute();   
$ff=$count->rowCount(); 
$g = $pdo -> query("SELECT * FROM Gomoku WHERE tim >'$t'");
for ($i=0; $i < $ff; $i++) {
$ii=$g -> fetch();
$color=$ii[0];
$x=$ii[1];
$y=$ii[2];
//ob_flush();
		//flush();
echo $x.",".$y.",".$ii[3].",".$color;

}
}else
{
	echo "0";
}
}
?>