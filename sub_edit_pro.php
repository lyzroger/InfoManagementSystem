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
	
	$pro_id=$_POST['pid'];
	$pro_name=$_POST['pname'];
	$pro_cate=$_POST['pcate'];
	$pro_price=$_POST['pprice'];
   // $sql = "update product set PName='$pro_name' where PId='$pro_id'";
	//$up_suc = mysql_query($sql);
	$update_pro_sql = "UPDATE product SET PName='$pro_name',PPrice='$pro_price', PId='$pro_id', PCate='$pro_cate' WHERE PId= '$pro_id'";
	$update_suc = mysql_query($update_pro_sql);	

	if($update_suc){
		header("location:salesmanager.php");
		exit();
	}
	else{
		echo "You haven't modified the product.";
	}
?>

