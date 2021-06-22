<?php
include("init.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
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


<?php
	$fungus = $_POST['fungus'];
	$basonym = $_POST['basonym'];
	$sla = $_POST['sla'];
	$distribution = $_POST['distribution'];
	$classification = $_POST['classification'];
	$edibility = $_POST['edibility'];
	$local_names = $_POST['local_names'];
	$references = $_POST['references'];
	$other_database = $_POST['other_database'];
	$f_image = $_POST['f_image'];
	$upload=$_FILES['f_image']['tmp_name'];
	$fileupload=$_FILES['f_image']['name'];
	move_uploaded_file($_FILES['f_image']['tmp_name'],'../fung_img/'. $fileupload);
	
	$fungus = mysql_real_escape_string($fungus);
  $basonym = mysql_real_escape_string($basonym);
  $sla = mysql_real_escape_string($sla);
  $distribution = mysql_real_escape_string($distribution);
  $distribution = mysql_real_escape_string($distribution);
  $edibility = mysql_real_escape_string($edibility);
  $local_names = mysql_real_escape_string($local_names);
  $references = mysql_real_escape_string($references);
  $other_database = mysql_real_escape_string($other_database);
  $f_image = mysql_real_escape_string($f_image);

if(isset($_POST[submit]))
{

	  $sql = "insert into fung (fungus, basonym, sla, distribution, classification, edibility, local_names, references, other_database, f_image) values ('','".$fungus."','".$basonym."','".$sla."',''".$distribution."',y'".$classification."',''".$edibility."',)'".$local_names."','".$references."','".$other_database."','".$f_image."'";
	  //$sql->saveImage($_GET['eid']);
	
	$msg = "Product Successfully Edited.";
	
	mysql_query($sql) or die(mysql_error());


echo"<script>alert('data inserted successfully');</script>";
}

?>
<!--<script type="text/javascript">
function validate(valid) 
{
	var reason = "";
   reason += firstname(valid.firstname);
  reason += lastname(valid.lastname);
  reason += Email(valid.email);
  reason += Phone(valid.phone);
  if (reason != "") 
  {
    alert("Some fields need correction:\n" + reason);
    return false;
  }
  return true;
}
function firstname(fld) 
{
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
    if (fld.value == "") {
    error = "You didn't enter a firstname.\n";
    } 
	else if (illegalChars.test(fld.value)) 
	{
        fld.vlaue="";
        error = "The fistname contains illegal characters.\n";//if space is given
    } 
    return error;
}
function lastname(fld)
{
	var error="";
	var illegalChars= /\W/; //allow letters, numbers, and underscores
	if(fld.value=="")
	{
		error="you didn't enter last name \n";
	}
	else if(illegalChars.test(fld.value))
	{
		fld.vlaue="";
		error="the last name contains illegal characters \n";
	}
	return error;
}
function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
}
function Phone(fld) 
{
    var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');
    if (fld.value == "") 
	{
        error = "You didn't enter a phone number.\n";
    }
	 else if (isNaN(parseInt(stripped))) 
	 {
        fld.vlaue="";
        error = "The phone number contains illegal characters.\n";
        
    } else if (!(stripped.length == 10)) {
        fld.vlaue="";
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
   
    }
    return error;
}
function Email(fld) 
{
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
    if (fld.value == "") 
	{ 
        error = "You didn't enter an email address.\n";
    } 
	else if (!emailFilter.test(tfld)) 
	{              //test email for illegal characters
   
        fld.vlaue="";
        error = "Please enter a valid email address.\n";
     } 
	 else if (fld.value.match(illegalChars)) 
	 {
     
        fld.vlaue="";
        error = "The email address contains illegal characters.\n";
 
    } //else {
//        fld.style.background = 'White';
//    }
    return error;
}
</script>-->

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
 <form action="add.php" method="post" enctype="multipart/form-data" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Fungus</td>
				<td><input type="text" name="fungus" value=""></td>
			</tr>
			<tr> 		
				<td>Basonym</td>
				<td><input type="text" name="basonym" value=""></td>
			</tr>
			<tr> 
				<td>Substrate, Locality & Author</td>
				<td><input type="text" name="sla" value=""></td>
			</tr>
			<tr> 
				<td>Distribution</td>
				<td><input type="text" name="distribution" value=""></td>
			</tr>
			<tr> 
				<td>Classification</td>
				<td><input type="text" name="classification" value=""></td>
			</tr>
			<tr> 
				<td>Edibility</td>
				<td><input type="text" name="edibility" value=""></td>
			</tr>
			<tr> 
				<td>Local Names</td>
				<td><input type="text" name="local_names" value=""></td>
			</tr>
			<tr> 
				<td>References</td>
				<td><input type="text" name="rec" value=""></td>
			</tr>
			<tr> 
				<td>Other Database</td>
				<td><input type="text" name="other_database" value=""></td>
			</tr>
            <tr> 
				<td>Image</td>
				<td><input type="file" name="f_image" value=""></td>
			</tr>
			
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
 <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>