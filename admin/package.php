<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if(isset($_POST['id']))
	$id = $_POST['id'];
elseif(isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = 0;

if(isset($_POST['regionId']))
	$regionId = $_POST['regionId'];
elseif(isset($_GET['regionId']))
	$regionId = $_GET['regionId'];
else
	$regionId = 0;

if(isset($_POST['categoryId']))
	$categoryId = $_POST['categoryId'];
elseif(isset($_GET['categoryId']))
	$categoryId = $_GET['categoryId'];
else
	$categoryId = 0;
	
$weight = $groups -> getLastWeight("Package", 0);

if($_GET['type'] == "edit")
{
	$result = $groups->getById($_GET['id']);
	$editRow = $conn->fetchArray($result);	
	extract($editRow);
}
if($_POST['type'] == "Save")
{
	extract($_POST);
	
	if(empty($regionId))
		$errMsg = "<li>Please select Region</li>";
	if(empty($categoryId))
		$errMsg .= "<li>Please select Category</li>";
	if(empty($title))
		$errMsg .= "<li>Please enter Package Title</li>";
	if(empty($urlname))
		$errMsg .= "<li>Please enter Alias Name</li>"	;
	elseif(!$groups -> isUnique($id, $urlname))
		$errMsg .= "<li>Alias Name already exists.</li>";
	if(empty($duration))
		$errMsg .= "<li>Please enter Package Duration</li>"	;
		
	if(empty($errMsg))
	{
		$pid = $groups -> savePackage($id, $regionId, $categoryId, $title, $urlname, $duration, $altitude, $grade, $groupSize, $featured, $shortcontents, $weight);
		if($id > 0)
			$pid = $id;
		$groups -> saveImage($pid);
		
		header("Location: package.php?regionId=".$regionId."&categoryId=".$categoryId."&msg=Package details saved successfully");
		exit();
	}		
}

if($_GET['type'] == "toogle")
{
	if($package->toggleStatus($_GET['id']) > 0)
		header("location: package.php?region=".$_GET['region']."&category=".$_GET['category']."&msg=Package status toogled successfully.");
}

if($_GET['type'] == "toogleFeatured")
{
	$id = $_GET['id'];
	$changeTo = $_GET['changeTo'];
	
	$sql = "UPDATE groups SET featured='$changeTo' WHERE id='$id'";
	$conn->exec($sql);
	header("location: package.php?regionId=".$_GET['regionId']."&categoryId=".$_GET['categoryId']."&msg=Package feature status toogled successfully.");
	
}
	
if($_GET['type'] == "removeImage")
{
	if($groups->deleteImage($_GET['id']))
		header("location: package.php?regionId=".$_GET['regionId']."&categoryId=".$_GET['categoryId']."&type=edit&id=".$_GET['id']."&msg=Package image deleted successfull.");
}

if($_GET['type']=="del")
{
		$groups -> delete($_GET['id']);
		header("Location : package.php?regionId=".$_GET['regionId']."&categoryId=".$_GET['categoryId']."&msg=Package deleted successfully.");
}
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
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#fff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp; Manage Package
                        <div style="float: right;">
                          <?
														$addNewLink = "package.php";
													if(isset($_GET['category']) && !empty($_GET['category']))
														$addNewLink .= "?category=".$_GET['category'];
													?>
                          <a href="<?= $addNewLink?>" class="headLink">Add New</a></div></td>
                    </tr>
                    <tr>
                      <td>
                      <form action="<?= $_REQUEST['uri']?>" method="post" enctype="multipart/form-data">
                      <table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <?php if(!empty($errMsg)){ ?>
                          <tr align="left">
                            <td colspan="3" class="err_msg"><?php echo $errMsg; ?></td>
                          </tr>
                          <?php } ?>                          
                            <tr>
                              <td>&nbsp;</td>
                              <td><strong>Region : *</strong></td>
                              <td><select name="regionId" class="list1" onchange="this.form.submit();">
                                  <option value="" selected="selected">--Select Region--</option>
                                  <?php
																	$result = $groups -> getByParentIdAndLinkType(0, "PackageRegion");
																	while($row = $conn->fetchArray($result))
																	{
																	?>
                                  <option value="<?= $row['id']?>" <? if($regionId == $row['id']) echo 'selected="selected"'; ?>>
                                  <?= $row['name']?>
                                  </option>
                                  <?
																	}
																	?>
                              </select></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><strong> Category : *</strong></td>
                              <td><select name="categoryId" class="list1" onchange="this.form.submit();">
                                  <option value="" selected="selected">--Select Category--</option>
                                  <? $groups->comboRecursionTravel("PackageType", $categoryId, 0)?>
                                </select></td>
                            </tr>                           
                            <tr>
                              <td>&nbsp;</td>
                              <td><strong> Package : *</strong></td>
                              <td><label for="title"></label>
                                <input name="title" type="text" class="text" id="title" value="<?= $name; ?>" onchange="copySame('urlname', this.value);" /></td>
                            </tr>                           
                            <tr>
                              <td>&nbsp;</td>
                              <td><strong> Alias Name : *</strong></td>
                              <td>
                              	<div style="float:left"><label for="urlname"></label>
                                <input name="urlname" type="text" class="text" id="urlname" value="<?= $urlname; ?>" onchange="copySame('urlname', this.value);" onblur="checkUrlName('<?php echo $id; ?>', this.value, 'urlmsg');" /></div>
                                <div style="padding-left:10px; float:left; width:150px;" id="urlmsg">&nbsp;</div></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>Duration : *</strong></td>
                              <td><input name="duration" type="text" class="text" id="duration" value="<?= $duration?>" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>Altitude :</strong></td>
                              <td><input name="altitude" type="text" class="text" id="altitude" value="<?= $altitude?>" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>Grade :</strong></td>
                              <td><select name="grade">
                                  <?
																	for($i =1; $i <=5; $i++)
																	{
																	?>
                                  <option value="<?= $i?>" <? if($grade == $i) echo 'selected="selected"';?>>
                                  <?= $i?>
                                  </option>
                                  <?
																	}
																	?>
                                </select></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>Group :</strong></td>
                              <td><input name="groupSize" type="text" class="text" id="groupSize" value="<?= $groupsize; ?>" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>Featured :</strong></td>
                              <td><label>
                                  <input name="featured" type="radio" id="featured_0" value="No" checked="checked" />
                                  No</label>
                                <label>
                                  <input type="radio" name="featured" value="Yes" id="featured_1" <? if($featured == 'Yes') echo 'checked="checked"';?> />
                                  Yes</label></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>Short Description :</strong></td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td colspan="2">
															<?php
                            	include ("../fckeditor/fckeditor.php");
															$sBasePath="../fckeditor/";
															
															$oFCKeditor = new FCKeditor('shortcontents');
															$oFCKeditor->BasePath	= $sBasePath ;
															$oFCKeditor->Value		= $shortcontents;
															$oFCKeditor->Height		= "205";
															$oFCKeditor->ToolbarSet	= "Rupens";	
															$oFCKeditor->Create();
															?>
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>Weight :</strong></td>
                              <td><input name="weight" type="text" class="text" id="weight" value="<?php echo $weight; ?>" style="width:25px;" /></td>
                            </tr>
                            <?
														if(file_exists("../".CMS_GROUPS_DIR.$editRow['image']) && $_GET['type'] == 'edit')
														{
														?>
                            <tr>
                              <td></td>
                              <td><strong>Current Image : </strong></td>
                              <td><img src="../data/imager.php?file=../<?= CMS_GROUPS_DIR.$editRow['image']; ?>&amp;mw=150&amp;mh=150" />[ <a href="package.php?categoryId=<?= $categoryId?>&type=removeImage&id=<?= $id?>">Remove Image</a>]</td>
                            </tr>
                            <?
														}
														?>
                            <tr>
                              <td></td>
                              <td><strong>Image :</strong></td>
                              <td><label for="image"></label>
                                <input type="file" name="image" id="image" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td>
                              	<input name="type" type="submit" class="button" id="button" value="Save" />
                              	<?php if($_GET['type'] == "edit"){ ?>
                              	<input type="hidden" value="<?= $id?>" name="id" id="id" />
                                <?php }else{ ?>                                
                                <input name="reset" type="reset" class="button" id="button2" value="Clear" />
                                <?php } ?>
                                </td>
                            </tr>                        
                        </table>
                        </form></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr height="5"><td></td></tr>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp;Package  Lists</td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1" class="tahomabold11">
                            <td width="1">&nbsp;</td>
                            <td><strong>SN</strong></td>
                            <td> Title</td>
                            <td>Featured</td>
                            <td>Weight</td>
                            <td><strong>Action</strong></td>
                          </tr>
                          <?php
													$counter = 0;
													$pagename = "package.php?categoryId=".$category;
													$sql = "SELECT * FROM groups WHERE linkType = 'Package'";
													if($regionId > 0)
														$sql .= " AND regionId = '$regionId'";
													if($categoryId > 0)
														$sql .= " AND categoryId = '$categoryId'";
													$sql .= " ORDER BY weight";
													echo $sql;
													$limit = 20;
													include("paging.php");
													while($row = $conn -> fetchArray($result))
													{
													?>
                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                            <td valign="top">&nbsp;</td>
                            <td valign="top"><?= ++$counter; ?></td>
                            <td valign="top"><?= $row['name'] ?></td>
                            <td valign="top">
														<?=$row['featured'];?>
                            <?
														$changeTo = 'Yes';
														if ($row['featured'] == 'Yes')
															$changeTo = 'No';
														?>
                              (<a href="package.php?regionId=<?= $_GET['regionId']?>&categoryId=<?= $_GET['categoryId']?>&type=toogleFeatured&id=<?= $row['id']?>&changeTo=<?=$changeTo;?>">Change</a>)</td>
                            <td valign="top"><?= $row['weight'] ?></td>
                            <td valign="top"> [ <a href="package.php?regionId=<?= $_GET['regionId']?>&categoryId=<?= $_GET['categoryId']?>&type=edit&id=<?= $row['id']?>">Edit</a> | <a href="#" onClick="javascript: if(confirm('This will permanently remove this package type from database. Continue?')){ document.location='package.php?regionId=<?= $_GET['regionId']?>&categoryId=<?= $_GET['categoryId']?>&type=del&id=<?php echo $row['id']; ?>'; }">Delete</a> ]</td>
                          </tr>
                          <?
													}
													?>
                        </table>
                      <?php include("paging_show.php"); ?></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>