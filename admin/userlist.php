<?php
include("init.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">

.style1 {
	color: #FF0000;
	.
}
.table{
	border:1px solid #333;
	}


</style>
<script type="text/javascript" src="../js/cms.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>


<?php
//including the database connection file
//include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = mysql_query("SELECT * FROM register  ORDER BY id DESC");
?>



<body>


	<table width='80%' border=1>
	<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="1px" cellspacing="0" cellpadding="0">
        <tr>
          
  </tr>
    <h2>User Information</h2><br/><br/>
	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>Fullname</td>
		<td>Username</td>
		<td>Password</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Address	</td>
		<td>Comments</td>
		
	</tr>
	<?php 
	while
	($res = mysql_fetch_array($result)) { 
				
		echo "<tr>";
		echo "<td>".substr($res['id'], 0, 20)."</td>";
		
		echo "<td>".substr($res['fullname'], 0, 20)."</td>";
		echo "<td>".substr($res['username'], 0,20)."</td>";	
		echo "<td>".substr($res['password'], 0, 20)."</td>";
		echo "<td>".substr($res['email'], 0, 20)."</td>";
		echo "<td>".substr($res['phone'], 0, 20)."</td>";	
		echo "<td>".substr($res['address'], 0, 20)."</td>";
		echo "<td>".substr($res['comments'], 0, 50)."</td>";
				?>
               <?	
		echo "<td><a href=\"viewuser.php?id=$res[id]\">View</a> | <a href=\"deleteuser.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
