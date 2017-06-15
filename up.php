<?php

//header("Content-Type:text/html; charset=utf-8");
include("ur.php");
//session_start();
//echo json_encode($_POST);
if(isset($_POST['a']))
{
	$t=$_POST['a'];
	//$t=$t+1;
	$j=mysql_query("SELECT * FROM mess WHERE tim > '$t'");

	$k=mysql_num_rows($j);
	//echo $k;
	if($k==0)
	{
		//echo "無資料";
		echo "0";
	}else{
		//echo '<script>alert("有資料");</script>';
		for ($i=0; $i < mysql_num_rows($j); $i++) {
			$ii=mysql_fetch_row($j);
			$hh=$ii[3];
			$tih="<script>tim('$hh');</script>";
			//$tih="<script type='text/javascript'>document.write(k);</script>";
			echo "<div style='display:inline-block; width: 20%;'>".htmlentities($ii[0],ENT_QUOTES,"UTF-8")."</div><div style='display:inline-block; width:60%;'>".htmlentities($ii[2],ENT_QUOTES,"UTF-8")."</div>".$hh;
			/*echo "<script>parent.scrollWindow();</script>";$tih."</div>".$hh;
			echo "<script>parent.coun(".$hh.");</script>";*/
			//echo "<script>parent.scrollWindow();</script>";

		}
	}

}
?>