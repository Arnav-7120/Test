<!DOCTYPE html>
<html>
<body style="background-image:url(bg1.jpg)">
<title>Appointment System</title>
<link rel="stylesheet" href="HomePage.css">
			<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="#" class="logo"><img src="Office_Home.png" width="30px" height="30px"><strong> Office </strong>Appointment System</a></li>
					<li><a href="locateus.php">Locate Us</a></li>
					<li><a href="#home">Home</a></li>
				</ul>
			</div>
			<div class="center">
				<h1>Office</h1><br>
				<p style="text-align:center;color:white;font-size:30px;top:35%">Online Appointment System</p><br>
				<button onclick="document.getElementById('id01').style.display='block'" style="position:absolute;top:50%;left:50%">Login</button>
				
				
			</div>	
			<div class="footer">
				<ul style="position:absolute;top:93%;background-color:black">
					<li><a href="admin login.php">Admin Login</a></li>
					<li><a href="login1.php">User Login</a></li>
				</ul>
			</div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="SplashScreen.html">
    <div class="imgcontainer">
		<span style="float:left"><h2>&nbsp&nbsp&nbsp&nbspLog In</h2></span>
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
	
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
		<button type="submit" name="login">Login</button>
		
      <input type="checkbox" checked="unchecked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <button onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'" style="float:right">Don't have one?</button>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="CreateAccount.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><br>
    </div>

	<div class="imgcontainer">
      <img src="steps.png" alt="Avatar" class="avatar">
    </div>
	
    <div class="container">
		<p style="text-align:center;font-size:18px;"><b>Sign Up -> Choose your Dates -> Book your visit</b></p>
      <p style="text-align:center"><b>Booking an appointment has never been easier!</b></p>
      <p style="text-align:center"><b>The 3 steps for an easier and healthy life</b></p>
	  
    </div>
	
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
	  <button type="submit" name="signup" style="float:right">Sign Up</button>
    </div>
	
  </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

</script>
<?php
error_reporting(0);
session_start();
$error=''; 
$con = mysqli_connect("localhost","root","","appointment_system");
if (isset($_POST['login'])) {
if (empty($_POST['uname']) || empty($_POST['psw'])) {
$error = "Username or Password is invalid";
}
else
{
	$username=$_POST['uname'];
	$password=$_POST['psw'];

	$query = mysqli_query($con,"select * from register where password='$password' AND username='$username'");
	$rows = mysqli_fetch_assoc($query);
	$num=mysqli_num_rows($query);
	if ($num == 1) {
		$_SESSION["username"]=$rows['username'];
		$_SESSION['user']=$rows['name'];
		header( "Refresh:1; url=SplashScreen.html"); 
	} 
	else 
	{
		$error = "Username or Password is invalid";
	}
	mysqli_close($con); 
}
}
?>
</body>
</html>
