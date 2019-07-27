<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<form action="insert_into_classseats_2.php" method="post">

Trains: <select id="tno" name="tno" required>
<?php

require "db.php";

$query="SELECT * FROM train";
$result=mysqli_query($conn,$query);

echo " <option value = \"\" > </option>";

while ($row=mysqli_fetch_array($result)) 
{
 $tno=$row['trainno'];
 $tn=$row['tname']." starting at ".$row['sp'];
 echo " <option value = \"$tno\" > $tn </option> ";
}
?>
</select><br>

Date Of Journey: <input type="date" name="doj" required><br>
Class Name: <input type="text" name="class" required><br>
Fare per Seat: <input type="text" name="fps" required><br>
Total Seats: <input type="text" name="seatsleft" required><br>

<br><br><input type="submit" value="Add Train Schedule">

</body>
</html>


