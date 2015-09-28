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
<title>Manager</title>
<script>
function getObj(id)
{
   return document.getElementById(id);
}
function getObj2(name)
{
   return document.getElementsByName(name);
}

function unshow(id)
{
	getObj(id).style.display="none";
}

function show(id)
{
		unshow("user");
		unshow("products");
		unshow("specialsale");
	    getObj(id).style.display="block";
}

function validate1()
{
var a = getObj("from1").value;
var b = getObj("user_op").value;
var c = getObj("end1").value;

if( a =="")  {
  getObj("err1").innerHTML = "Blank input";
return false;
}
if( b =="range"){
    if(c ==""||c == null) {
	getObj("err1").innerHTML = "Blank range input";
	return false;
	}
}	
getObj("err1").innerHTML = "";
return true;
}

function validate2()
{
var a = getObj("from2").value;
var b = getObj("pro_op").value;
var c = getObj("end2").value;

if( a =="")  {
  getObj("err2").innerHTML = "Blank input";
return false;
}
if( b =="range"){
    if(c ==""||c == null) {
	getObj("err2").innerHTML = "Blank range input";
	return false;
	}
}	
getObj("err2").innerHTML = "";
return true;
}
function validate3()
{
var a = getObj("from3").value;
var b = getObj("sp_op").value;
var c = getObj("end3").value;

if( a =="")  {
  getObj("err3").innerHTML = "Blank input";
return false;
}
if( b =="range"){
    if(c ==""||c == null) {
	getObj("err3").innerHTML = "Blank range input";
	return false;
	}
}	
getObj("err3").innerHTML = "";
return true;
}

</script>

</head>

<body>
<div class="productInfo" id="manager">
<div class="header" id="header" style="width:70%">
  <div class="welcom" style=" margin-top:50px; display:inline;">Welcome, manager
    <div style="float:right;">
      <a href="logout.php"><input type="button" class="butn" value="Logout"/></a>
    </div>
  </div>
  <div class="clear"></div>
  <ul id="nav">
    <li><a href="#user" onClick="show('user')"> Users </a></li>
    <li><a href="#products" onClick="show('products')"> Products </a></li> 
    <li><a href="#specialsale" onClick="show('specialsale')"> Special sale </a></li> 
  </ul>
</div>

<div class="clear"></div>

<div id="content">

<div class="categoreis" name="user" id="user" style="display:none;">
    <div class="category">
	<p id="err1" style="font-size:9px; color:red;"></p>
	  <form id="u_search_form" method="get" action="user_search.php" onSubmit="return validate1()">
	  You can search users by:	  
	  <select name="user_op" id="user_op">
	    <option value="type">Employee Type</option>
		<option value="range">Payment Range</option>
	  </select>
	  <input type="text" name="from" id="from1"/> (to <input type="text" name="end" id="end1"/>)
	  <input type="submit" value="Search User" class="butn"/>
	  </form>
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
    $sql = "SELECT * FROM users";
    $res = mysql_query($sql);
		
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
	<?php } ?>
        </table>
	</div>

</div>

<div class="categoreis" name="products" id="products" style="display:none;">

    <div class="category">
	<p id="err2" style="font-size:9px; color:red;"></p>	
	  <form id="pro_search_form" method="get" action="pro_search.php" onSubmit="return validate2()">
	  You can search products by:	  
	  <select name="pro_op" id="pro_op">
	    <option value="range">Price Range</option>
		<option value="name">Product Name</option>
		<option value="cate">Category</option>
	  </select>
	  <input type="text" name="from" id="from2"/> (to <input type="text" name="end" id="end2"/>)
	  <input type="submit" value="Search Product" class="butn" />
	  </form>
	  
	    <table border="1" align="left">    
		<tr>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
	    </tr>
		
	<?php 
    $sql = "SELECT * FROM product";
    $res = mysql_query($sql);
		
	while($product_info = mysql_fetch_array($res)){ ?>
		<tr>
		<td><?php echo $product_info['PId']; ?></td>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $product_info['PCate']; ?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
	    </tr>	
	<?php } ?>
        </table>
	</div>
	
</div>

<div class="categoreis" name="specialsale" id="specialsale" style="display:none;">
	<p id="err3" style="font-size:9px; color:red;"></p>
    <div class="category">
	  <form id="special_search_form" method="get" action="special_search.php" onSubmit="return validate3()">
	  You can search special sales by:	  
	  <select name="sp_op" id="sp_op">
	    <option value="name">Product Name</option>
		<option value="range">Price Range</option>
		<option value="cate">Category</option>
		<option value="start">Start Date</option>
		<option value="end">End Date</option>
	  </select>
	  <input type="text" name="from" id="from3"/> (to <input type="text" name="end" id="end3"/>)
	  <input type="submit" value="Search Special Sale" class="butn"/>
	  </form>
	  
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
    $sql = "SELECT PName,PCate,PPrice,SPrice,Discount,Startdate,Enddate FROM product, specialsale WHERE product.PId=specialsale.PId";
    $res = mysql_query($sql);
		
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
	<?php } ?>
        </table>
	</div>

</div>

</div>

</div> 
  
</body>

