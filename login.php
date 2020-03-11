
<?php
session_start();

$_SESSION['LAST_ACTIVITY']=time();
require 'database_connect.php';
include 'login.html';


if(isset($_POST['login']))
{
	//isset($_POST['username']) && isset($_POST['password'])
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$result=mysqli_query($conn,"SELECT * FROM auth WHERE USER_NAME=$username AND PASSWORD=$password");
	if(@mysqli_num_rows($result)>0){
		echo '<script>alert("Login Successfull")</script>';

		$_SESSION['username']=$username;

		header("location:dashboard.html");
		//echo '<script>window.location="/database_connect.php"</script>';
	}
	else{
		    //echo'<script>alert("Login Unsuccessfull")</script>';

            echo'<script>swal("Login Failed", "Wrong Username or Password", "error").then(function(){
            	window.location = "login.php";
            });</script>';
            
			 //header("location:login.php");
	}
  
}

?>
