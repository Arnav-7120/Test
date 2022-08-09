<?php 
function SignIn() 
{ 
session_start();
 {  
	if($_POST['uname']=='admin' && $_POST['pass']=='admin') 
	{ 
		$_SESSION['userName'] = 'admin'; 
		echo "Logging you in..";
		header( "Refresh:3; url=admin_home.html");
	} 
	else { 
		echo "Wrong Credentials!"; 
		} 
	}
	} 
	if(isset($_POST['submit'])) 
	{ 
		SignIn(); 
	} 
?>
<!doctype html>
<html>
    <head>
        <title>Admin login page</title>

<style>
    table{
        background-color: black;
        border: 8px solid white;
        border-radius: 25px;
        background: rgba(0,0,0,0.7);
    }
    #type{
        width:300px;
        height: 32px;
        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 3px solid white;
        color: white;
        font-size: 25px;
    }
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: darkblue;
}
    li {
    float: right;
	border-right:3px solid #bbb;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 7px 35px;
    text-decoration: none;
}
li a:hover:not(.active) {
    background-color: #111;
	opacity: 0.6;
}
.active {
    background-color: #e0e0d1;
}
    input ::-webkit-input-placeholder
    {
        font-size: 20px;
        line-height: 3;
        color: white;
    }
    #btn{
        width: 250px;
        background-color: blueviolet;
        height: 35px;
        font-size: 20px;
    }
    #btn[type="submit"]:hover
    {
    cursor: pointer;
    background: #ffc107;
    color: #000;
    }
</style>

</head>
<form action="admin login.php" method="POST">
<div class="header">
				<ul>
                <li style="float:left;border-right:none"><a href="#" class="logo"><img src="lOGIN1.PNG" width="30px" height="30px"><strong> Admin Login</strong></li>
					<li top="right"><a href="Homepage.php">Home</a></li>
				</ul>
	</div>
<body background="forgot password.jpg">
        <br><br><br><br>
        <table width="25%" border="0" cellspacing="40" align="center">
            <tr>
                <td align="center"><img src="login.jpg" width="45%"></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="UserName" id="type" name="uname" required></td>
            </tr>
            <tr>
                <td><input type="password" placeholder=".........." id="type" name="pass" required></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" name="submit" value="Sign in" id="btn"></td>
            </tr>
        </table>
    </body>
</form>
</html>
