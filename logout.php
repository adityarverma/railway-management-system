<?indexhindex
session_start();
$_SESSION=array();
session_destroy();
header('location:index.htm');
exit();
?>
