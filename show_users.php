<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

$cdquery="SELECT * FROM user";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Id</td><td>Email_Id</td><td>Password</td><td>Mobile_no</td><td>Date_Of_Birth</td><td></td><td></td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td><td>".$cdrow[3]."</td><td>".$cdrow[4]."</td><td><a href=\"http://localhost/railway/edit_user.php?id=".$cdrow[0]."\"><button>Edit</button></a></td><td><a href=\"http://localhost/railway/delete_user.php?id=".$cdrow[0]."\"><button>Delete</button></a></td></tr>
";
}
echo "</table>";

echo " <br><a href=\"http://localhost/railway/new_user_form.html\"> Add New User </a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>
