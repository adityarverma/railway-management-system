<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<form action="insert_into_train_2.php" method="post">

Train Name: <input type="text" name="tname" required><br>

Starting Point: <select id="sp" name="sp" required>
<?php

require "db.php";

$cdquery="SELECT sname FROM station";
$cdresult=mysqli_query($conn,$cdquery);
        
echo " <option value = \"\" > </option>";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdTitle=$cdrow['sname'];
 echo " <option value = \"$cdTitle\" > $cdTitle </option>";
            
}
?>
</select><br>

Starting Time: <input type="time" name="st" required><br>

Destination Point: <select id="dp" name="dp" required>
<?php

require "db.php";

$cdquery="SELECT sname FROM station";
$cdresult=mysqli_query($conn,$cdquery);
        
echo " <option value = \"\" ></option>";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdTitle=$cdrow['sname'];
 echo " <option value = \"$cdTitle\" > $cdTitle </option>";
            
}
?>
</select><br>

Destination Time: <input type="time" name="dt" required><br>

Day of Arrival: <input type="text" name="dd" required><br>

<input type="submit">

</body>
</html>


