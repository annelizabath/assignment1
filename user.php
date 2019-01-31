<?php
include 'databaseconnection.php';
?>
<html>
    <body>
        <form action="#" method="post">
            <table>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="unme"></td>
                </tr>
                <tr>
                	<th>Select Country</th>
                    <td><select id="cname" name="cname" onChange="change_country()">
                    		<option>--Select Country--</option>
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
                 	<th>Select State</th>
                    <td>
                    	<div id="state">
                    	<select id="sname" name="sname">
                        	<option> --Select State--</option>
                         </select>
                         </div>
                    </td>
                  </tr>
                  <tr>
                 	<th>Select District</th>
                    <td>
                    	<div id="district">
                    	<select id="dname" name="dname">
                        	<option> --Select District--</option>
                         </select>
                         </div>
                    </td>
                  </tr>
              </table>    
        
            <input type="submit" name="submit">
             </form>
    
            <script type="text/javascript">
			function change_country()
			{
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","countryajax.php?country=" + document.getElementById("cname").value,false);
					xmlhttp.send(null);
					document.getElementById("state").innerHTML=xmlhttp.responseText;
			}
			function change_state()
			{
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","stateajax.php?state=" + document.getElementById("sname").value,false);
					xmlhttp.send(null);
					document.getElementById("district").innerHTML=xmlhttp.responseText;
					
			}
		</script>
    </body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$y=$_GET["did"];
		$name=$_POST['name'];
		$country=$_POST['cname'];   
		$state=$_POST['sname'];
		$dis=$_POST['dname'];
		mysqli_query($con,"INSERT INTO `user`(`uname`, `did`, `country`, `state`, `district`) VALUES ('".$name."','".$y."','".$country."','".$state."','".$dis."')");
		
		//mysqli_query($con,"insert into emp('name','country','state','city') values ('".$name."','".$country."','".$state."','".$dis."')");
	}

?>
