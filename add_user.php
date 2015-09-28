<?php
   session_start();
   setcookie(session_name(),session_id(),time()+60*30,"/");
   if($_SESSION['usertype']!='administrator')
	{
	header("location:login.php");
	}
	
	$userid=$_POST['newuserid'];
	$username=$_POST['newusername'];
	$password=$_POST['newpassword'];
	$firstname=$_POST['newfirstname'];
	$lastname=$_POST['newlastname'];
	$age=$_POST['newage'];
	$usertype=$_POST['newusertype'];
	$salary=$_POST['newsalary'];
	

	$con = mysql_connect('localhost', 'root', '36631213');
		if(!$con){
			die('Cannot connect to the server.');			
		}
	mysql_select_db('coolbook',$con);
	
	$sql_valide = "SELECT username FROM users WHERE userid='$userid'";
	$result =  mysql_query($sql_valide);
	if($row = mysql_fetch_array($result))
	{
	   echo "ID $userid already exists.";
	}
    else
	{
    $sql = "INSERT INTO users VALUES ('$userid','$username','$password','$firstname','$lastname','$age','$usertype','$salary')";
    $res = mysql_query($sql);
	echo "<p style='color:blue;font-family:Verdana, Arial, Helvetica, sans-serif;'>User has been added successfully!</p>";
    }	
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="edit_user.css" type="text/css">
<title>Add User</title>
</head>

<body>
<a href="administrator.php"><input type="button" value="Back" class="butn"/></a>
</body>
