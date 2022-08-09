<?php
session_start();
$con = mysqli_connect("localhost","root","","appointment_system");

if(isset($_POST['register_btn']))
{
  $Name1 = mysqli_real_escape_string($con,$_POST['Name1']);
  $UserName = mysqli_real_escape_string($con,$_POST['UserName']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $Mob = mysqli_real_escape_string($con,$_POST['Mob']);
  $Password = mysqli_real_escape_string($con,$_POST['Password']);
  $Password2 = mysqli_real_escape_string($con,$_POST['Password2']);

  $pass = password_hash($Password, PASSWORD_BCRYPT);
  $cpass = password_hash($Password2, PASSWORD_BCRYPT);

  $emailquery = "select * from register where email='$email'";
  $query= mysqli_query($con,$emailquery);

  $emailcount = mysqli_num_rows($query);
  if($emailcount>0){
    ?>
    <script>
        alert("email already exists");
        </script>
        <?php
  } else{
      if($Password === $Password2){
        $insertquery = "INSERT INTO register(Name1,UserName,email,Mob,Password,Password2) values('$Name1','$UserName','$email','$Mob','$pass','$cpass')";
    $iquery = mysqli_query($con,$insertquery);
    if($iquery){
        ?>
        <script>
            alert("Inserted Successful");
            </script>
            <?php
    } 
    else{
        ?>
        <script>
            alert("No Inserted ");
            </script>
            <?php 
    }
    }else{
        ?>
        <script>
            alert("Password are not matching");
            </script>
            <?php  
      }
  }
}
?>   
<!DOCTYPE HTML>
<html>
<head>
<title>Create New Account </title>
<link rel="stylesheet" type="text/css" href="Style.css">
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="" class="logo"><img src="lOGIN1.PNG" width="30px" height="30px"><strong>Create Account  </strong> Form</a></li>
					<li top="right"><a href="login1.php">Home</a></li>
				</ul>
</div>
<body>
    <center>
    <div class="main">
        <div class="register">
            <h2>Register here</h2>
            <form action="CreateAccount.php" method="post">
                <label>Name :</label><br>
                <input type="text" name="Name1"  placeholder="Enter your Name" required><br><br>
                <label>UserName :</label><br>
                <input type="text" name="UserName"  placeholder="Enter your UserName"><br><br>
                <label>Email :</label><br>
                <input type="email" name="email"  placeholder="Please Enter your Email"><br><br>
                <label>Mob No. :</label><br>
                <input type="text" name="Mob"  placeholder="Enter your Mob No."><br><br>
                <label>Password :</label><br>
                <input type="password" name="Password"  placeholder="Enter your Password"><br><br>
                <label>ReEnter Password :</label><br>
                <input type="password" name="Password2"  placeholder="Enter your ConfirmPassword"><br><br>
                <input type="Submit" name="register_btn" value="Sign Up">
            </form>
        </div>
    </div>
</center>
</body>
</head>
</html>
