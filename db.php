<link rel="stylesheet" href="style.css" />
<?php
$servername = "localhost";
$username = "add your sql username here";
$password = "add your sql password here";
$dbname = "railway";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 
?>
