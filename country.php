<?php
include "databaseconnection.php";
if(isset($_POST["submit"]))
{
	$nme=$_POST["cname"];
	mysqli_query($con,"INSERT INTO `country`(`cname`) VALUES ('$nme')");
}
?>
<html>
<head>
<body>
<form action="#" method="post">
<table>
<tr>
<td>counter name</td><td><input type=text name=cname></td>
</tr>
<tr>
<td><input type=submit name=submit value=add></td>
</tr>
</table>
</form>
</body>
</head>
</html>