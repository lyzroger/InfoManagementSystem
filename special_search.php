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
<title>Search Special Sale</title>
<body>

<?php
	if($_GET['sp_op']=="name")
	{
	$name = $_GET['from'];
	
    $sql = "SELECT PName,PCate,PPrice,SPrice,Discount,Startdate,Enddate FROM product,specialsale WHERE product.PId=specialsale.PId AND PName='$name'";
	
	$res = mysql_query($sql);?>
	
<div class="category">	
<table border="1" align="left">    
		<tr>
			
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
			<th>Special Price</th>
			<th>Discount</th>
			<th>Start Date</th>
			<th>End Date</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
		<td><?php echo $product_info['SPrice']; ?></td>
		<td><?php echo $product_info['Discount']; ?></td>
		<td><?php echo $product_info['Startdate']; ?></td>
		<td><?php echo $product_info['Enddate']; ?></td>
	    </tr>			
	<?php 
	$se++;	
	} 
	echo "There are $se result.";
	?>
	</table></div>
	<a href="manager.php"><input type="button" value="Back" class="butn"/></a>
	<?php } 
	
	else if($_GET['sp_op']=="range")
	{
	$from = $_GET['from'];
	$end = $_GET['end'];
	$sql = "SELECT PName,PCate,PPrice,SPrice,Discount,Startdate,Enddate FROM product,specialsale WHERE product.PId=specialsale.PId AND SPrice>='$from' AND SPrice<='$end'";
	$res = mysql_query($sql);?>
<div class="category">	
<table border="1" align="left">    
		<tr>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
			<th>Special Price</th>
			<th>Discount</th>
			<th>Start Date</th>
			<th>End Date</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
		<td><?php echo $product_info['SPrice']; ?></td>
		<td><?php echo $product_info['Discount']; ?></td>
		<td><?php echo $product_info['Startdate']; ?></td>
		<td><?php echo $product_info['Enddate']; ?></td>
	    </tr>	
	<?php 
	$se++;	
	} 
	echo "There are $se result.";
	?>
	</table></div>
	<a href="manager.php"><input type="button" value="Back" class="butn"/></a>
<?php } 

	else if($_GET['sp_op']=="cate")
	{
	$cate = $_GET['from'];
	
    $sql = "SELECT PName,PCate,PPrice,SPrice,Discount,Startdate,Enddate FROM product,specialsale WHERE product.PId=specialsale.PId AND PCate='$cate'";
	
	$res = mysql_query($sql);?>
	
<div class="category">	
<table border="1" align="left">    
		<tr>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
			<th>Special Price</th>
			<th>Discount</th>
			<th>Start Date</th>
			<th>End Date</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
		<td><?php echo $product_info['SPrice']; ?></td>
		<td><?php echo $product_info['Discount']; ?></td>
		<td><?php echo $product_info['Startdate']; ?></td>
		<td><?php echo $product_info['Enddate']; ?></td>
	    </tr>			
	<?php 
	$se++;	
	} 
	echo "There are $se result.";
	?>
	</table></div>
	<a href="manager.php"><input type="button" value="Back" class="butn"/></a>
	<?php } 
	
	else if($_GET['sp_op']=="start")
	{
	$start = $_GET['from'];
	//$sql = "SELECT * FROM specialsale WHERE Startdate='$start'";
	$sql = "SELECT PName,PCate,PPrice,SPrice,Discount,Startdate,Enddate FROM product,specialsale WHERE product.PId=specialsale.PId AND Startdate='$start'";
	$res = mysql_query($sql);?>
	
<div class="category">	
<table border="1" align="left">    
		<tr>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
			<th>Special Price</th>
			<th>Discount</th>
			<th>Start Date</th>
			<th>End Date</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
		<td><?php echo $product_info['SPrice']; ?></td>
		<td><?php echo $product_info['Discount']; ?></td>
		<td><?php echo $product_info['Startdate']; ?></td>
		<td><?php echo $product_info['Enddate']; ?></td>
	    </tr>			
	<?php 
	$se++;	
	} 
	echo "There are $se result.";
	?>
	</table></div>
	<a href="manager.php"><input type="button" value="Back" class="butn"/></a>
	<?php } 
			
	else if($_GET['sp_op']=="end")
	{
	$end = $_GET['from'];
	//$sql = "SELECT * FROM specialsale,product WHERE Enddate='$end'";
	$sql = "SELECT PName,PCate,PPrice,SPrice,Discount,Startdate,Enddate FROM product,specialsale WHERE product.PId=specialsale.PId AND Enddate='$end'";
	$res = mysql_query($sql);?>
	
<div class="category">	
<table border="1" align="left">    
		<tr>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
			<th>Special Price</th>
			<th>Discount</th>
			<th>Start Date</th>
			<th>End Date</th>
	    </tr>
<?php
$se = 0;
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
		<td><?php echo $product_info['SPrice']; ?></td>
		<td><?php echo $product_info['Discount']; ?></td>
		<td><?php echo $product_info['Startdate']; ?></td>
		<td><?php echo $product_info['Enddate']; ?></td>
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