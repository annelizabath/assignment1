<?php
include 'databaseconnection.php';
?>
<html>
<body>
<form action="#" method="post">
<table>
<tr>
<th>name</th><td><input type=text name=uname></td>
</tr>
<tr>
<th>country name</th>
<td>
<select name="cname" id="cid" onChange="change_country()">
<option>-------select-------</option>
<?php
$res=mysqli_query($con,"select * from country");
while($row=mysqli_fetch_array($res))
{
	?>
	<option value="<?php echo $row["cid"];?>"><?php echo $row["cname"]; ?></option>
	<?php
}
?>
</select>
</td>
</tr>
<tr>
<th>State Name</th>
<td> 
<select id="sid" name="sname">
<option> --Select State--</option>
<?php
$country=$_GET["country"];
	if($country!="")
	{
		$res=mysqli_query($con,"select * from state where cid=$country");
		
		echo"<select id='sid'  name='sname' onChange='change_state()'>";
		while($row=mysqli_fetch_array($res))
		{
			echo"<option value='$row[sid]'>";
			echo $row['sname']; 
			echo"</option>";
		}
		echo"</select>";
	}
?>
</select>
</td>
</tr>
<tr>
<th>Select District</th>
<td>
<select id="did" name="dname">
<option> --Select District--</option>
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
</select>
</td>
</tr>
<tr>
<td><input type=submit name=submit value=save></td>
</tr>
</table>
</form>
<script type="text/javascript">
			function change_country()
			{
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET", + document.getElementById("cid").value,false);
					xmlhttp.send(null);
					document.getElementById("state").innerHTML=xmlhttp.responseText;
			}
			function change_state()
			{
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET", + document.getElementById("sid").value,false);
					xmlhttp.send(null);
					document.getElementById("district").innerHTML=xmlhttp.responseText;
					
			}
		</script>
</body>
</html>