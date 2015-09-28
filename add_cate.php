<?php
  session_start();
  setcookie(session_name(),session_id(),time()+60*30,"/");
  if($_SESSION['usertype']!='salesmanager')
	{
	header("location:login.php");
	}

	$bookid=$_POST['newbookId'];
	$bookname=$_POST['newbookName'];
	$bookprice=$_POST['newbookPrice'];
	$catename=$_POST['newcateName'];

	$con = mysql_connect('localhost', 'root', '36631213');
		if(!$con){
			die('Cannot connect to the server.');			
		}
	mysql_select_db('coolbook',$con);
	$sql_valide = "SELECT PName FROM product WHERE PId='$bookid'";
	$result =  mysql_query($sql_valide);
	if($row = mysql_fetch_array($result))
	{
	   echo "$bookid already exists.";
	}
	else{
    $sql = "INSERT INTO product VALUES ('$bookid','$bookname','$bookprice','$catename')";
    $res = mysql_query($sql)or die("<span style=\"color:red\">error add product_category</span>");
	echo "<p style='color:blue'>$bookid has been added successfully</p>";
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="edit_product.css" type="text/css">
<title>Add Product/Category</title>
</head>

<body>
<a href="salesmanager.php"><input type="button" value="Back" class="butn"/></a>
</body>

