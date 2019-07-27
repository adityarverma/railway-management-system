<html>
<body style=" background-image: url(userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$mobile=$_POST["mno"];
$pwd=$_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='".$pwd."' ") or die(mysql_error());

$temp1;
$temp2;
if($row = mysqli_fetch_array($query))
{
 echo "Welcome ";
 $temp1=$row['emailid'];
 $temp2=$row['id'];
 echo "$temp1";
 echo "<br><br>";

 $query2 = mysqli_query($conn," select * from user,resv where user.id=resv.id AND  user.mobileno=$mobile ") or die(mysql_error());

echo "<table><thead><td>PNR</td><td>Train_no</td><td>Date_Of_Journey</td><td>Total_Fare</td><td>Train_Class</td><td>Seats_Reserved</td><td>Status</td></thead>";

 while($row = mysqli_fetch_array($query2))
 {
  echo "<tr><td>".$row["pnr"]."</td><td>".$row["trainno"]."</td><td>".$row["doj"]."</td><td>".$row["tfare"]."</td><td>".$row["class"]."</td><td>".$row["nos"]."</td><td>".$row["status"]."</td></tr>";
 }

echo "</table>";

 if(mysqli_num_rows($query2) == 0)
 {
  echo "No Reservations Yet !!! <br><br> ";
 }
}

$_SESSION["id"]=$temp2;

//$rowcount=mysqli_num_rows($result);
if(mysqli_num_rows($query) == 0)
{
 echo "Wrong Combination!!! <br><br> ";
 echo " <a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";
 die();
}

?>

<form action="cancel.php" method="post">
Enter PNR for Cancellation: <input type="text" name="cancpnr" required><br><br>
<input type="submit" value="Cancel"><br><br>
</form>
<?php

echo " <a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";

$conn->close(); 

?>

</body>
</html>
