<?php
session_start();
require 'database_connect.php';


	if(isset($_POST["submit"]))
	{
            $username = (int)$_SESSION['username'];
            $query ="SELECT * FROM master_table WHERE FACULTY_ID=$username";
		$res=mysqli_query($conn,$query);
		if(mysqli_num_rows($res)>0)
      {
		while($row=mysqli_fetch_assoc($res))
		{
			
            if(isset($_POST[$row['ROLL_NO']]))
            {
            	
            	$updated_marks=(int)$_POST[$row['ROLL_NO']];
            	$roll=(int)$row['ROLL_NO'];
            	$total=$updated_marks+$row['MARKS(70)'];

            	$quer="UPDATE master_table SET `GUIDE(30)`=$updated_marks,TOTAL=$total WHERE ROLL_NO=$roll";
            	if(mysqli_query($conn,$quer))
            	{
            		header("location:guide.php");
            	}
            	else{
            		echo "Updation Failed";
            	}

            }
		}
	  }
	}	
?>