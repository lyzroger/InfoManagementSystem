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
    $sql = "SELECT * FROM product WHERE PId='$_GET[edit_pro]'";
    $res = mysql_query($sql);
	$product_info = mysql_fetch_array($res);
	
?>
<head>
<link rel="stylesheet" href="edit_product.css" type="text/css">
<title>Edit Product</title>
<script language="javascript">
var imgq="<img src='http://www.precisionmarketinggroup.com/Portals/40444/images/question-mark.jpg' width=24px height=20px align='absmiddle' hspace='2'>";

function getObj(id)
{
  return document.getElementById(id);
}

var isValid;
function validate()
{
    isValid = true;
	var a = getObj("pname").value;
	var b = getObj("pcate").value;
	var c = getObj("pprice").value;

	if(a==""||a==null){
	  getObj("pn").innerHTML = imgq;
	  isValid = false;
	}
	if(b==""||b==null){
	  getObj("pc").innerHTML = imgq;
	  isValid = false;
	}
	if(c==""||c==null){
	  getObj("pp").innerHTML = imgq;
	  isValid = false;
	}
	return isValid;
}
function checkValid(id)
{
	var x;	
	if(id == "pn")
	{
		x = getObj("pname").value;
		if (x==null || x=="") {
			getObj("pn").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("pn").innerHTML = "";			
	}
	else if(id == "pc")
	{
		x=getObj("pcate").value;
		if(x == "" || x == null){
			getObj("pc").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("pc").innerHTML = "";
	}
	else if(id == "pp")
	{
		x=getObj("pprice").value;
		if(x == "" || x == null){
			getObj("pp").innerHTML = imgq;
			isValid = false;
		}
		else
			getObj("pp").innerHTML = "";
	}

	return isValid;
}

</script>
</head>

<body>
<div class="editProduct">
 <div id="content">
  <form id="editProForm" method="post" action="sub_edit_pro.php" onSubmit="return validate()">
  <div class="category">
	<table border="1" align="left">    
		<tr>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Product Category</th>
			<th>Product Price</th>
	    </tr>
		<tr>
		<td><input type="text" id="pid" name="pid" value="<?php echo $product_info['PId']; ?>" style="display:none"/>
		<?php echo $product_info['PId']; ?></td>
		<td><input type="text" id="pname" name="pname" value="<?php echo $product_info['PName']; ?>" size="40" onBlur="checkValid('pn')"/>
		<span id="pn"></span></td>
		<td><input type="text" id="pcate" name="pcate" value="<?php echo $product_info['PCate']?>" onBlur="checkValid('pc')"/>
		<span id="pc"></span></td>
		<td><input type="text" id="pprice" name="pprice" value="<?php echo $product_info['PPrice']; ?>" onBlur="checkValid('pp')"/>
		<span id="pp"></span></td>
	    </tr>	
	</table>
	</div>

	<div class="btn">
	<input class="butn" type="submit" value="Save Edit"/>
	</div>
  </form>
  <div class="btn">
  <form action="del_pro.php" method="get">
    <input type="text" id="p_id" name="p_id" value="<?php echo $product_info['PId']; ?>" style="display:none"/>
  	<input class="butn" type="submit" value="Delete Product"/>
	<a href="salesmanager.php"><input type="button" value="Back" class="butn"/></a>
  </form>
  </div>
   </div>
  </div>
</body>

