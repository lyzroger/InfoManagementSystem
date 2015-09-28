<?php
  session_start();
  session_unset();
  session_destroy();
?>  

<html>
<head>
<link rel="stylesheet" href="homework3.css" type="text/css"/>
<title>CoolBook</title>
</head>
<body>
  <div class="header" id="header">
    <div style="float:left;"><img src="http://mymcbooks.files.wordpress.com/2011/01/clip-art-book.jpg" alt="book" width="85" height="75"/></div>
	<div style="padding:0.5px; font-size:32px; font-style:italic;"><p>CoolBook</p></div>
  </div>
  <div class="logout" id="logout">
  Logout successfully, you can <a style='text-decoration:none;color:blue;' href ='login.php'>Login</a> again!
  </div>
</body>
</html>
