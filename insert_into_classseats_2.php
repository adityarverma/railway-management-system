<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";

$sql = "INSERT INTO classseats (trainno,doj,class,seatsleft,fare) VALUES ('".$_POST["tno"]."','".$_POST["doj"]."','".$_POST["class"]."','".$_POST["seatsleft"]."','".$_POST["fps"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br><br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>

</body>
</html>
