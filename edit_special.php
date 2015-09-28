<?php
 session_start();
 setcookie(session_name(),session_id(),time()+60*30,"/");
 if($_SESSION['usertype']!='salesmanager')
	{
	header("location:login.php");
	}

    $specialname=$_GET['edit_pro'];
    $con = mysql_connect('localhost', 'root', '36631213');
		if(!$con){
			die('Cannot connect to the server.');	
		}
	mysql_select_db('coolbook',$con);
    $sql = "SELECT PName,PCate,PPrice,SPrice,Discount,Startdate,Enddate FROM product, specialsale WHERE PName='$specialname' AND product.PId=specialsale.PId";
    $res = mysql_query($sql);
	$product_info = mysql_fetch_array($res);
	
?>
<head>
<link rel="stylesheet" href="edit_special.css" type="text/css">
<title>Edit Special Sale</title>
</head>

<body>
<div class="editProduct">
 <div id="content">
  <form id="editspecialForm" method="get" action="sub_edit_special.php" >
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
		<tr>
		
		<td><input type="text" id="spname" name="spname" value="<?php echo $product_info['PName']; ?>" style="display:none"/><?php echo $product_info['PName']; ?></td>
		<td><input type="text" id="spcate" name="spcate" value="<?php echo $product_info['PCate']?>" style="display:none"/><?php echo $product_info['PCate']?></td>
		<td><input type="text" id="spprice" name="spprice" value="<?php echo $product_info['PPrice']; ?>" style="display:none"/><?php echo $product_info['PPrice']; ?></td>
		<td><input type="text" id="ssprice" name="ssprice" value="<?php echo $product_info['SPrice']; ?>"/></td>
		<td><input type="text" id="dis" name="dis" value="<?php echo $product_info['Discount']; ?>"/></td>
		<td><input type="text" id="sdate" name="sdate" value="<?php echo $product_info['Startdate']; ?>"/></td>
		<td><input type="text" id="edate" name="edate" value="<?php echo $product_info['Enddate']; ?>"/></td>
	    </tr>	
	</table>
	</div>

	<div class="btn">
	<input class="butn" type="submit" value="Save Edit"/>
	</div>
  </form>
  <div class="btn">
  <form action="del_special.php" method="get">
    <input type="text" id="s_name" name="s_name" value="<?php echo $product_info['PName']; ?>" style="display:none"/>
  	<input class="butn" type="submit" value="Delete Special"/>
	<a href="special.php"><input type="button" value="Back" class="butn"/></a>
  </form>
  </div>
   </div>
  </div>
</body>
