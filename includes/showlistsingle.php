<?php include("includes/breadcrumb.php"); ?>

<?php
	$listResult = $groups->getById($pageId);
	$listRow = $conn->fetchArray($listResult);
	
	$pageResult = $groups->getById($pageParentId);
	$pageRow = $conn->fetchArray($pageResult);
	
	?>
<div class="contentHdr">

<!-- for navigation -->
<?
	$navNextResult = $groups->getNextResult($pageId);
	$navNextRow = $conn->fetchArray($navNextResult);

	$navPreviousResult = $groups->getPreviousResult($pageId);
	$navPreviousRow = $conn->fetchArray($navPreviousResult);
?>
<div style="float: right;"> <a href="<?php echo $navNextRow['urlname']; ?>" class="paging">Next &raquo;</a> </div>
<div style="float: right; margin-right:10px;" > <a href="<?= $navPreviousRow['urlname']; ?>" class="paging">&laquo; Previous</a> </div>
<div style="clear:both"></div>

<h3 style="margin-top:-2px;"><?php echo $pageName; ?></h3></div>
<div class="contenttt" style="text-align:justify; margin-top:-18px;">
<div style="margin-bottom:5px;"> 
  
</div>
<div class="listRow">
  
  
  <br />
  <div style="padding-top:10px;">
  	<?php
    	$image=$groups->getById($pageId);
		$imageGet=$conn->fetchArray($image);
		if($imageGet['image']!="")
		{?>
				<img height="200" width="210" style="padding-right:10px; float:left;" src="<?=CMS_GROUPS_DIR.$imageGet['image'];?>" />
        <?php }?>
    
    <?= $listRow['contents']; ?>
  </div>
</div>
<br />
<?php /*?><div><u>Attachments#</u></div>
<?php */?>
<?
	$lfResult = $listingFiles->getByListingId($pageId);
	if ($conn->numRows($lfResult) == 0)
	{
		//echo "<div class='attach'>No files</div>";
	}
	else
	{
	?>
<div class="attach">
  <table width="100%">
    <?
			}
			while ($lfRow = $conn->fetchArray($lfResult))
			{
			$file = CMS_LISTING_FILES_DIR . $lfRow['filename'];
			?>
    <tr>
      <td><?= $lfRow['filename'] . " (" . round((filesize($file)/1024),0) ." KB)"; ?></td>
      <td><?= $lfRow['caption']; ?></td>
      <td><a href="<?= CMS_LISTING_FILES_DIR . $lfRow['filename']; ?>">Download</a></td>
    </tr>
    <?
			}
			
			if ($conn->numRows($lfResult) > 0)
			{
			?>
  </table>
</div>
<?
	}
	?>
    <div style="clear:both"></div>
</div>