<?phpsession_start();setcookie(session_name(),session_id(),time()+60*30,"/");  $username=$_POST['username'];  $password=$_POST['pw'];  $errText="";      $displayLoginPage=true;  if(strlen($username)==0)    {$errText='Please enter username!';}  if(strlen($password)==0)    {$errText='Please enter password!';}  if(strlen($username)==0&&strlen($password)==0)    {$errText='';}  if(strlen($username)>0&&strlen($password)>0)    {     $con=mysql_connect('localhost','root','36631213');     if(!$con)       {die ('Cannot connect to Database!');}	 else	 {mysql_select_db('coolbook',$con);}	 $sql="SELECT usertype FROM users WHERE username='$username' AND password='$password'";	      $res=mysql_query($sql);     if(!($row=mysql_fetch_assoc($res)))	   {	   $errText='User does not exist! <br />Please check your username and password!';	   }     else	   {	   $usertype=$row['usertype'];	   $_SESSION['usertype']=$usertype;	   	   if($row['usertype']=='administrator')	      {header('location:administrator.php');}	    else if($row['usertype']=='manager')		  {header( 'location:manager.php');}		else		  {header('location:salesmanager.php');}		$displayLoginPage=false;	   }    }  if($displayLoginPage)    {	require 'login.html';  ?>    <p style="color:red;text-align:center">	  <?php echo $errText; ?>	</p>	<?php 	} ?>