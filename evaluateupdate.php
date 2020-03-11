<?php
session_start();
require 'database_connect.php';


	if(isset($_POST["submit"]))
	{
            $username = (int)$_SESSION['username'];
            $query ="SELECT * FROM evaluation_table WHERE FACULTY_ID=$username";
		$res=mysqli_query($conn,$query);
		if(mysqli_num_rows($res)>0)
      {
		while($row=mysqli_fetch_assoc($res))
		{
                  $str=(string)$row['ROLL_NO'];
                  $str1=$str.'a';
                  $str2=$str.'b';
                  $str3=$str.'c';
			
            if(isset($_POST[$str1])||isset($_POST[$str2])||isset($_POST[$str3]))
            {
            	
            	$updated_marks1=(int)$_POST[$str1];
                  $updated_marks2=(int)$_POST[$str2];
                  $updated_marks3=(int)$_POST[$str3];
            	$roll=(int)$row['ROLL_NO'];
            	$total=$updated_marks1+$updated_marks2+$updated_marks3;

            	$quer="UPDATE evaluation_table SET `INNOVATION(30)`=$updated_marks1,`PRESENTATION(20)`=$updated_marks2,`INDIVIDUAL_CONTRIBUTION(20)`=$updated_marks3,`MARKS(70)`=$total WHERE ROLL_NO=$roll AND FACULTY_ID=$username";
            	if(mysqli_query($conn,$quer))
            	{
            		header("location:evaluate.php");
            	}
            	else{
            		echo "Updation Failed";
            	}

            }
		}
	  }
	}	
?>