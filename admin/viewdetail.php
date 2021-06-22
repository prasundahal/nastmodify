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
$result = mysql_query("SELECT * FROM fung where status='1' ORDER BY id DESC");
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
		
		$sql="select * from fung  where id='$fungus'";
		$result=mysql_query($sql);
		
		
$data=mysql_fetch_assoc($result);

	?> 
    <h3><a href="index_1.php">Back to list</a></h3>
    <tr>
   		<td><b>Fungus </b></td></br></br>
		<td><?php echo $data['fungus'];?> </td>
        </tr>
        <tr>
        <td><b>Basonym </b></td>
		<td><?php echo $data['basonym'];?> </td>
        </tr>
         <tr>
        <td><b>Aubstrate Locality Author</b> </td>
		<td><?php echo $data['sla'];?> </td>
        </tr>
         <tr>
        <td><b>Classification</b></td>
		<td><?php echo $data['classification'];?> </td>
        </tr>
        <tr>
        <td><b>Distribution</b></td>
		<td><?php echo $data['distribution'];?> </td>
        </tr>
        <tr>
        <td><b>Edibility</b></td>
		<td><?php echo $data['edibility'];?> </td>
        </tr>
         <tr>
        <td><b>Local Names</b></td>
		<td><?php echo $data['local_names'];?> </td>
        </tr>
       
      <tr>
        <td><b>References</b></td>
		<td><?php echo $data['rec'];?> </td>
        </tr>
       <tr>
        <td><b>Other Database</b></td>
		<td><?php echo $data['other_database'];?> </td>
        </tr>
         <tr>
        <td><b>Image</b></td>
		<td> <img src="../fung_img/<?php echo $data['f_image']; ?>" width="70" height="70" /> </td>
        </tr>
    
        
    
	<?php 

?>
	</table>
</body>
</html>
