<?php
session_start();
$con = mysqli_connect("localhost","root","","appointment_system");

/*if($con){
    ?>
    <script>
        alert(" Successful");
        </script>
        <?php
}else{
    echo" not Successful";
}  */

if(isset($_POST['Change'])) {
    $UserName=$_POST["username"];
    $pass=$_POST["Password"];
    $cpass=$_POST["Password2"];

    if($pass <> $cpass)
    {
    ?>
                    <script>
                    alert("Password do not match");
                     </script>
                      <?php 
    }

    $query = "SELECT * from register where UserName = '$UserName'";
    $run = mysqli_query($con,$query);
    if($run){
        $row = mysqli_num_rows($run);
        if($row == 1){
            $UserName_err="UserName does not exist";
        }
        else if($pass==''){
            $pass_err="Please enter your new Password";
        }
        else if($cpass==''){
            $cpass_err="Please enter your new confirm Password";
        }
        else if($pass !== $cpass){
            $match_err="Password do not match";
        }
        else{
            $sql = "UPDATE register  SET Password = '$pass' where UserName = '$UserName'";
            $run = mysqli_query($con,$sql);
            if($run){
                ?>
                    <script>
                    alert("password changed successfully");
                     </script>
                      <?php 
            }
            else{
                ?>
                    <script>
                    alert("Unable to change Password");
                     </script>
                      <?php 
                //$error= "Unable to change Password";
            }
        }
    }
    
 /*   if($row == 0){
        $UserName_err="UserName does not exist";
    }
    else if($pass==''){
        $pass_err="Please enter your new Password";
    }
    else if($cpass==''){
        $cpass_err="Please enter your new confirm Password";
    }
    else if($pass !== $cpass){
        $match_err="Password do not match";
    }
    else{
        $sql = "UPDATE register  SET Password = '$pass' where UserName = '$UserName'";
        $run = mysqli_query($con,$sql);
        if($run){
            ?>
                <script>
                alert("password changed successfully");
                 </script>
                  <?php 
        }
        else{
            ?>
                <script>
                alert("Unable to change Password");
                 </script>
                  <?php 
            //$error= "Unable to change Password";
        }  
    }  */
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Change Password form</title>
<link rel="stylesheet" type="text/css" href="Style.css">
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><a href="" class="logo"><img src="lOGIN1.PNG" width="30px" height="30px"><strong>Change Password  </strong> Form</a></li>
					<li top="right"><a href="login1.php">Home</a></li>
				</ul>
</div>
<body>
    <center>
    <div class="Container">
        <form action="ChangePassword.php" method="post"> 
            <h3>Change Password</h3>
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username"><br>
            <p>Password</p>
            <input type="password" name="Password" placeholder="Enter password" ><br>
            <p>ConfirmPassword</p>
            <input type="password" name="Password2" placeholder="Enter ConfirmPassword" ><br><br>
            <input type="Submit" name="Change" value="Password Changed">
        </form>
    </div>
    </center>
</body>
</head>
</html>
