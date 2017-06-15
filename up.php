<?php

//header("Content-Type:text/html; charset=utf-8");
include("ur.php");
//session_start();
//echo json_encode($_POST);
if(isset($_POST['a']))
{
	$t=$_POST['a'];
	//$t=$t+1;
	//$j=$pdo -> query("SELECT * FROM mess WHERE tim > '$t'");

	for($i=0;$i<10;$i++){
	$count = $pdo->prepare("SELECT * FROM mess WHERE tim >'$t'");   
$count->execute();   
$ff=$count->rowCount(); 
	//echo $k;
	if($ff==0)
	{
		//echo "無資料";
		//echo "0";
	}else{
		//echo '<script>alert("有資料");</script>';
		$g = $pdo -> query("SELECT * FROM mess WHERE tim > '$t'");
		for ($i=0; $i < $ff; $i++) {
			//$ii=mysql_fetch_row($j);

			
	$ii=$g -> fetch();
			$hh=$ii[3];
			$tih="<script>tim('$hh');</script>";
			//$tih="<script type='text/javascript'>document.write(k);</script>";
			echo "<div style='display:inline-block; width: 20%;'>".htmlentities($ii[0],ENT_QUOTES,"UTF-8")."</div><div style='display:inline-block; width:60%;'>".htmlentities($ii[2],ENT_QUOTES,"UTF-8")."</div>".$hh;
			/*echo "<script>parent.scrollWindow();</script>";$tih."</div>".$hh;
			echo "<script>parent.coun(".$hh.");</script>";*/
			//echo "<script>parent.scrollWindow();</script>";
			ob_flush();
		flush();
		$pdo=NULL;
			die();
		}
	}
//usleep(10000);
}
$pdo=NULL;
echo '0';
}
?>