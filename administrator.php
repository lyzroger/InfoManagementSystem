<?php
   session_start();
   setcookie(session_name(),session_id(),time()+60*30,"/");
   if($_SESSION['usertype']!='administrator')
	{
	header("location:login.php");
	}
	
	$con = mysql_connect('localhost', 'root', '36631213');
	if(!$con) 
	  {
	  die ('Cannot connect to Database!');
	  }
	mysql_select_db('coolbook',$con);
    $sql = "SELECT * FROM users";
    $res = mysql_query($sql);
	$res2 = mysql_query($sql);
	$res3 = mysql_query($sql);
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="administrator.css" type="text/css">
<title>User Management</title>

<script language="javascript">

var imgq="<img src='http://www.precisionmarketinggroup.com/Portals/40444/images/question-mark.jpg' width=24px height=20px align='absmiddle' hspace='2'>";

function getObj(id)
{
  return document.getElementById(id);
}

var isValid;
function checkValid(id)
{
	var x;	
	if(id == "uid")
	{
		x = getObj("newuserid").value;
		if (x==null || x=="") {
			getObj("uid").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("uid").innerHTML = "";			
	}
	else if(id == "un")
	{
		x=getObj("newusername").value;
		if(x == "" || x == null){
			getObj("un").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("un").innerHTML = "";
	}
	else if(id == "pw")
	{
		x=getObj("newpassword").value;
		if(x == "" || x == null){
			getObj("pw").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("pw").innerHTML = "";
	}
	else if(id == "fn")
	{
		x=getObj("newfirstname").value;
		if(x == "" || x == null){
			getObj("fn").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("fn").innerHTML = "";
	}
	else if(id == "ln")
	{
		x=getObj("newlastname").value;
		if(x == "" || x == null){
			getObj("ln").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("ln").innerHTML = "";
	}
	else if(id == "age")
	{
		x=getObj("newage").value;
		if(x == "" || x == null){
			getObj("age").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("age").innerHTML = "";
	}
	else if(id == "utp")
	{
		x=getObj("newusertype").value;
		if(x == "" || x == null){
			getObj("utp").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("utp").innerHTML = "";
	}
	else if(id == "salary")
	{
		x=getObj("newsalary").value;
		if(x == "" || x == null){
			getObj("salary").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("salary").innerHTML = "";
	}
	return isValid;
}

function validate()
{
isValid = true;
var a = getObj("newuserid").value;
var b = getObj("newusername").value;
var c = getObj("newpassword").value;
var d = getObj("newfirstname").value;
var e = getObj("newlastname").value;
var f = getObj("newage").value;
var g = getObj("newusertype").value;
var h = getObj("newsalary").value;

if(a==""||a==null){
  getObj("uid").innerHTML = imgq;
  isValid = false;
}
if(b==""||b==null){
  getObj("un").innerHTML = imgq;
  isValid = false;
}
if(c==""||c==null){
  getObj("pw").innerHTML = imgq;
  isValid = false;
}
if(d==""||d==null){
  getObj("fn").innerHTML = imgq;
  isValid = false;
}
if(e==""||e==null){
  getObj("ln").innerHTML = imgq;
  isValid = false;
}
if(f==""||f==null){
  getObj("age").innerHTML = imgq;
  isValid = false;
}
if(g==""||g==null){
  getObj("utp").innerHTML = imgq;
  isValid = false;
}
if(h==""||h==null){
  getObj("salary").innerHTML = imgq;
  isValid = false;
}
return isValid;
}

function isChecked()
	{
		var edit_radio = document.getElementsByName("edit_user");
		for(i = 0; i < edit_radio.length; i++)
		{
			if(edit_radio[i].checked)
				return true;	
		}
		return false;
	}

function unshow(id)
{
	document.getElementById(id).style.display="none";
	}

function show(id)
	{
	document.getElementById(id).style.display="";
}

function showAdd()
{
unshow("allusers");
unshow("editbutton");
unshow("addbutton");
show("adduser");
}

function unshowAdd()
{
show("allusers");
show("editbutton");
show("addbutton");
unshow("adduser");
}
</script>
</head>

<body>
<div class="userInfo" id="userInfo">
  <div class="header" id="header">	
   <div class="welcom">Welcome, Administrator</div>
   <div style="float:right;"> 
   <a href="logout.php"><input type="button" class="butn" id="logout" name="logout" value="Logout"></a> 
   </div>
  </div>
  <div class="clear"></div>
	
  <div id="content">
  <?php if($row=mysql_fetch_array($res)){ ?>	

	<form name="editU" method="post" action="edit_user.php" onSubmit="return isChecked()">
	<div class="allusers" id="allusers">
	<table border="1" align="left">    
		<tr>
			<th>Edit</th>
			<th>User Id</th>
			<th>Username</th>
			<th>Password</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Age</th>
			<th>Usertype</th>
			<th>Salary</th>
	    </tr>
	<?php
	
	while($row2 = mysql_fetch_array($res2)){ ?>
		<tr>
		<td><input type="radio" name = "edit_user" value = "<?php echo $row2['userid']; ?>"/></td>
		<td><?php echo $row2['userid']; ?></td>
		<td><?php echo $row2['username']; ?></td>
		<td><?php echo $row2['password']; ?></td>
		<td><?php echo $row2['firstname'];?></td>
		<td><?php echo $row2['lastname']; ?></td>
		<td><?php echo $row2['age'];      ?></td>
		<td><?php echo $row2['usertype']; ?></td>
		<td><?php echo $row2['salary'];   ?></td>
	    </tr>	
	<?php } ?>
	</table> 
	</div>
	
	<div class="btn" id="editbutton">
    <input type="submit" value="Edit" class="butn"/>
	</div>
    
	<div class="btn" id="addbutton">
    <input type="button" value="Add" class="butn" onClick="showAdd()"/>
	</div>
  
  </form>
  <?php  } ?> 
  
  <div id="adduser" style="display:none;">
   	
    <form name="adduserForm" method="post" action="add_user.php" onSubmit="return validate()">

	  <div class="allusers" >
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
		    <td><input id="newuserid" name="newuserid" type="text" onBlur="checkValid('uid')"/><span id="uid"></span></td>
			<td><input id="newusername" name="newusername" type="text" onBlur="checkValid('un')"/><span id="un"></span></td>
			<td><input id="newpassword" name="newpassword" type="text" onBlur="checkValid('pw')"/><span id="pw"></span></td>
			<td><input id="newfirstname" name="newfirstname" type="text" onBlur="checkValid('fn')"/><span id="fn"></span></td>
			<td><input id="newlastname" name="newlastname" type="text" onBlur="checkValid('ln')"/><span id="ln"></span></td>
			<td><input id="newage" name="newage" type="text" onBlur="checkValid('age')"/><span id="age"></span></td>
			<td><input id="newusertype" name="newusertype" type="text" onBlur="checkValid('utp')"/><span id="utp"></span></td>
			<td><input id="newsalary" name="newsalary" type="text" onBlur="checkValid('salary')"/><span id="salary"></span></td>
		</tr>
		</table>
		</div>
      <span style="float:left; font-size:9px; color:blue;" id="errmsg"></span>
	  <input style="float:right;" type="submit" name="submit" value="Add" class="butn"/>
	  <input style="float:right;" type="button" name="back" value="Back" class="butn" onClick="unshowAdd()"/>
	  
	</form>

  </div>
  
 </div>
 
</div>

</body>