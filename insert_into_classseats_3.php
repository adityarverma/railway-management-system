<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php
session_start();

require "db.php";

if($_POST["tno"])
{
$trainno=$_POST["tno"];
$_SESSION["trainno"] = "$trainno";
$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";

$cdquery="SELECT * FROM train where trainno='".$trainno."'";
$cdresult=mysqli_query($conn,$cdquery);			
$cdrow=mysqli_fetch_array($cdresult);

echo "<table><thead><td>Train_no</td><td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td><td>Distance</td><td>Date_Of_Journey</td></thead>";
echo "<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td><td>".$cdrow[3]."</td><td>".$cdrow[4]."</td><td>".$cdrow[5]."</td><td>".$cdrow[6]."</td><td>".$cdrow[7]."</td><td>".$doj."</td></tr></table>";

$cdquery="SELECT sname FROM schedule where trainno='".$trainno."' ORDER BY distance ASC  ";
$cdresult=mysqli_query($conn,$cdquery);
$stations=array();
$i=0;
while($cdrow=mysqli_fetch_array($cdresult))
{
	$stations[$i]=$cdrow["sname"];
	$i+=1;
}

$_SESSION["ns"] = $i-1;

$_SESSION["stations"]="$stations";

echo " <table><thead><td>Starting Point</td><td>Destination Point</td><td>AC1 seats</td><td>AC1 Fare</td><td>AC2 seats</td><td>AC2 Fare</td><td>AC3 seats</td><td>AC3 Fare</td><td>CC seats</td><td>CC Fare</td><td>EC seats</td><td>EC Fare</td><td>SL seats</td><td>SL Fare</td></thead>";

echo "<form action=\"insert_into_classseats_4.php\" method=\"post\">";
$temp=0;

while ($temp<=$_SESSION["ns"]) 
{
$_SESSION["st".$temp]=$stations[$temp];
$temp+=1;
}

$temp=0;
while ($temp<$_SESSION["ns"]) 
{
 	echo " <tr><td>".$stations[$temp]."</td>
	<td>".$stations[$temp+1]."</td>
	<td><input type=\"text\" name=\"s1".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f1".$temp."\" value=\"0\" required></td>	
	<td><input type=\"text\" name=\"s2".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f2".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s3".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f3".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s4".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f4".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s5".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f5".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s6".$temp."\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f6".$temp."\" value=\"0\" required></td>
	</tr>";
 $temp+=1;
}

	echo "</table><input type=\"submit\"></form>";


}else
{
echo "
<form action=\"insert_into_classseats_3.php\" method=\"post\">
<table>
<thead><td>Train</td><td>Date Of Journey</td></thead>
<tr><td><select id=\"tno\" name=\"tno\" required>";

$query="SELECT * FROM train";
$result=mysqli_query($conn,$query);

while ($row=mysqli_fetch_array($result)) 
{
 $tno=$row['trainno'];
 $tn=$row['tname']." starting at ".$row['sp'];
 echo " <option value = \"$tno\" > $tn </option> ";
}

echo "</select></td>
<td><input type=\"date\" name=\"doj\" required></td></tr>
</table>
<input type=\"submit\" value=\"Enter Train Details\">
";
}

echo "<br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

?>

</body>
</html>


