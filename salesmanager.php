<?php
 session_start();
 setcookie(session_name(),session_id(),time()+60*30,"/");
if($_SESSION['usertype']!='salesmanager')
	{
	header("location:login.php");
	}
 
 
    $con = mysql_connect('localhost', 'root', '36631213');
		if(!$con){
			die('Cannot connect to the server.');			
		}
	mysql_select_db('coolbook',$con);
    $sql = "SELECT DISTINCT PCate FROM product";
    $res = mysql_query($sql);
	$res2 = mysql_query($sql);
	$res3 = mysql_query($sql);
	
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="product.css" type="text/css">
<title>Product Management</title>
<script>
var imgq="<img src='http://www.precisionmarketinggroup.com/Portals/40444/images/question-mark.jpg' width=24px height=20px align='absmiddle' hspace='2'>";

function getObj(id)
{
  return document.getElementById(id);
}

var isValid;
function checkValid(id)
{
	var x;	
	if(id == "cn")
	{
		x = getObj("newcateName").value;
		if (x==null || x=="") {
			getObj("cn").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("cn").innerHTML = "";			
	}
	else if(id == "bn")
	{
		x=getObj("newbookName").value;
		if(x == "" || x == null){
			getObj("bn").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("bn").innerHTML = "";
	}
	else if(id == "bid")
	{
		x=getObj("newbookId").value;
		if(x == "" || x == null){
			getObj("bid").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("bid").innerHTML = "";
	}
	else if(id == "bp")
	{
		x=getObj("newbookPrice").value;
		if(x == "" || x == null){
			getObj("bp").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("bp").innerHTML = "";
	}
	return isValid;
}

function unshow(id)
{
	document.getElementById(id).style.display="none";
}

function show(id)
{
		<?php while($row3=mysql_fetch_array($res3)){ ?>	
		unshow('<?php echo $row3[0]?>');
		<?php  } ?>
		unshow("addcate");
	document.getElementById(id).style.display="";
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

function addValidate()
{
isValid = true;
var a = getObj("newcateName").value;
var b = getObj("newbookName").value;
var c = getObj("newbookId").value;
var d = getObj("newbookPrice").value;

if(a==""||a==null){
  getObj("cn").innerHTML = imgq;
  isValid = false;
}
if(b==""||b==null){
  getObj("bn").innerHTML = imgq;
  isValid = false;
}
if(c==""||c==null){
  getObj("bid").innerHTML = imgq;
  isValid = false;
}
if(d==""||d==null){
  getObj("bp").innerHTML = imgq;
  isValid = false;
}
return isValid;

}
</script>
</head>

<body>

<div class="productInfo" id="productInfo">
  <div class="header" id="header">	
  <div class="welcom">Welcome, sales manager
    <div style="float:right;margin:0;">
      <a href="logout.php"><input type="button" class="butn" value="Logout"/></a>
    </div>
	<div style="float:right;margin:0;">
      <a href="special.php"><input type="button" class="butn" value="Special Sales"/></a>
    </div>
  </div>
	<ul id="nav">
	<?php while($row=mysql_fetch_array($res)){ ?>	
	    <li><a href="#<?php echo $row[0]; ?>" onClick="show('<?php echo $row[0]?>')"><?php echo ($row[0]);?></a></li>
	<?php  } ?>
	    <li><a href="#addcate" onClick="show('addcate')"> + </a></li>
	</ul>		
  </div>
  <div class="clear"></div>

  <div id="content">
  <?php while($row2=mysql_fetch_array($res2)){ ?>	

  <div class="categoreis" name="categoreis" id="<?php echo $row2[0]?>" style="display:none;">
	<form name="editP" method="GET" action="edit_product.php" onSubmit="return isChecked()">
	<div class="category">
	<table border="1" align="left">    
		<tr>
			<th>Edit</th>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
	    </tr>
	<?php
	$select_all = "SELECT * FROM product WHERE PCate = '$row2[0]'";
	$result = mysql_query($select_all);
	//echo $result;
	while($product_info = mysql_fetch_array($result)){ ?>
		<tr>
		<td><input type="radio" name = "edit_pro" value = "<?php echo $product_info['PId'] ?>"/></td>
		<td><?php echo $product_info['PId']; ?></td>
		<td><?php echo $product_info['PName']; ?></td>
		<td><?php echo $row2[0]?></td>
		<td><?php echo $product_info['PPrice']; ?></td>
	    </tr>	
	<?php } ?>
	</table> </div>
	
	<div class="btn">
    <input type="submit" value="Edit" class="butn"/>
	<p id="msg1" style="color:red;"></p>
	</div>
	</form>
  </div>
  <?php  } ?>
  
  <div id="addcate" style="display:none;">
   	<script>


*/
	</script>
    <form name="addCateForm" method="post" action="add_cate.php" onSubmit="return addValidate()">
	  <p id="errmsg"></p>
	  <h3>You can create new product here.</h3>
	  <p>If you want to have new category for your new product, just fill in the blank.</p>
	  <p>If you want to delete a category, make sure nothing in it.</p>
	  <p>Once you delete all the books in a category, the category will be delete.</p>
	  <p>(Book ID should be unique)</p>
	  <div class="category">
	  	<table border="1" align="left">    
		<tr>
			<th>Category Name</th>
			<th>Book ID</th>
			<th>Book Name</th>
			<th>Book Price</th>
	    </tr>
		<tr>
		    <td><input id="newcateName" name="newcateName" type="text" onBlur="checkValid('cn')"/><span id="cn"></span></td>
			<td><input id="newbookId" name="newbookId" type="text" onBlur="checkValid('bid')"/><span id="bid"></span></td>
			<td><input id="newbookName" name="newbookName" type="text" onBlur="checkValid('bn')"/><span id="bn"></span></td>
			<td><input id="newbookPrice" name="newbookPrice" type="text" onBlur="checkValid('bp')"/><span id="bp"></span></td>
		</tr>
		</table>
		</div>

	  <input type="submit" name="submit" value="Add" class="butn"/>
	  
	</form>

  </div>
 
 </div>
  
</div>

</body>

