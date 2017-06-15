<html>
<head>
<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		.b
		{
			background-image:url(/B.png);
			background-size: 14px 16px;

		}
		.w
		{
			background-image:url(/W.png);
			background-size: 14px 16px;

		}
		#di
		{
			width: 100%;
			height: 100%;
			position: relative ;
			display: none;
			
		}
	</style>
</head>
<body onload="upd()">
<script type="text/javascript">
	var blok=0;
	var color=1;
</script>
<?php
include("ur.php");
$idd=$_SESSION["id"];
$niname=$_SESSION["user"];
echo "<script>var id='".$idd."'</script>";
$tt=0;
$count = $pdo->prepare("SELECT * FROM guser");   
$count->execute();   
$ff=$count->rowCount(); 
$timee=time();
$cou=$pdo->prepare("SELECT * FROM guser WHERE id = '$idd'");
$cou->execute();
$f=$cou->rowCount();
if ($ff==0) {
	$sql="INSERT INTO guser (id,user,tim,col) VALUES ('$idd','$niname','$timee','0')";
$pdo -> query($sql);
echo "<script> color=0</script>";
	}elseif ($ff==1 AND $f==0) 
	{
		$sql="INSERT INTO guser (id,user,tim,col) VALUES ('$idd','$niname','$timee','1')";
$pdo -> query($sql);
echo "<script> color=1</script>";
	}elseif ($f==1) {
		$idc=$cou->fetch();
		echo "<script> color=".$idc[3]."</script>";
	}
	else
	{
		echo "<cript>blok=1;</script>";
	}
echo "<div>".$_SESSION["user"]."</div>";
//echo "<div>".$_SESSION["id"]."</div>";
?>
<div style='background-image: url("/CP.jpg"); width: 600px; height: 600px; background-size: 600px 600px;position: relative;left: 400px;'>

	<?php
	$jt=0;
	$it=0;
	for($j=23;$j<=566;$j+=29.7)
	{
		if($jt<10)
		{
			$jt='0'.$jt;
		}
	for($i=28;$i<=566;$i+=29.4)
	{
		if($it<10)
		{
			$it='0'.$it;
		}
	echo '<div id='.$jt.$it.' class="c" style="position: absolute;top:'.$j.'px;left:'.$i.'px;width: 14px;height: 16px;" onclick=co('.$jt.','.$it.',this)></div>
	';
	$it++;
	}
	$jt++;
	$it=0;
		}
		

	?>
	
<div id="di"><h3>等待中</h3></div>
	<script type="text/javascript">
	var gg=new Array(361);
	for(var i=0;i<gg.length;i++)
	{
		gg[i]=2;
		
	}
	
		function co(x,y)
		{
			//color=Math.abs(color-1);
			x=x+'';
			y=y+'';
			if(x<10)
			{
				x="0"+x;
			}
			if(y<10)
			{
				y="0"+y;
			}

			if(color==0)
			{
				if(document.getElementById(x+y).className=="c")
				{
				/*document.getElementById(x+y).style.backgroundImage="url(/B.png)";
				document.getElementById(x+y).style.backgroundSize="14px 16px";*/
				document.getElementById(x+y).className="b";
				document.getElementById('di').style.display='block';
				subm(x,y);
				}
			}
			else
			{
				if(document.getElementById(x+y).className=="c")
				{
				/*document.getElementById(x+y).style.backgroundImage="url(/W.png)";
				document.getElementById(x+y).style.backgroundSize="14px 16px";*/
				document.getElementById(x+y).className="w";
				document.getElementById('di').style.display='block';
				subm(x,y);
				}
			}
			//alert("x="+x+"y="+y);
				
		};
		function cuu(x,y,coo)
		{
			x=x+'';
			y=y+'';
			if(x<10)
			{
				x="0"+x;
			}
			if(y<10)
			{
				y="0"+y;
			}
			//alert("x="+x+"y="+y);
			
			if(coo==0)
			{
				//document.getElementById(x+y).style.backgroundImage="url(/B.png)";
				//document.getElementById(x+y).style.backgroundSize="14px 16px";
				document.getElementById(x+y).className="b";
				x=parseInt(x);
				y=parseInt(y);
				var k=x*19+y;
				gg[k]=0;
				pp(k,0);

			}
			else
			{
				//document.getElementById(x+y).style.backgroundImage="url(/W.png)";
				//document.getElementById(x+y).style.backgroundSize="14px 16px";
				document.getElementById(x+y).className="w";
				x=parseInt(x);
				y=parseInt(y);
				var k=x*19+y;
				gg[k]=1;
				pp(k,1)
			}

		};
		function subm(x,y)
		{
			var xmlhttp;

  			xmlhttp=new XMLHttpRequest();
			xmlhttp.open("POST","gc.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

			xmlhttp.send("color="+color+"&x="+x+"&y="+y);
};

var tee;
		
		function pp(k,c)
		{
			var x=Math.floor(k/19);
			var y=k%19;
			var po=0;
			
			if(gg[k-1]==c || gg[k+1]==c)
			{
				po=plr(k,c,x,y);
			}

			if(gg[k-19]==c || gg[k+19]==c)
			{
				po+=pud(k,c,x,y);
			}
			if(gg[k-1-19]==c || gg[k+1+19]==c)
			{
				po+=plu(k,c,x,y);
			}
			if(gg[k+1-19]==c || gg[k-1+19]==c)
			{
				po+=pru(k,c,x,y);
			}
			if(po>=1)
			{

				alert(c+"贏了");
				window.location.href='gd.php';
			}
		};
		function plr(k,c,x,y)
		{
			var o=y;
			var i=1;
			var pc=1;
			while(o>=0)
			{
				if(gg[k-i]==c)
				{
					pc++;
				}
				else
				{
					break;
				}
				i++;
				o--;
			}
			//alert(pc+"k="+k+"xy"+x+" "+y);
			o=y;
			i=1;
			while(o<=18)
			{
				if(gg[k+i]==c)
				{
					pc++;
				}
				else
				{
					break;
				}
				i++;
				o++;
			}
			//alert(pc+"橫向"+c);
			if (pc>=5)
			{
				o=1;
			}
			else
			{
				o=0;
			}
			return o;
		};
		function plu(k,c,x,y)
		{
			var ox=x;
			var oy=y;
			var i=1;
			var pc=1;
			while(ox>=0 && oy>=0)
			{
				if(gg[k-i*19-i]==c)
				{
					pc++;
				}else
				{
					break;
				}
				i++;
				ox--;
				oy--;
			}
			//alert(pc+"k="+k+"xy"+x+" "+y+"i="+i);
			i=1;
			ox=x;
			oy=y;
			while(ox<=18 && oy<=18)
			{
				if(gg[k+i*19+i]==c)
				{
					pc++;
				}else
				{
					break;
				}
				i++;
				ox++;
				oy++;
			}
			//alert(pc+"左上右下"+c);
			if (pc>=5)
			{
				ox=1;
			}
			else
			{
				ox=0;
			}

			return ox;
		};
		function pru(k,c,x,y)
		{
			var ox=x;
			var oy=y;
			var i=1;
			var pc=1;
			while(ox>=0 && oy<=18)
			{
				if(gg[k-i*19+i]==c)
				{
					pc++;
				}else
				{
					break;
				}
				i++;
				ox--;
				oy++;
			}
			i=1;
			ox=x;
			oy=y;
			while(ox<=18 && oy>=0)
			{
				if(gg[k+i*19-i]==c)
				{
					pc++;
					
				}else
				{
					break;
				}
				i++;
				ox++;
				oy--;
			}
			//alert(pc+"右上左下"+c);
			if (pc>=5)
			{
				ox=1;
			}
			else
			{
				ox=0;
			}

			return ox;
		};
		function pud(k,c,x,y)
		{
			var o=x;
			var i=1;
			var pc=1;
			while(o>=0)
			{
				if(gg[k-i*19]==c)
				{
					pc++;
				}
				else
				{
					break;
				}
				i++;
				o--;
			}
			o=y;
			i=1;
			while(o<=18)
			{
				if(gg[k+i*19]==c)
				{
					pc++;
				}
				else
				{
					break;
				}
				i++;
				o++;
			}
			//alert(pc+"直向"+c);
			if (pc>=5)
			{
				o=1;
			}
			else
			{
				o=0;
			}
			return o;
			
		};
		</script>
		<?php
$tt=0;
$count = $pdo->prepare("SELECT * FROM Gomoku");   
$count->execute();   
$ff=$count->rowCount(); 
	$g = $pdo -> query("SELECT * FROM Gomoku");
for ($i=0; $i < $ff; $i++) {
$ii=$g -> fetch();
$color=$ii[0];
$x=$ii[1];
$y=$ii[2];
if($tt<$ii[3])
{
	$tt=$ii[3];
}
echo "<script>cuu(".$x.",".$y.",".$color.");</script>";
//echo "<script>color=".abs($color-1).";</script>";
}
echo "<script>var tim=".$tt.";</script>";

?>
<script type="text/javascript">
function upd()
		{
			xmlhttp2=new XMLHttpRequest();
xmlhttp2.open("POST","gl.php",true);
xmlhttp2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp2.send("timm="+tim+"&id="+id);
xmlhttp2.onreadystatechange=function() {
	if(xmlhttp2.readyState<4){return;}
	var te=xmlhttp2.responseText;
	
	setTimeout(upd,2000);
	if(te=="00"){alert("對面斷線");window.location.href="gd.php";};
	if(te=="0"){return;}
	tee=te.split(",",4);
	//alert(tee.length);
	var x=tee[0];
	var y=tee[1];
	tim=tee[2];
	//color=tee[3];
	//color=Math.abs(color-1);
	//alert(tim);
	cuu(x,y,tee[3]);
	if(color==Math.abs(parseInt(tee[3])-1))
	{
	document.getElementById('di').style.display='none';
	}
	
	
}
	
	//alert(te);
};
</script>


</body>
</html>