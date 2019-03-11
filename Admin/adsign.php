

<!DOCTYPE html>
<html>
<head>
<link href="adsign.css" rel="stylesheet" type="text/css">
<script source="adsign.js"type="text/js"></script>
</head>
<body>
<form class="modal-content" method="POST" action="adsign.php" id="id01">
  <div class="imgcontainer">
	<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"><a href="Adminpanel.php">&times;</a></span>
      </div>
	 <h2>Admin Signup Form</h2>
	  <p>Please fill in this form to create an account.</p>
      <br>
	  <label for="Firstname"><b>Firstname</b></label>
      <input type="text" placeholder="Enter Firstname" pattern="[A-Za-z]+" title="Invalid Firstname" name="fname" required>
	  
	  <label for="Lastname"><b>Lastname</b></label>
      <input type="text" placeholder="Enter Lastname" pattern="[A-Za-z]+" title="Invalid Lastname" name="lname" required>
	  
      <label for="Username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. abcd" name="user" required>

      <label for="password"><b>Password</b></label>
      <input id="password" name="password" type="password" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Password Minimum 6 characters and at least 1 number and at least 1 capital letter' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>

      <label for="password_two"><b>Repeat Password</b></label>
      <input id="password_two" name="password_two" type="password" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
      
      

     

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

</body>

</html>
<?php

$con=MySQLi_connect("localhost","root","","admins") or die(mysql_error());
$db=MySQLi_select_db($con,'admins') or die(mysql_error());

if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$user=$_POST['user'];
$password=$_POST['password'];
$password_two=$_POST['password_two'];

if($fname==''){
	echo "<script>alert('Enter Your Firstname')</script>";
}
if($lname==''){
	echo "<script>alert('Enter Your Lastname')</script>";
}
if($user==''){
	echo "<script>alert('Enter Your Username')</script>";
}
if($password=='')
{
	echo "<script>alert('Enter Your Password')</script>";
}
if($password_two=='')
 {
	echo "<script>alert('Enter Your Confirm Password')</script>";
 }

else
{
	$res=mysqli_query($con,"SELECT * FROM `signup` WHERE user='$user'");
    $result=mysqli_num_rows($res);
 if($result>0)
   {
	echo "<script>alert('This Username  is Already exist!! Please Enter New Username')</script>";
	}
  else
  {
	$query="INSERT INTO signup(fname,lname,user,password,password_two) VALUES('$fname','$lname','$user','$password','$password_two')";
	
	if(mysqli_query($con,$query))
	{
		echo"<script>alert('You are successfully Submitted')</script>";
		echo"<script>window.open('admin.php','_self')</script>";
		
	}
  }	
  
}
}
?>

