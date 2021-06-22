<?php
include("init.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
//including the database connection file
//include_once("config.php");


if(isset($_POST['Submit'])) {	
	$fungus = $_POST['fungus'];
	$basonym = $_POST['basonym'];
	$sla = $_POST['sla'];
	$distribution = $_POST['distribution'];
	$classification = $_POST['classification'];
	$edibility = $_POST['edibility'];
	$local_names = $_POST['local_names'];
	$rec = $_POST['rec'];
	$other_database = $_POST['other_database'];
	 $tempname = $_FILES["f_image"]["tmp_name"];
	$name = $_FILES["f_image"]["name"];
	move_uploaded_file($tempname, "../fung_img/".$name);
		
	// checking empty fields
	/*if(empty($fungus) || empty($basonym) || empty($sla)|| empty($distribution)|| empty($classification)|| empty($edibility)|| empty($local_names)|| empty($rec)|| empty($other_database)) {
				
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
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { */
		// if all the fields are filled (not empty) 
			


   
  
		//insert data to database	
		$result = mysql_query("INSERT INTO fung(fungus,basonym,sla,distribution,classification,edibility,local_names,rec,other_database, f_image, status) VALUES('$fungus','$basonym','$sla','$distribution','$classification','$edibility','$local_names','$rec','$other_database','$name', '0')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index_1.php'>View Result</a>";
	}
/*}*/
?>
</body>
</html>
