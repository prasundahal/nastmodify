<?php
include("init.php");
?>
<?php
//including the database connection file
//include_once("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysql_query("UPDATE fung SET status='0' WHERE id=$id");
		

//redirecting to the display page (index.php in our case)
header("Location:newdata.php");
?>

