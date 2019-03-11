<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="main.css" rel="stylesheet" type="text/css">
<script source="main.js"type="text/js"></script>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="L.php">Login</a>
  <a href="sign.php">SignUp</a>
  
</div>
<div>
<h2><center>WELCOME</center></h2></div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


</body>
</html> 
