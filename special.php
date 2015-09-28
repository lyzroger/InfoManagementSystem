<?php
 session_start();
 setcookie(session_name(),session_id(),time()+60*30,"/");
 if($_SESSION['usertype']!='salesmanager')
	{
	header("location:login.php");
	}

    $con = mysql_connect('localhost', 'root', '36631213');
	if(!$con) 
	  {
	  die ('Cannot connect to Database!');
	  }
	mysql_select_db('coolbook',$con);
    $sql = "SELECT PName,PCate,PPrice,SPrice,Discount,Startdate,Enddate FROM product, specialsale WHERE product.PId=specialsale.PId";
    $res = mysql_query($sql);
	$res2 = mysql_query($sql);
	//$res3 = mysql_query($sql);
	?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="special.css" type="text/css">
<title>Special Sale Management</title>

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
	if(id == "spi")
	{
		x = getObj("newspecialpi").value;
		if (x==null || x=="") {
			getObj("spi").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("spi").innerHTML = "";			
	}
	else if(id == "spn")
	{
		x = getObj("newspecialpn").value;
		if (x==null || x=="") {
			getObj("spn").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("spn").innerHTML = "";			
	}
	else if(id == "spc")
	{
		x=getObj("newspecialpc").value;
		if(x == "" || x == null){
			getObj("spc").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("spc").innerHTML = "";
	}
	else if(id == "spp")
	{
		x=getObj("newspecialpp").value;
		if(x == "" || x == null){
			getObj("spp").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("spp").innerHTML = "";
	}
	else if(id == "ssp")
	{
		x=getObj("newspecialsp").value;
		if(x == "" || x == null){
			getObj("ssp").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("ssp").innerHTML = "";
	}
	else if(id == "dis")
	{
		x=getObj("newdiscount").value;
		if(x == "" || x == null){
			getObj("dis").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("dis").innerHTML = "";
	}
	else if(id == "sd")
	{
		x=getObj("newsdate").value;
		if(x == "" || x == null){
			getObj("sd").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("sd").innerHTML = "";
	}
	else if(id == "ed")
	{
		x=getObj("newedate").value;
		if(x == "" || x == null){
			getObj("ed").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("ed").innerHTML = "";
	}
	
	return isValid;
}

function validate()
{
isValid = true;
var a = checkValid("spi");
var b = checkValid("spn");
var c = checkValid("spc");
var d = checkValid("spp");
var e = checkValid("ssp");
var f = checkValid("dis");
var g = checkValid("sd");
var h = checkValid("ed");

if(!a&&b&&c&&d&&e&&f&&g&&h) isValid = false;
return isValid;
}

function isChecked()
	{
		var edit_radio = document.getElementsByName("edit_pro");
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
unshow("allspecial");
unshow("editbutton");
unshow("addbutton");
unshow("backbutton");
show("addspecial");
}

function unshowAdd()
{
show("allspecial");
show("editbutton");
show("addbutton");
show("backbutton");
unshow("addspecial");
}
</script>
</head>

<body>
<div class="ProductInfo" id="ProductInfo">
  <div class="header" id="header">	
   <div class="welcom">Special Sales</div>
   <div style="float:right;"> 
   <a href="logout.php"><input type="button" class="butn" id="logout" name="logout" value="Logout"></a> 
   </div>
  </div>
  <div class="clear"></div>
	
  <div id="content">
  <?php if($row=mysql_fetch_array($res)){ ?>	

	<form name="editP" method="get" action="edit_special.php" onSubmit="return isChecked()">
	<div class="allspecial" id="allspecial">
	<table border="1" align="left">    
		<tr>
			<th>Edit</th>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
			<th>Special Price</th>
			<th>Discount</th>
			<th>Start Date</th>
			<th>End Date</th>
	    </tr>
	<?php
	
	while($row2 = mysql_fetch_array($res2)){ ?>
		<tr>
		<td><input type="radio" name = "edit_pro" value = "<?php echo $row2['PName']; ?>"/></td>
		<td><?php echo $row2['PName']; ?></td>
		<td><?php echo $row2['PCate']; ?></td>
		<td><?php echo $row2['PPrice']; ?></td>
		<td><?php echo $row2['SPrice'];?></td>
		<td><?php echo $row2['Discount']; ?></td>
		<td><?php echo $row2['Startdate'];      ?></td>
		<td><?php echo $row2['Enddate']; ?></td>
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
	
	<div class="btn" id="backbutton">
	<a href="salesmanager.php"><input type="button" value="Back" class="butn"/></a>
	</div>
  
  </form>
  <?php  } ?> 
  
  <div id="addspecial" style="display:none;">
   	
    <form name="addspecialForm" method="get" action="add_special.php" onSubmit="return validate()">

	  <div class="allspecial" >
	  	<table border="1" align="left">    
		<tr>
		    <th>Product ID</th>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
			<th>Special Price</th>
			<th>Discount</th>
			<th>Start Date</th>
			<th>End Date</th>
	    </tr>
		<tr>
		    <td><input id="newspecialpi" name="newspecialpi" type="text" onBlur="checkValid('spi')"/><span id="spi"></span></td>
		    <td><input id="newspecialpn" name="newspecialpn" type="text" onBlur="checkValid('spn')"/><span id="spn"></span></td>
			<td><input id="newspecialpc" name="newspecialpc" type="text" onBlur="checkValid('spc')"/><span id="spc"></span></td>
			<td><input id="newspecialpp" name="newspecialpp" type="text" onBlur="checkValid('spp')"/><span id="spp"></span></td>
			<td><input id="newspecialsp" name="newspecialsp" type="text" onBlur="checkValid('ssp')"/><span id="ssp"></span></td>
			<td><input id="newdiscount" name="newdiscount" type="text" onBlur="checkValid('dis')"/><span id="dis"></span></td>
			<td><input id="newsdate" name="newsdate" type="text" onBlur="checkValid('sd')"/><span id="sd"></span></td>
			<td><input id="newedate" name="newedate" type="text" onBlur="checkValid('ed')"/><span id="ed"></span></td>
		</tr>
		</table>
		</div>

	  <input style="float:right;" type="submit" name="submit" value="Add" class="butn"/>
	  <input style="float:right;" type="button" name="back" value="Back" class="butn" onClick="unshowAdd()"/>
	  
	</form>

  </div>
  
 </div>
 
</div>

</body>	


