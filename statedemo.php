<?php
include 'databaseconnection.php';
?>

<html>
    <head>
    
    </head>
    <body> 
        <form action="#" method="POST">
            <table>
                <tr>
			<td > STATE NAME</td>
                        <td><input type="text"  name="sname" ></td>
		</tr>
                <div class="form-group">
                                <label for="country">COUNTRY</label>
                                <div class="form-select">

                                    <select  name="cname" id="cname">
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "demo_app");
                                        if (!$con) {
                                            echo "Could not connect..Try again";
                                        } else {
                                            $sql = "Select cid, cname from country ";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($sql)) {
                echo '<option value=' . $row['cid'] . '>' . $row['cname'] . '</option>';
            }
			echo "<option value=>--------select-------</option>";
                                            while ($row = mysqli_fetch_array($result)) {
                                                $cname = $row['cname'];
                                                $cid = $row['cid'];
                                                echo "<option value='$cname'>$cname</option>";
                                            }
                                        }
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                <tr>
                    <td></td>
			<td colspan=2>
		 <input type="submit" name="submit"  id="submit" value="submit" class="btnRegister"></td>
		</tr>
            </table>
        </form>
    </body>
</html>
<?php
if (isset($_POST['submit']))
    {
    $con = mysqli_connect("localhost", "root", "", "demo_app");
                                        if (!$con) {
                                            echo "Could not connect..Try again";
                                        } else {
   // $c_id=$_POST['c_id'];
   $sname=$_POST['sname']; 
   $cname=$_POST['cname']; 
   $sql2="Select cid from country where cname='$cname'";
   $result1 = mysqli_query($con, $sql2);
   while ($row = mysqli_fetch_array($result1)) {
        $cid = $row['cid'];
   }
   //echo $sname;
   $sql1=mysqli_query($con,"INSERT INTO `state`( `cid`,`sname`) VALUES ('$cid','$sname')");
                                        }
  //$result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
}
?>