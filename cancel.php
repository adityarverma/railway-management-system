<html>

<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

$pnr=$_POST["cancpnr"];
$uid=$_SESSION["id"];
//echo "$uid";

$sql=" UPDATE resv SET status ='CANCELLED' WHERE resv.pnr='".$pnr."' AND resv.id='".$uid."' ";

if ($conn->query($sql) === TRUE) 
{
 echo "Cancellation Successful!!!";
} 
else 
{
 echo "<br><br>Error:" . $conn->error;
}

echo " <br><br><a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";

$conn->close(); 
?>

</body>
</html>
