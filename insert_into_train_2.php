<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

$sql = "INSERT INTO train (tname,sp,st,dp,dt,dd) VALUES ('".$_POST["tname"]."','".$_POST["sp"]."','".$_POST["st"]."','".$_POST["dp"]."','".$_POST["dt"]."','".$_POST["dd"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>

</body>
</html>
