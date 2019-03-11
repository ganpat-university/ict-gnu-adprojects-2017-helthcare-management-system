<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="L.css" rel="stylesheet" type="text/css">
<script source="L.js"type="text/js"></script>
</head>
<body>



<form class="modal-content animate" method="POST" action="L.php" id="id01">
<h2>Login Form</h2>
    <div class="imgcontainer">
	<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Exit"><a href="main.php">&times;</a></span>
      
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. abcd" name="user" >

      <label for="psw"><b>Password</b></label>
       <input id="password" name="password" type="password" pattern="^\S{6,}$" title='Must have at least 6 characters'  placeholder="Password" >
        
      <button type="submit" name="login">Login</button>
      <label>
        <input type="checkbox" unchecked="unchecked" required="required" name="remember"> I accept Terms and Conditions
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>



</body>
</html>
<?php
$con=MySQLi_connect("localhost","root","","patients") or die(mysql_error());
$db=MySQLi_select_db($con,'patients') or die(mysql_error());

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
	$query="SELECT * FROM `users` WHERE user='$user' && password='$password'";
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





