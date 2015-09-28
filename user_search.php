<?php
  session_start();
  setcookie(session_name(),session_id(),time()+60*30,"/");
  if($_SESSION['usertype']!='manager')
	{
	header("location:login.php");
	}
 
    $con = mysql_connect('localhost', 'root', '36631213');
		if(!$con){
			die('Cannot connect to the server.');			
		}
	mysql_select_db('coolbook',$con);
		
?>
<head>
<link rel="stylesheet" href="product.css" type="text/css">
<title>Search User</title>
<body>

<?php
	if($_GET['user_op']=="type")
	{
	$type = $_GET['from'];
	$sql = "SELECT * FROM users WHERE usertype='$type'";
	$res = mysql_query($sql);?>
<div class="category">	
<table border="1" align="left">    
		<tr>
			<th>User Id</th>
			<th>User Name</th>
			<th>password</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Employee Type</th>
			<th>Salary</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['userid']; ?></td>
		<td><?php echo $product_info['username']; ?></td>
		<td><?php echo $product_info['password']; ?></td>
		<td><?php echo $product_info['firstname']; ?></td>
		<td><?php echo $product_info['lastname']; ?></td>
		<td><?php echo $product_info['age']; ?></td>
		<td><?php echo $product_info['usertype']; ?></td>
		<td><?php echo $product_info['salary']; ?></td>
	    </tr>	
	<?php 
	$se++;	
	} 
	echo "There are $se result.";
	?>
	</table></div>
	<a href="manager.php"><input type="button" value="Back" class="butn"/></a>
	<?php } 
	else if($_GET['user_op']=="range")
	{
	$from = $_GET['from'];
	$end = $_GET['end'];
	$sql = "SELECT * FROM users WHERE salary>='$from' and salary<='$end'";
	$res = mysql_query($sql);?>
<div class="category">	
<table border="1" align="left">    
		<tr>
			<th>User Id</th>
			<th>User Name</th>
			<th>password</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Employee Type</th>
			<th>Salary</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['userid']; ?></td>
		<td><?php echo $product_info['username']; ?></td>
		<td><?php echo $product_info['password']; ?></td>
		<td><?php echo $product_info['firstname']; ?></td>
		<td><?php echo $product_info['lastname']; ?></td>
		<td><?php echo $product_info['age']; ?></td>
		<td><?php echo $product_info['usertype']; ?></td>
		<td><?php echo $product_info['salary']; ?></td>
	    </tr>	
	<?php 
	$se++;	
	} 
	echo "There are $se result.";
	?>
	</table></div>
	<a href="manager.php"><input type="button" value="Back" class="butn"/></a>
<?php } ?>
</body>