<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body>

<ul>
<li class="dropdown"><font color="yellow" size="10">ADMIN MODE</font></li>
<br>
<h2>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Department</a>
    <div class="dropdown-content">
      <a href="adddoctor.php">Add Department</a>
      <a href="deletedoctor.php">Delete Department</a>
      <a href="showdoctor.php">Show Department</a>
	  <a href="showdoctorschedule.php">Show Department Schedule</a>
    </div>
  </li>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Officer</a>
    <div class="dropdown-content">
      <a href="addmanager.php">Add Officer</a>
      <a href="deletemanager.php">Delete Officer</a>
	  <a href="showmanager.php">Show Officer</a>
    </div>
  </li>
  
    <li>  
	<form method="post" action="admin_main_page.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:22px"><b>Log Out</b></button>
	</form>
  </li>
	
</ul>
</h2>
<p>

<center><h1>********WELCOME ADMIN*******</h1> 
<?php
session_start();	
	if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=admin login.php"); 
	}
?>
</body>
</html>
