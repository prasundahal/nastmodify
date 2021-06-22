<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

$id = 0;
if(isset($_POST['id']))
	$id = $_POST['id'];
elseif(isset($_GET['id']))
	$id = $_GET['id'];

if(isset($_GET['parentId']))
	$parentId = $_GET['parentId'];
else
	$parentId = 0;

//$weight = $groups -> getSubLastWeight(0, "PackageType");

if($_GET['type'] == "edit")
{
	$result = mysql_query("select * from tbl_polling where id='$id'");
	$row = $conn->fetchArray($result);	
	$question = $row['question'];
	$option1 = $row['option1'];
	$option2 = $row['option2'];
	$option3 = $row['option3'];
	$visible = $row['visible'];
}
if($_POST['type'] == "Save")
{
	extract($_POST);

	if(empty($question))
		$errMsg = "Please enter Question";
	else if(empty($option1))
		$errMsg = "Please enter Option One";	
	if(empty($option2))
		$errMsg = "Please enter Option Two";
	if(empty($option3))
		$errMsg = "Please enter Option Three";
	
	if(empty($errMsg)){
		$groups -> savePolling($id, $question, $option1, $option2, $option3, $visible);
		if($id > 0)
			$msg = "Question updated successfully";
		else
			$msg = "Question saved successfully";
		header("Location: polling.php?msg=$msg");
		exit();
	}
}
if($_GET['type']=="del")
{
	
		$groups -> deletePoll($id);
		header("Location: polling.php?msg=Poll question deleted successfully");
		exit();
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {
	color: #FF0000;
}
.wid{ width:200px}
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
          <td class="bgborder"><form action="<?= $_REQUEST['uri']?>" method="post">
              <table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                  <td bgcolor="#fff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="heading2">&nbsp;Manage Package Polling Questions
                          <div style="float: right;"> <a href="polling.php" class="headLink"> Add New </a> </div></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="2" cellspacing="0">
                            <?php if(!empty($errMsg)){ ?>
                            <tr align="left">
                              <td colspan="3" class="err_msg"><?php echo $errMsg; ?></td>
                            </tr>
                            <?php } ?>
                            <tr><td></td></tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="right"><strong> Question : </strong></td>
                              <td><label for="title"></label>
                                <input type="text" name="question" id="title" value="<?= $question?>" class="text" style="width:460px; height:17px;" /></td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                              <td></td>
                              <td align="right"><strong>Option 1 :</strong></td>
                              <td><div style="float:left;"><input type="text" name="option1" class="wid" value="<?=$option1?>" /></div><div style="float:left;padding-left:10px; width:150px;" id="urlmsg"></div></td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                              <td></td>
                              <td align="right"><strong>Option 2 :</strong></td>
                              <td><div style="float:left;"><input type="text" name="option2" class="wid" value="<?=$option2?>" /></div><div style="float:left;padding-left:10px; width:150px;" id="urlmsg"></div></td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                              <td></td>
                              <td align="right"><strong>Option 3 :</strong></td>
                              <td><div style="float:left;"><input type="text" name="option3" class="wid" value="<?=$option3?>" /></div><div style="float:left;padding-left:10px; width:150px;" id="urlmsg"></div></td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                              <td></td>
                              <td align="right"><strong>Visible :</strong></td>
                              <td><div style="float:left;">
                              	<input type="radio" name="visible" value="Yes" checked="checked" />Yes 
                                <input type="radio" name="visible" value="No" <? if($visible=="No"){?> checked="checked" <? }?> />No
                                
                                </div><div style="float:left;padding-left:10px; width:150px;" id="urlmsg"></div></td>
                            </tr>
                            <tr><td></td></tr>
                            
                            <tr>
                              <td></td>
                              <td></td>
                              <td>
                              <input type="submit" name="type" id="button" value="Save" class="button"  />
                             	<?php if(isset($_GET['type']) && $_GET['type'] == "edit"){ ?>
                              	<input type="hidden" value="<?= $id?>" name="id" id="id" />
                                <input type="button" name="cancel" id="button3" value="Cancel" class="button" onclick="javascript: history.go(-1);" />
                              <?php } else { ?>
                                
                                <input type="reset" name="reset" id="button2" value="Clear" class="button" />
                              <?php } ?>
                              </td>
                            </tr>
                            <tr><td></td></tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            </form></td>
        </tr>
        <tr height="5">
          <td></td>
        </tr>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp;Pollin Questions List</td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1" class="tahomabold11">
                            <td width="1">&nbsp;</td>
                            <td><strong>S.N</strong></td>
                            <td><strong>Questions</strong></td>
                            <td><strong>Option 1</strong></td>
                            <td><strong>Option 2</strong></td>
                            <td><strong>Option 3</strong></td>
                            <td><strong>Visible</strong></td>
                            <td><strong>Action</strong></td>
                          </tr>
                          <?php
													$counter = 0;
													$pagename = "polling.php?";
													$sql = mysql_query("SELECT * FROM tbl_polling order by id");
													
													//$limit = 20;
													//include("../includes/paging.php");
													while($row = $conn -> fetchArray($sql))
													{
													?>
                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                            <td valign="top">&nbsp;</td>
                            <td valign="top"><?= ++$counter; ?></td>
                            <td valign="top" style="width:250px"><?= $row['question'] ?></td>
                            <td valign="top"><?= $row['option1'] ?></td>
                            <td valign="top"><?php echo $row['option2']; ?></td>
                            <td valign="top"><?php echo $row['option3']; ?></td>
                            <td valign="top"><?php echo $row['visible']; ?></td>
                            <td valign="top">
                            	
                              [<a href="polling.php?type=edit&id=<?= $row['id']?>">Edit</a>]
                              
                              [<a href="#" onClick="javascript: if(confirm('This will permanently remove this Question from database. Continue?')){ document.location='polling.php?type=del&id=<?php echo $row['id']; ?>'; }">Delete</a>]
                              
                            </td>
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