<link href="../css/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #FF0000
}
-->
</style>

</head>

<?php  if($_SESSION['username']){ ?>

<?php
if(isset($_POST['Submit']))
{
	$fungus = $_POST['fungus'];
	$basonym = $_POST['basonym'];
	$sla = $_POST['sla'];
	$distribution = $_POST['distribution'];
	$classification = $_POST['classification'];
	$edibility = $_POST['edibility'];
	$local_names = $_POST['local_names'];
	$rec = $_POST['rec'];
	$other_database = $_POST['other_database'];
	//$f_image = $_POST['f_image'];
	$upload=$_FILES['f_image']['tmp_name'];
	$fileupload=$_FILES['f_image']['name'];
	
	move_uploaded_file($_FILES['f_image']['tmp_name'],'fung_img/'. $fileupload);
	
	$fungus = mysql_real_escape_string($fungus);
  $basonym = mysql_real_escape_string($basonym);
  $sla = mysql_real_escape_string($sla);
  $distribution = mysql_real_escape_string($distribution);
  $distribution = mysql_real_escape_string($distribution);
  $edibility = mysql_real_escape_string($edibility);
  $local_names = mysql_real_escape_string($local_names);
  $rec = mysql_real_escape_string($rec);
  $other_database = mysql_real_escape_string($other_database);
  $f_image = mysql_real_escape_string($fileupload);



	   $sql = "insert into fung  values ('','$fungus','$basonym','$sla','$distribution','$classification','$edibility','$local_names',
	  '$rec','$other_database','$f_image', '1')";
	 // $sql->saveImage($_GET['eid']);
	
	
	
	if(mysql_query($sql))
	{


echo"<script>alert('data inserted successfully');</script>";
	}
}

?>

<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <?php /*?><td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td><?php */?>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          
  </tr>
 <form action="" method="post" enctype="multipart/form-data" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;">Fungus</td>
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;">
                <input type="text" name="fungus" required="required" value="" style="width:350px; height:40px;"></td>
			</tr>
			<tr > 		
				<td style="background:#eee;">Basonym</td>
				<td style="background:#eee;"><input type="text" name="basonym" value="" style="width:350px; height:40px;"></td>
			</tr>
			<tr> 
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;">Substrate, Locality & Author</td>
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid; height:40px;">
                <input type="text" name="sla" value="" style="width:350px; height:40px;"></td>
			</tr>
			<tr> 
				<td style="background:#eee;">Distribution</td>
				<td style="background:#eee;"><input type="text" name="distribution" value="" style="width:350px; height:40px;"></td>
			</tr>
			<tr> 
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;">Classification</td>
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;"><input type="text" name="classification" required="required" value="" style="width:350px; height:40px;"></td>
			</tr>
			<tr> 
				<td style="background:#eee;">Edibility</td>
				<td style="background:#eee;"><input type="text" name="edibility" value="" style="width:350px; height:40px;"></td>
			</tr>
			<tr> 
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;">Local Names</td>
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;">
                
                <input type="text" name="local_names" value="" style="width:350px; height:40px;"></td>
			</tr>
			<tr> 
				<td style="background:#eee;">References</td>
				<td style="background:#eee;">
                <textarea  name="rec" value="" style="width:350px; height:40px;"> </textarea></td>
			</tr>
			<tr> 
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;">Other Database</td>
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;">
                <input type="text" name="other_database" value="" style="width:350px; height:40px;"></td>
			</tr>
            <tr> 
				<td style="background:#eee;">Image [MaxSize 800kb]</td>
				<td style="background:#eee;">
                
                <input type="file" name="f_image" value="" ></td>
			</tr>
			
			<tr> 
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;"></td>
				<td style="background:#CCC; border-bottom:1px solid; border-top: 1px solid;"><input type="submit" class="tfbutton" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
 
</table>
<? }
else {
	 
	echo"<script>window.location='login';</script>";
	}

 ?>