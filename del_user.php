<?php
   session_start();
   setcookie(session_name(),session_id(),time()+60*30,"/");
   if($_SESSION['usertype']!='administrator')
	{
	header("location:login.php");
	}
	
    $con = mysql_connect('localhost', 'root', '36631213');
	    if(!$con){
			die('Cannot connect to the server.');
			
		}
	mysql_select_db('coolbook',$con);
	
	$user_id=$_GET['u_id'];
	
	$del_user_sql = "DELETE FROM users WHERE userid= '$user_id'";
	$del_suc = mysql_query($del_user_sql);	

	if($del_suc){
		header("location:administrator.php");
		exit();
	}
	else{
		echo "You haven't deleted the user.";
	}
?>