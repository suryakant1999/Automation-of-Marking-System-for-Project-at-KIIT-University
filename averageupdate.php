<?php
require 'database_connect.php';

$query = "SELECT ROLL_NO,`GUIDE(30)` FROM master_table";
$result = mysqli_query($conn,$query);
while($rows=mysqli_fetch_assoc($result))
	{
		//echo $rows['ROLL_NO']."<br>";
		$roll=(int)$rows['ROLL_NO'];
		$query1="SELECT `MARKS(70)` FROM evaluation_table WHERE ROLL_NO=$roll";
		$res=mysqli_query($conn,$query1);
		$n=mysqli_num_rows($res);
		if($n>0)
		{
			//echo $n;
			$total=0;
			while($row=mysqli_fetch_assoc($res))
			{
				$total=$total+$row['MARKS(70)'];
			}
			$avg=$total/$n;
			$avg=round($avg);
			$tot=$avg+(int)$rows['GUIDE(30)'];
			$query2="UPDATE master_table SET `MARKS(70)`=$avg,TOTAL=$tot WHERE ROLL_NO=$roll";
			if(mysqli_query($conn,$query2))
				{//echo "Updation Successfull";
                }
			else
				echo "Updation UnSuccessfull";
		}
	}
?>