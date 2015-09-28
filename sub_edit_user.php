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
	
	$userid=$_POST['uid'];
	$username=$_POST['uname'];
	$password=$_POST['pw'];
	$firstname=$_POST['fname'];
	$lastname=$_POST['lname'];
	$age=$_POST['age'];
	$usertype=$_POST['utype'];
	$salary=$_POST['salary'];
   
	$update_user_sql = "UPDATE users SET userid='$userid',username='$username', password='$password', firstname='$firstname', lastname='$lastname', age='$age', usertype='$usertype', salary='$salary' WHERE userid= '$userid'";
	$update_suc = mysql_query($update_user_sql);	

	if($update_suc){
		header("location:administrator.php");
		exit();
	}
	else{
		echo "You haven't modified the user.";
	}
?>

