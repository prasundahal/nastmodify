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
<?php 
 $fungus=$_GET['id'];
		
		
		$result = mysql_query("SELECT * FROM register  where id='$fungus'");
		
		
$data=mysql_fetch_assoc($result);

	?> 
    <h3><a href="userlist.php">Back to list</a></h3>
    <tr>
   		<td><b>Full Name </b></td></br></br>
		<td><?php echo $data['fullname'];?> </td>
        </tr>
        <tr>
        <td><b>Username</b></td>
		<td><?php echo $data['username'];?> </td>
        </tr>
         <tr>
        <td><b>Password</b> </td>
		<td><?php echo $data['password'];?> </td>
        </tr>
         <tr>
        <td><b>Email</b></td>
		<td><?php echo $data['email'];?> </td>
        </tr>
        <tr>
        <td><b>Phone</b></td>
		<td><?php echo $data['phone'];?> </td>
        </tr>
        <tr>
        <td><b>Address</b></td>
		<td><?php echo $data['address'];?> </td>
        </tr>
         <tr>
        <td><b>Comments</b></td>
		<td><?php echo $data['comments'];?> </td>
        </tr>
       
     
        
    
	<?php 

?>
	</table>
</body>
</html>
