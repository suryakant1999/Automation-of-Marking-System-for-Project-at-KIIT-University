<?php

require_once 'database_connect.php';

for($username=1001;$username<=1008;$username++)
{
//Fetch room no. of looged in user
$query1="SELECT ROOM_NO FROM room_allocation WHERE FACULTY_ID=$username";
$result=mysqli_query($conn,$query1);
$roomno=mysqli_fetch_assoc($result)["ROOM_NO"];

//Fetch all faculty id inside the room  no.
$query2="SELECT FACULTY_ID FROM room_allocation WHERE ROOM_NO='$roomno'";
$result2=mysqli_query($conn,$query2);
$fac=array();
$i=0;
while($row=mysqli_fetch_assoc($result2))
{
	$faculty=(int)$row["FACULTY_ID"];
	$fac[$i]=$faculty;
	$i++;	
}

//print_r(($fac));
$query3="SELECT ROLL_NO,NAME_OF_THE_STUDENT FROM master_table WHERE FACULTY_ID IN (".implode(',',$fac).")";
$result3=mysqli_query($conn,$query3);
//echo mysqli_num_rows($result3);
while($rows=mysqli_fetch_assoc($result3))
{
	//echo $rows["ROLL_NO"]."  ".$rows["NAME_OF_THE_STUDENT"]."<br>";
    
	$roll=(int)$rows["ROLL_NO"];
	$name=$rows["NAME_OF_THE_STUDENT"];
	$query="INSERT INTO evaluation_table VALUES('$username','$roll','$name',0,0,0,0)";
	$res=mysqli_query($conn,$query);
        //echo "Values inserted to Evaluation Table Successfully";
}

}

?>