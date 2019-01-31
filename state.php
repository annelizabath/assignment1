<?php
include "databaseconnection.php";
?>
<html>
<body>
<form action="#" method="post">
<table>
<tr>
<td>country name</td>
<td><select name="cnme">
                        <option value="">--------select-------</option>
                        <?php
                        
                        $res=mysqli_query($conn,"SELECT cid,cname from `country`");
                        while($row=mysqli_fetch_array($res)){
                            echo '<option value='.$row['cid'].'>'. $row['cname'].'</option>';
                        }
                        ?>
                        </select> </td>
</tr>
<tr>
<td>state name</td><td><input type=text name=sname></td>
</tr>
<tr>
 <tr>
<td><input type="submit" name="submit" ></td>
</tr>
</table>
</form>
</body>
</html>