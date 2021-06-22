<?php //include("includes/breadcrumb.php"); ?>

<div class="contentHdr">
		<h2 style="padding-top:5px;"><?php echo $pageName; ?></h2>
</div>
<div class="content_inner" style=" width:100%; text-align:justify;">
		<?php
        $pagename = "index.php?id=". $pageId ."&";
        include("includes/pagination.php");
		$image=$groups->getById($pageId);
		$imageGet=$conn->fetchArray($image);
		if($imageGet['image']!="")
		{
			if($pageName!="Message From MD"){?>
				<img max-width="40%" style="padding-right:10px; float:left;" src="<?=CMS_GROUPS_DIR.$imageGet['image'];?>" />
        	<?php } else{?>
				<img height="210" width="250" style="padding-right:10px; float:left;" src="<?=CMS_GROUPS_DIR.$imageGet['image'];?>" />
            <?php }?>
		<?php }?>
        <?php echo Pagination($pageContents, "content");
        ?>
        <div style="clear:both; padding-bottom:15px; "></div>

</div>
<div style="clear:both"></div>

<?php /*?><?php if($pageDisplay == "normal"){ ?>

<div style=" float:left; width:31%; margin-top:10px; font-size:15px; margin-left:25px; margin-top:-40px; text-align:center;">
		<p style="font-size:16px; color:#FFF; margin-bottom:5px; background:#028CC5; padding:5px; font-weight:bold;">Other Menus:</p>
        <ul class="cmsNormalGroupWrapper">
	<?php
	//receive parentId from the caller page
	$result = $groups->getById($pageId);
	$row = $conn->fetchArray($result);
	$parentId=$row['parentId'];
	if($row['name']=="Contact Us" or $row['name']=="Major Clients" or $row['name']=="Major clients" or $row['name']=="major clients" or $row['name']=="ContactUS" or $row['name']=="Contact us" or $row['name']=="contact us" or $row['name']=="Contact")
	{
			createMenu(0, "Header");	
	}
	else
	{
	$subResult = $groups->getByParentId($parentId);
	
	
	while ($subRow = $conn->fetchArray($subResult))
	{
	 echo "<li>";
	 if ($subRow['linkType'] == "File")
	 {
		echo "<a href='" . CMS_FILES_DIR . $subRow['contents'] ."'>" . $subRow['name'] . "</a>";
	 }
	 elseif($subRow['linkType'] == "Link")
	 {
	 	echo '<a href="'. $subRow['contents'] .'">'. $subRow['name'] . '</a>';
	 }
	 else
	 {
		echo "<a href='". $subRow['urlname'] . "'>" . $subRow['name'] . "</a>";
	 }
	 echo "</li>";
	} }
?>
</ul>
</div>
<div style="clear:both;"></div>

<?php } elseif($pageDisplay == "list"){
$subResult = $groups->getByParentId($pageId);
while ($subRow = $conn->fetchArray($subResult))
{	
	?>
  <div style="margin-bottom:5px;">
		<? if(file_exists(CMS_GROUPS_DIR . $subRow['image']) && !empty($subRow['image'])){?>
    <a href="<?= $subRow['urlname'] ?>"><img src="<?php echo imager($subRow['image'], 100, 75, "fix"); ?>" alt="<?php echo $listRow['title']; ?>" style="border:0; margin-right:5px;" align="left" /></a>
    <? } ?>
    <div>
    <div class="listTitle"><a href="<?php echo $subRow['urlname']; ?>"><?php echo $subRow['name']; ?></a></div>
    <?php echo $subRow['shortcontents']; ?> </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
  
  <?php
}
?>
<?php } ?><?php */?>