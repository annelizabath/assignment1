
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
            <td > DISTRICT NAME</td>
                        <td><input type="text"  name="dname" ></td>
        </tr>
                <div class="form-group">
                                <label for="state">STATE</label>
                                <div class="form-select">

                                    <select  name="sname" id="statename">
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "demo_app");
                                        if (!$con) {
                                            echo "Could not connect..Try again";
                                        } else {
                                            $sql = "Select sid, sname from state ";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($sql)) {
                echo '<option value=' . $row['sid'] . '>' . $row['sname'] . '</option>';
            }
                                            echo "<option value =><------Select state------></option>";
                                            while ($row = mysqli_fetch_array($result)) {
                                                $sname = $row['sname'];
                                                $sid = $row['sid'];
                                                echo "<option value='$sname'>$sname</option>";
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
   $dname=$_POST['dname']; 
   $sname=$_POST['sname']; 
   $sql2="Select sid from state where sname='$sname'";
   $result1 = mysqli_query($con, $sql2);
   while ($row = mysqli_fetch_array($result1)) {
        $sid = $row['sid'];
   }
   //echo $sname;
   $sql1=mysqli_query($con,"INSERT INTO `district`( `sid`,`dname`) VALUES ('$sid','$dname')");
                                        } 
  //$result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
}
?>



