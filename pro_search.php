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
<title>Search Product</title>
<body>

<?php
	if($_GET['pro_op']=="name")
	{
	$name = $_GET['from'];
	$sql = "SELECT * FROM product WHERE PName='$name'";
	$res = mysql_query($sql);?>
<div class="category">	
 <table border="1" align="left">    
		<tr>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['PId']; ?></td>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
	    </tr>		
	<?php 
	$se++;	
	} 
	echo "There are $se result.";
	?>
	</table></div>
	<a href="manager.php"><input type="button" value="Back" class="butn"/></a>
	<?php } 
	
	else if($_GET['pro_op']=="range")
	{
	$from = $_GET['from'];
	$end = $_GET['end'];
	$sql = "SELECT * FROM product WHERE PPrice>='$from' and PPrice<='$end'";
	$res = mysql_query($sql);?>
<div class="category">	
 <table border="1" align="left">    
		<tr>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['PId']; ?></td>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
	    </tr>	
	<?php 
	$se++;	
	} 
	echo "There are $se result.";
	?>
	</table></div>
	<a href="manager.php"><input type="button" value="Back" class="butn"/></a>
<?php } 

	else if($_GET['pro_op']=="cate")
	{
	$from = $_GET['from'];
	$end = $_GET['end'];
	$sql = "SELECT * FROM product WHERE PCate='$from'";
	$res = mysql_query($sql);?>
<div class="category">	
 <table border="1" align="left">    
		<tr>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['PId']; ?></td>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
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