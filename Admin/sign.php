<!DOCTYPE html>
<html>
<head>
<link href="sign.css" rel="stylesheet" type="text/css">
<script source="sign.js" type="text/js"></script>
</head>
<body>


  <div>
  <form class="modal-content" method="POST" action="sign.php" id='id01'>
     <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"><a href="main.php">&times;</a></span>
      </div>
	  <h1>Sign Up Form</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
	  
	  <label for="Firstname"><b>Firstname</b></label>
      <input type="text" placeholder="Enter Firstname"  pattern="[A-Za-z]+" title="Invalid Firstname" name="fname" required>
	  
	  <label for="Lastname"><b>Lastname</b></label>
      <input type="text" placeholder="Enter Lastname"  pattern="[A-Za-z]+" title="Invalid Lastname" name="lname" required>
	  
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" name="email" required>
	  
	  <label for="Username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. abcd" name="user" required>

      <label for="psw"><b>Password</b></label>
      <input id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
      
      
     

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="submit" class="signupbtn">Sign Up</button>
      </div>
    
  </form>
</div>
</body>
</html>

<?php

$con=MySQLi_connect("localhost","root","","patients") or die(mysql_error());
$db=MySQLi_select_db($con,'patients') or die(mysql_error());

if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$user=$_POST['user'];
$password=$_POST['password'];
$password_two=$_POST['password_two'];

if($fname==''){
	echo "<script>alert('Enter Your Firstname')</script>";
}
if($lname==''){
	echo "<script>alert('Enter Your Lastname')</script>";
}
if($email==''){
	echo "<script>alert('Enter Your Email')</script>";
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
	$res=mysqli_query($con,"SELECT * FROM `users` WHERE user='$user'");
    $result=mysqli_num_rows($res);
 if($result>0)
   {
	echo "<script>alert('This Username  is Already exist!! Please Enter New Username') </script>";
	}
  
else
    {
	  $query="INSERT INTO users(fname,lname,email,user,password,password_two) VALUES('$fname','$lname','$email','$user','$password','$password_two')";
	 
	  }
   $res1=mysqli_query($con,"SELECT * FROM `users` WHERE email='$email'");
    $result1=mysqli_num_rows($res1);
 if($result1>0)
   {
	echo "<script>alert('This Email Id is Already exist!! Please Enter New Mail Id') </script>";
	}
  
else
    {
	  $query="INSERT INTO users(fname,lname,email,user,password,password_two) VALUES('$fname','$lname','$email','$user','$password','$password_two')";
	  
	   require("E:\wamp64\www\Health\PHPMailer\PHPMailer.php");
	   require("E:\wamp64\www\Health\PHPMailer\SMTP.php");
	   include_once "PHPMailer/Exception.php";
	  $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->IsSMTP();
	  $mail->SMTPDebug = 0;
	  $mail->SMTPAuth = true;
	  $mail->SMTPSecure = 'tsl';
	  $mail->Host = "smtp.gmail.com";
      $mail->Port = 465; // or 587
      $mail->IsHTML(true);
	  $mail->Username = "agrawalkaran422@gmail.com";
      $mail->Password = "181267174";
	  $mail->setFrom('agrawalkaran422@gmail.com');
	  $mail->addAddress($_POST['email'],$_POST['fname'],$_POST['lname']);
	  $mail->subject="Please Verify Email-Id";
	 
	  $mail->Body="
	  Please Click On The Link Below:<br><br>
	   
	  ";
	   if ($mail->send())
                    $msg = "You have been registered! Please verify your email!";
                else
                    $msg = "Something wrong happened! Please try again!";
	  
	  if(mysqli_query($con,$query))
	  {
		echo "<script>alert('You are successfully Submitted')</script>";
		
	  }
   }
   
  
 }
}	


?>

 
