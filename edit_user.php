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
    $sql = "SELECT * FROM users WHERE userid='$_POST[edit_user]'";
    $res = mysql_query($sql);
	$user_info = mysql_fetch_array($res);
	
?>
<head>
<link rel="stylesheet" href="edit_user.css" type="text/css">
<title>Edit User</title>
</head>

<body>
<div class="edituser">
 <div id="content">
  <form id="edituserForm" method="post" action="sub_edit_user.php" >
  <div class="user">
	<table border="1" align="left">    
		<tr>
			<th>User Id</th>
			<th>Username</th>
			<th>Password</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Age</th>
			<th>Usertype</th>
			<th>Salary</th>
	    </tr>
		<tr>
		<td><input type="text" id="uid" name="uid" value="<?php echo $user_info['userid']; ?>" style="display:none"/><?php echo $user_info['userid']; ?></td>
		<td><input type="text" id="uname" name="uname" value="<?php echo $user_info['username']; ?>"/></td>
		<td><input type="text" id="pw" name="pw" value="<?php echo $user_info['password']?>"/></td>
		<td><input type="text" id="fname" name="fname" value="<?php echo $user_info['firstname']; ?>"/></td>
		<td><input type="text" id="lname" name="lname" value="<?php echo $user_info['lastname']; ?>"/></td>
		<td><input type="text" id="age" name="age" value="<?php echo $user_info['age']; ?>"/></td>
		<td><input type="text" id="utype" name="utype" value="<?php echo $user_info['usertype']; ?>"/></td>
		<td><input type="text" id="salary" name="salary" value="<?php echo $user_info['salary']; ?>"/></td>
	    </tr>	
	</table>
	</div>

	<div class="btn">
	<input class="butn" type="submit" value="Save Edit"/>
	</div>
  </form>
  <div class="btn">
  <form action="del_user.php" method="get">
    <input type="text" id="u_id" name="u_id" value="<?php echo $user_info['userid']; ?>" style="display:none"/>
  	<input class="butn" type="submit" value="Delete User"/>
	<a href="administrator.php"><input type="button" value="Back" class="butn"/></a>
  </form>
  </div>
   </div>
  </div>
</body>
