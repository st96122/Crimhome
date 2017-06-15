<!DOCTYPE html>
<?//header("refresh:50");
header("Content-Type:text/html; charset=utf-8");?>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript">
function tim(ddd){
//var ddd = parseInt("<?php //echo $hh ;?>");
var datee = new Date(ddd*1000);
var date=datee.toLocaleString();
var Y,M,D,h,m,s,k;
Y = datee.getFullYear() + '-';
M = (datee.getMonth()+1 < 10 ? '0'+(datee.getMonth()+1) : datee.getMonth()+1) + '-';
D = datee.getDate() + ' ';
h = datee.getHours() + ':';
m = datee.getMinutes() + ':';
s = datee.getSeconds(); 
k=Y+M+D+h+m+s;
document.write(k);
return k;
};
var did=0;
	function di(dd)
  {
  	
  	if(dd==1)
  	{
  		did=1;
  	}else if(dd==0){
  		did=0;
  	}
  	//alert('dd='+dd+'did='+did);
  	}
</script>
<div style= "float: left;width: 20%;">ID</div><div style="float: left; width: 60%">留言</div><div style="float:left;width: 20%;">時間</div>
<?php
include("ur.php");
session_start();
if($_SESSION["user"]=="")
{
	echo "請登入<script>;window.location.href='login.php';";
	die();
}

	$diee="<script>document.write(did)</script>";
	//echo $diee;
		ob_flush();
		flush();
	
	
	$j=mysql_query("SELECT * FROM mess");
	
for ($i=0; $i < mysql_num_rows($j); $i++) {
$ii=mysql_fetch_row($j);
$hh=$ii[3];
$ti=$hh;
$tih="<script>tim('$hh');</script>";
//$tih="<script type='text/javascript'>document.write(k);</script>";
echo "<div><div style='width: 20%; display:inline-block;'>".htmlentities($ii[0],ENT_QUOTES,"UTF-8").'</div><div style="width:60%;display:inline-block;">'.htmlentities($ii[2],ENT_QUOTES,"UTF-8")."</div><div id='".$i."' style='width:20%;display:inline-block;'>".$tih."</div></div>";
	echo "<script>parent.scrollWindow();</script>";
	echo "<script>parent.coun(".$hh.");</script>";

		ob_flush();
		flush();
}
//sleep(2);

//echo "<script>di(0)</script>";

?>

</body>
</html>