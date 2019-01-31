<?php
include 'databaseconnection.php';
?>
<?php
$state=$_GET["state"];
	
	if($state!="")
	{
		$res=mysqli_query($con,"select * from district where sid=$state");
		
		echo"<select name ='dname'>";
		while($row=mysqli_fetch_array($res))
		{
			echo"<option value='$row[did]'>";
			echo $row['dname']; 
			echo"</option>";
		}
		echo"</select>";
	}
?>