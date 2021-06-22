<?php
include("init.php");
?>
<?php
// including the database connection file
//include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	 $fungus = $_POST['fungus'];
	$basonym = $_POST['basonym'];
	$sla = $_POST['sla'];
	$distribution = $_POST['distribution'];
	$classification = $_POST['classification'];
	$edibility = $_POST['edibility'];
	$local_names = $_POST['local_names'];
	$rec = $_POST['rec'];
	$other_database = $_POST['other_database'];
	  $name = $_POST['image'];
	 
		 if ($_FILES['images']['tmp_name'] != '') {  
	$upload=$_FILES['images']['tmp_name'];
	$fileupload=$_FILES['images']['name']; 
	$result = mysql_query("UPDATE fung SET fungus='$fungus',basonym='$basonym',sla='$sla',distribution='$distribution',classification='$classification',edibility='$edibility',local_names='$local_names',rec='$rec',other_database='$other_database',f_image='$fileupload' WHERE id=$id");
	move_uploaded_file($_FILES['images']['tmp_name'],'../fung_img/'. $fileupload);
		 } else{
	/*// checking empty fields
	if(empty($fungus) || empty($basonym) || empty($sla)|| empty($distribution)|| empty($classification)|| empty($edibility)|| empty($local_names)|| empty($rec)|| empty($other_database)) {
				
		if(empty($fungus)) {
			echo "<font color='red'>Fungus field is empty.</font><br/>";
		}
		
		if(empty($basonym)) {
			echo "<font color='red'>Basonym field is empty.</font><br/>";
		}
		
		if(empty($sla)) {
			echo "<font color='red'>Substrate, Locality & Author field is empty.</font><br/>";
		}
		if(empty($distribution)) {
			echo "<font color='red'>Distribution field is empty.</font><br/>";
		}
		if(empty($classification)) {
			echo "<font color='red'>Classification field is empty.</font><br/>";
		}
		if(empty($edibility)) {
			echo "<font color='red'>Edibility field is empty.</font><br/>";
		}
		if(empty($local_names)) {
			echo "<font color='red'>Local names field is empty.</font><br/>";
		}
		if(empty($rec)) {
			echo "<font color='red'>References field is empty.</font><br/>";
		}
		if(empty($other_database)) {
			echo "<font color='red'>Other database field is empty.</font><br/>";
		}
		
	} else {*/	
		//updating the table
		
		$result = mysql_query("UPDATE fung SET fungus='$fungus',basonym='$basonym',sla='$sla',distribution='$distribution',classification='$classification',edibility='$edibility',local_names='$local_names',rec='$rec',other_database='$other_database',f_image='$name' WHERE id=$id");
	}
		//redirectig to the display page. In our case, it is index.php
		header("Location: index_1.php");
	}
//}
?>

<html>
<head>	
	<title>Edit Data</title>
	<link href="../css/admin.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style1 {
	color: #FF0000
}
-->
</style>
<script type="text/javascript" src="../js/cms.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
	
	<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          
  </tr>
	  <?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result1 = mysql_query("SELECT * FROM fung WHERE id=$id");

$res = mysql_fetch_assoc($result1);
    $fungus = $res['fungus'];
	$basonym = $res['basonym'];
	$sla = $res['sla'];
	$distribution = $res['distribution'];
	$classification = $res['classification'];
	$edibility = $res['edibility'];
	$local_names = $res['local_names'];
	$rec = $res['rec'];
	$other_database = $res['other_database'];
	$name = $res['f_image'];
	//echo $name; die();
	 

?>
<?php echo $fungus1;?>
	<form name="form1" method="post" action="edit.php" enctype="multipart/form-data">
		<table border="0">
			<tr> 
				<td>Fungus</td>
				<td>
             
               <input type="text" name="fungus" value="<?php echo $fungus;?>" style="width:400px;">
                </td>
			</tr>
			<tr> 
				<td>Basonym</td>
				<td><input type="text" name="basonym" value="<?php echo $basonym;?>" style="width:400px;"></td>
			</tr>
			<tr> 
				<td>Substrate, Locality & Author</td>
				<td><input type="text" name="sla" value="<?php echo $sla;?>" style="width:400px;"></td>
			</tr>
			<tr> 
				<td>Distribution</td>
				<td><input type="text" name="distribution" value="<?php echo $distribution;?>" style="width:400px;"></td>
			</tr>
			<tr> 
				<td>Classification</td>
				<td><input type="text" name="classification" value="<?php echo $classification;?>" style="width:400px;"></td>
			</tr>
			<tr> 
				<td>Edibility</td>
				<td><input type="text" name="edibility" value="<?php echo $edibility;?>" style="width:400px;"></td>
			</tr>
			<tr> 
				<td>Local names</td>
				<td><input type="text" name="local_names" value="<?php echo $local_names;?>" style="width:400px;"></td>
			</tr>
			<tr> 
				<td>References </td>
				<td><textarea name="rec" style="width:400px;"> <?php echo $rec;?></textarea></td>
			</tr>
			<tr> 
				<td>Other Database</td>
				
                <td><input type="text" name="other_database" value="<?php echo $other_database;?>" style="width:400px;"></td>
			</tr>
            <tr> 
				<td>Image</td>
				<td><img src="../fung_img/<?php echo $name;?>" width="50" height="50" >
                <input type="file" name="images" value="<?php echo $name;?>"> 
                <input type="hidden" name="image" value="<?php echo $name;?>"></td>
			</tr>
           
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
