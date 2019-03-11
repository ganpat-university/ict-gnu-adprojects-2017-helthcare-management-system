<!DOCTYPE html>
<html>

<head>
 
<link href="secure.css" rel="stylesheet" type="text/css">

</head>
<body>

<form class="modal-content" method="POST" action="" id="id01">
 <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"><a href="Adminpanel.php">&times;</a></span>
      
    </div>
<div class="container">

	  <label for="Admin Id"><b>Admin Id</b></label>
      <input type="text" placeholder="Enter Admin Id" pattern="[0-9]{7}" title="Admin Id Only contain 7 number. e.g 1234567" name="AID" required="required" visibility=>
 
      <label for="Username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. abcd" name="user" required>
		
		<div class="clearfix">
        
        <button type="submit" name="submit" class="signupbtn">Submit</button>
      </div>
	  <div class="container" >
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
	  
</div>

</form>


</body>

</html>
<?php
$con=MySQLi_connect("localhost","root","","adminss") or die(mysql_error());
$db=MySQLi_select_db($con,'adminss') or die(mysql_error());

if(isset($_POST['submit'])){
$AID=$_POST['AID'];
$user=$_POST['user'];



if($AID=='')
{
	echo "<script>alert('Enter Your Admin Id')</script>";
}

if($user==''){
	echo "<script>alert('Enter Your Username')</script>";
}

else
{
	$query="SELECT * FROM `ads` WHERE AID='$AID' && user='$user'";
	$run=MySQLi_query($con,$query) or die(mysql_error());
	
	
	$total=MySQLi_num_rows($run);
		if($total==1)
		{
			echo "<script>alert('Now You have Access For Admin')</script>";
			echo"<script>window.open('admin.php','_self')</script>";
		}
		else
		{
			echo "<script>alert('Please Enter Valid Admin ID and Username !!! For Admin access')</script>";
		}
		
	
	
	
}	
}
?>


