<!DOCTYPE html>
<html>
<head>
<title>Admin Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="A.css" rel="stylesheet" type="text/css">
<script source="A.js"type="text/js"></script>
</head>
<body>

<form class="modal-content animate" method="POST" action="admin.php" id="id01">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"><a href="Adminpanel.php">&times;</a></span>
      </div>
	  <h2>Only Admin Login Form</h2>
	  <div class="imgcontainer"><img src="adm.png" alt="adm" class="adm">
    </div>
<div class="container">
      <label for="Username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. abcd" name="user" required="required">

      <label for="password"><b>Password</b></label>
      <input id="password" name="password" type="password" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" title="Password Minimum 6 characters and at least 1 number and at least 1 capital letter"  placeholder="Enter Your Password" required="required">
        
      <button type="submit" name="login">Login</button>
	 
    </div>
    <div class="acontainer">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
	  <table border="1" width="90" height="50" align="center"><tr><td bgcolor="#228B22"><center><a href="adsign.php">Sign Up</a></center></td></tr></table>
    </div>
 

</form>
</body>
</html>

<?php
$con=MySQLi_connect("localhost","root","","admins") or die(mysql_error());
$db=MySQLi_select_db($con,'admins') or die(mysql_error());

if(isset($_POST['login'])){

$user=$_POST['user'];
$password=$_POST['password'];



if($user==''){
	echo "<script>alert('Enter Your Username')</script>";
}
if($password=='')
{
	echo "<script>alert('Enter Your Password')</script>";
}

else
{
	$query="SELECT * FROM `signup` WHERE user='$user' && password='$password'";
	$run=MySQLi_query($con,$query) or die(mysql_error());
	
	
	$total=MySQLi_num_rows($run);
		if($total==1)
		{
			echo "<script>alert('You are Successfully Login')</script>";
		}
		else
		{
			echo "<script>alert('Please Enter Valid Username and Password !!! Login Failed')</script>";
		}
		
	
	
	
}	
}
?>
