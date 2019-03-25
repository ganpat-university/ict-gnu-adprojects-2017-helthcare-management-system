
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>

              <span id="blinker"><span style="font-size:20px; color:#FFD700";><?php
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                            echo $new; 
              ?></span></span>
    </ul>
    
	
  </div>
  
</nav>
<script> var blink_speed = 500; var t = setInterval(function () { var ele = document.getElementById('blinker'); ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden'); }, blink_speed);</script>
  </head>
<img src="abcd.JPEG" height="400px">
<style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #1E90FF;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
                       
  <style type="text/css" >
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
	
  </style>
  
  <body style="padding-top:50px;">

 <div class="jumbotron" id="ab1">
   

 </div>
   <div class="container-fluid" style="margin-top:50px;">
    <div class="row">
  <div class="col-md-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Appointment</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Appointment History</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Cancel Appointment</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Doctors And Departments</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Appointment Status</a>
       <a class="list-group-item list-group-item-action" id="list-attend-list" data-toggle="list" href="#list-attend" role="tab" aria-controls="settings">Treatment History</a>
    </div><br>
  </div>
  <div class="col-md-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Create an appointment</h4></center><br>
              <p>Please Enter Only Patients First and Last Name</p>
              <form class="form-group" method="POST" action="appointment.php">
                <div class="row">
                  <div class="col-md-4"><label>First Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="fname" pattern="[A-Za-z]+" title="Invalid Firstname"></div><br><br>
                  <div class="col-md-4"><label>Last Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="lname" pattern="[A-Za-z]+" title="Invalid Lastname"></div><br><br>
                  <div class="col-md-4"><label>Email id:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address"></div><br><br>
                  <div class="col-md-4"><label>Contact Number:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="contact" pattern="[0-9]{10}" title="Invalid Contact Number"></div><br><br>
                      
                  
                      
                  <div class="col-md-4"><label>Doctors and Departments:</label></div>
                  <?php
                          
                         $mysqli = NEW MySQLi('localhost','root','','admins');

                        $resultSet = $mysqli->query("SELECT name,Depar FROM `doct`");   ?>
                  <div class="col-md-8">
                   <select name="doctor" class="form-control" >
                     <option>Please Select Doctor</option>
                      <?php  
                         while($rows = $resultSet->fetch_assoc())
                          {
                            $name = $rows['name'];
                            $Depar = $rows['Depar'];
                            echo "<option value='$name For $Depar'>$name For $Depar</option>";
                          }
                        ?>  
                    </select>
                  </div><br><br>
                  <div class="col-md-4"><label>Date:</label></div>
                  <div class="col-md-8">
                    <input type="date" class="form-control"  name="date" >
                  </div><br><br>
                  <div class="col-md-4"><label>Time:</label></div>
                  <div class="col-md-8">
                   <select name="time" class="form-control"  >
                    <option value="">Please Select Time</option>
                      <option value="8:00 to 8:30">8:00 to 8:30 AM</option>
                      <option value="8:30:00 to 9:00">8:30:00 to 9:00 AM</option>
                    <option value="9:00 to 9:30">9:00 to 9:30 AM</option>
                    <option value="9:30 to 10:00">9:30 to 10:00 AM</option>
                    <option value="10:00 to 10:30">10:00 to 10:30 AM</option>
                    <option value="10:30 to 11:00">10:30 to 11:00 AM</option>
                    <option value="11:00 to 11:30">11:00 to 11:30 AM</option>
                    <option value="11:30 to 12:00">11:30 to 12:00 AM</option>
                    <option value="12:00 to 12:30">12:00 to 12:30 PM</option>
                    <option value="1:30 to 2:00">1:30 to 2:00 PM</option>
                    <option value="2:00 to 2:30">2:00 to 2:30 PM</option>
                    <option value="2:30 to 3:00">2:30 to 3:00 PM</option>
                    <option value="3:00 to 3:30">3:00 to 3:30 PM</option>
                    <option value="3:30 to 4:00">3:30 to 4:00 PM</option>
                    <option value="4:00 to 4:30">4:00 to 4:30 PM</option>
                    <option value="4:30 to 5:00">4:30 to 5:00 PM</option>
                    <option value="5:00 to 5:30">5:00 to 5:30 PM</option>
                    <option value="5:30 to 6:00">5:30 to 6:00 PM</option>

                    </select>
                  </div><br><br><br>
                  <div class="col-md-4">
                    <input type="submit" name="entry_submit" value="Book An Appointment" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
                <?php

$con=MySQLi_connect("localhost","root","","patients") or die(mysql_error());
$db=MySQLi_select_db($con,'patients') or die(mysql_error());

if(isset($_POST['entry_submit'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$doctor=$_POST['doctor'];
$date=$_POST['date'];
$time=$_POST['time'];

if($fname==''){
  echo "<script>alert('Enter Your Firstname')</script>";
}
if($lname==''){
  echo "<script>alert('Enter Your Lastname')</script>";
}
if($email==''){
  echo "<script>alert('Enter Your Mail Id')</script>";
}
if($contact=='')
{
  echo "<script>alert('Enter Your Contact Number')</script>";
}
if($doctor=='')
 {
  echo "<script>alert('Please Select Doctors and Departments')</script>";
 }
 if($date=='')
 {
  echo "<script>alert('Please Select Date')</script>";
 }
 if($time=='')
 {
  echo "<script>alert('Please Select Time')</script>";
 }

else
{
       $res=mysqli_query($con,"SELECT doctor,date,time FROM `appointment` Where doctor='$doctor' && date='$date' && time='$time'");
       $result=mysqli_num_rows($res);
  if($result>2)
   {
     echo "<script>alert('This Doctor  Date  Time Is Already Booked By Other User')</script>";
    }

  
else
  {
    
  $query="INSERT INTO appointment(fname,lname,email,contact,doctor,date,time) VALUES  ('$fname','$lname','$email','$contact','$doctor','$date','$time')";
     
  
    if(mysqli_query($con,$query))
    {
       echo"<script>alert('You are successfully Book Your Appointment')</script>";
    
    
     } 
  } 
  
  }
}
?>


              </form>
            </div>
          </div>
        </div><br>
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="card">
          <div class="card-body">
            //---------------------------------
			
          </div>
        </div><br><br>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>

      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <table align="center">
                <tr>
                  
                  <th>Doctor-Name</th> 
                  <th>Departments</th>
          
                </tr>
                <?php
$conn = mysqli_connect("localhost", "root", "", "admins");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT name, Depar FROM `doct`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["Depar"] .  "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>

              </table>

      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="card">
          <div class="card-body">
            //---------------------------------
      
          </div>
        </div><br><br>
      </div>
       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--Sweet alert js-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
                          




  </body>

</html>
