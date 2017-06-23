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
	<title>留言板</title>
</head>
<body scrolling="no" onload="document.getElementById('mess').focus();scrollWindow();">
<iframe name="ifra" id="ifra" src="list.php" width="100%" height="70%" frameborder="0" scrolling="auto" onload="scrollWindow();updd();"></iframe>
	
<?php
	if ($_SESSION["user"]=="Crim") {
	echo '<script>function D()
	{
		window.location.href="d.php";
	};</script>';
	echo "<input type='button' value='清除留言' onclick='D()'>";}
	
if($_SESSION["user"]=="")
{
	echo "請登入<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
	die();
}else{
?>
<input type="button" onclick="window.location.href='logout.php';" value="登出">
<input type="button" onclick="window.location.href='index.php';" value="回首頁">
<!--<form method="post" action="c.php">!-->
	<div>
	ID：<?php echo $_SESSION["user"]; ?> 留言：<input name="mes" type="text" id="mess" onkeydown="keyu(event);"><!--<input type="submit" onsubmit="document.all('ifra').contentWindow.di('1');" value="送出">!--><input type="button" id="btn" value="送出" onclick="subm();">
	</div>
<!--</form>!-->
<script type="text/javascript">
var ag=0;
function cg(aa)
{
	ag=1;
};
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
//document.write(k);
return k;
};
	
	var h=2000;
	function scrollWindow()
  {
  	var idoc = document.getElementById('ifra').contentWindow.document.body;  
	h+=1000;
  window.parent.ifra.scrollTo(0,h);
  };  
  function windo()
  {
  	document.getElementById('ifra').src="";
  };
  function subm()
{
var xmlhttp;

  	xmlhttp=new XMLHttpRequest();
xmlhttp.open("POST","c.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("mes="+document.getElementById("mess").value);
document.getElementById("mess").value="";
};
</script>
<script type="text/javascript">
function updd()
{
  	xmlhttp2=new XMLHttpRequest();
xmlhttp2.open("POST","up.php",true);
xmlhttp2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp2.send("a="+cou);
xmlhttp2.onreadystatechange=function() {
	if(xmlhttp2.readyState<4){return;}
	var te=xmlhttp2.responseText;
	//alert(te);
	if(te!=0)
	{
	var timm=te.substr(-10);
	var teg=te.slice(0,-10);
	//alert("timm="+timm);
	if(timm>0)
	{
		
		coun(timm);
		var ttt = tim(timm);
	coun(timm);
	}	
	//alert("teg="+teg);
	//document.getElementById("ifra").contentWindow.document.body.innerHTML += teg;
	var att=teg+"<div style='display:inline-block; width:20%;'>" + ttt + "</div>"
	var crea = document.createElement("div");
	crea.innerHTML+=att;
	ag+=1;
	if(ag%2==0)
	{
		crea.className="b";
	}else{
		crea.className="y";
	}
	var ct=document.getElementById("ifra").contentDocument.body;
	ct.appendChild(crea);
	//document.getElementById("ifra").appendChild(crea);
	//document.getElementById("ifra").contentWindow.document.body.innerHTML+=att;
	scrollWindow();
	document.getElementById('mess').focus();
}
	
	setTimeout(updd,2000);
//alert(te);
}
};

//setInterval(updd,5000);
var cou=0;
function coun(c)
{
	cou=c;
	//alert(cou);
};
function keyu(e)
{
	if(e.keyCode=='13')
	{
		
		document.getElementById("btn").click();
	}
};

</script>
<?php
}

?>

</body>
</html>