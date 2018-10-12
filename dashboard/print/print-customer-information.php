<?php 
include("../includes/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>&nbsp;</title>
    <style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
</head>
<body style="text-align: center; font-family: arial;" onload="window.print()">
    <br>
    <br>
        <img src="../assets/images/logo-blue.png" height="80px">
<h3>JAAG TRAVEL AND TOURS</h3>
<h2>Customer Information</h2>
	<table align="center" border="2px;">
              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>
                                    <th>Account Type</th>
             
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if (isset($_GET['accountType']) and $_GET['accountType'] == 'Walk-in Customer') {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 3");
                            }
                            elseif (isset($_GET['accountType']) and $_GET['accountType'] == 'Online Customer') {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 4");
                            }else
                            {
                                $qry = mysqli_query($connection,"select * from profile_view where accountTypeId = 3 or accountTypeId = 4");
                            }
                            



                                    while ($res = mysqli_fetch_assoc($qry)) { ?>
                                <tr>
                                    <td><?php echo $res['profileId']; ?></td>
                                    <td><?php echo $res['firstName'] . " " . $res['middleName'] . " " . $res['lastName']; ?></td>
                                    <td><?php echo $res['buildingNumber'] . " " . $res['street'] . " " . $res['barangay'] . " " . $res['city'] . " " . $res['province']; ?></td>
                                    <td><?php echo $res['contactNumber']; ?></td>
                                    <td><?php echo $res['accountType']; ?></td>
                                  
                           
                                </tr>
                            <?php } ?>
                            </tbody>
            </table>



</body>
</html>