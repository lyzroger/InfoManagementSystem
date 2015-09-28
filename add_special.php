<?php
     session_start();
     setcookie(session_name(),session_id(),time()+60*30,"/");
     if($_SESSION['usertype']!='salesmanager')
	   {
	   header("location:login.php");
	   }

	$specialpi=$_GET['newspecialpi'];
	$specialpn=$_GET['newspecialpn'];
	$specialpc=$_GET['newspecialpc'];
	$specialpp=$_GET['newspecialpp'];
	$specialsp=$_GET['newspecialsp'];
	$discount=$_GET['newdiscount'];
	$sdate=$_GET['newsdate'];
	$edate=$_GET['newedate'];
	

	$con = mysql_connect('localhost', 'root', '36631213');
		if(!$con){
			die('Cannot connect to the server.');			
		}
	mysql_select_db('coolbook',$con);
	$exist= "SELECT * FROM product WHERE PId='$specialpi'";
	$res_exist = mysql_query($exist);
	if($row = mysql_fetch_array($res_exist))
	{
	$sql_s = "INSERT INTO specialsale (PId,SPrice,Discount,Startdate,Enddate) VALUES('$specialpi','$specialsp','$discount','$sdate','$edate')";
	$res_s = mysql_query($sql_s);
	}
	else
	{
    $sql_p = "INSERT INTO product (PId,PName,PCate,PPrice) VALUES ('$specialpi','$specialpn','$specialpc','$specialpp')";
	$sql_s = "INSERT INTO specialsale (PId,SPrice,Discount,Startdate,Enddate) VALUES('$specialpi','$specialsp','$discount','$sdate','$edate')";
    $res_p = mysql_query($sql_p);
	$res_s = mysql_query($sql_s);
	}
	echo "<p style='color:blue;font-family:Verdana, Arial, Helvetica, sans-serif;'>User has been added successfully!</p>";
	
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="edit_special.css" type="text/css">
<title>Add Special</title>
</head>

<body>
<a href="special.php"><input type="button" value="Back" class="butn"/></a>
</body>
