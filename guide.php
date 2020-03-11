<?php
session_start();
require_once 'database_connect.php';
$username = (int)$_SESSION['username'];
//ROLL_NO,NAME_OF_THE_STUDENT,MARKS(70),GUIDE(30),TOTAL
$query ="SELECT * FROM master_table WHERE FACULTY_ID=$username";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{

	$rows = mysqli_num_rows($result); // define number of rows
	$cols = 6;// define number of columns

	echo "<table align='center' border='1px' style=\"width:80%; line-height:30px\">";

	echo "<tr>" ;
	echo "<th colspan=$cols><h2>Guide Evaluation Table<h2></th>";
	echo "</tr>";

	echo "<tr>";
	echo "<th style=\"width:7%\"><b>SL_NO.</b></th>";
	echo "<th style=\"width:15%\"><b>ROLL_NO.</b></th>";
	echo "<th  style=\"width:30%\"><b>NAME OF THE STUDENT</b></th>";
	echo "<th><b>MARKS(70)</b></th>";
	echo "<th><b>MARKS(30)</b></th>";
	echo "<th><b>TOTAL</b></th>";
	echo "</tr>";

	$counter =1;
	?>
	<form action="guideupdate.php" method="post">
	<?php
	while($rows=mysqli_fetch_assoc($result)){
	  ?>
	    <tr>
	    	<td><?php echo $counter ?></td>
	        <td><?php echo $rows['ROLL_NO'] ?> </td>
	        <td><?php echo $rows["NAME_OF_THE_STUDENT"] ?></td>
	        <td><?php echo $rows["MARKS(70)"]?></td>
	        <td><input type="number" name="<?php echo $rows['ROLL_NO']?>" value="<?php echo $rows['GUIDE(30)']?>" min=0 max=30></td>
	        <td><?php echo $rows["TOTAL"]?></td>
	    </tr>
	  <?php
	    $counter+=1;
	 }
     
	echo "</table>";
	?>
	<br>
	<input type="submit" name="submit" value="submit" style="float:right"><br><br>
     </form> 
    <?php


   	
}

else
{
	echo "AW SNAP! , YOU ARE AWFUL";
}



?>




