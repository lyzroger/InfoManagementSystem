<?php
 session_start();
 setcookie(session_name(),session_id(),time()+60*30,"/");
 if($_SESSION['usertype']!='salesmanager')
	{
	header("location:login.php");
	}

    $con = mysql_connect('localhost', 'root', '36631213');
	    if(!$con){
			die('Cannot connect to the server.');
			
		}
	mysql_select_db('coolbook',$con);
	
	$special_name=$_GET['s_name'];
	$special_id_sql="SELECT PId FROM product WHERE PName='$special_name'";
	$special_id_res=mysql_query($special_id_sql);
	$special_id_row=mysql_fetch_array($special_id_res);
	
	$del_special_sql = "DELETE FROM specialsale WHERE PId='$special_id_row[0]'";
	$del_suc = mysql_query($del_special_sql);	

	if($del_suc){
		header("location:special.php");
		exit();
	}
	else{
		echo "You can't delete the product.";
	}
?>