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
	
	$pro_id=$_GET['p_id'];
	
	$del_pro_sql = "DELETE FROM product WHERE PId= '$pro_id'";
	$del_suc = mysql_query($del_pro_sql);	

	if($del_suc){
		header("location:salesmanager.php");
		exit();
	}
	else{
		echo "You can't delete the product.";
	}
?>