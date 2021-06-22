<?php include("includes/breadcrumb.php"); ?>

<div style="margin-left:10px;" class="contentHdr">
<h2><?php echo $pageName; ?></h2></div>
<div class="contenttt" style="margin-left:20px; width:580px">
	<?php
	$pagename = "index.php?linkId=". $pageId ."&";
	
	$sql = "SELECT * FROM groups WHERE parentId = '$pageId' ORDER BY id DESC";
	
	$newsql = $sql;

	$limit = LISTING_LIMIT;
	
	include("includes/pagination.php");
	$return = Pagination($sql, "");
	
	$arr = explode(" -- ", $return);

	$start = $arr[0];
	$pagelist = $arr[1];
	$count = $arr[2];
	
	$newsql .= " LIMIT $start, 50";
	
	$result = mysql_query($newsql);
	
	while ($listRow = $conn->fetchArray($result))
	{
	?>
		<div class="listRow" style="margin-bottom:25px;">
		  <? if(file_exists(CMS_GROUPS_DIR . $listRow['image']) && !empty($listRow['image'])){?>
          <div style="float: left; width: 110px;"> <a href="<?= $listRow['urlname'] ?>"><img src="" alt="<?php echo $listRow['title']; ?>" style="border:0" /></a></div>
          <? } ?>
          <div>
            <div>
              <div class="newsList">
              		<a style="font-size:14px; color:#678501; font-weight:bold; text-decoration:none" href="<?php echo $listRow['urlname']; ?>">
						<?php echo $listRow['name']; ?>
                   	</a>
             	</div>
              <?php echo $listRow['shortcontents']; ?><a style="float:right; color:red;" href="<?=$listRow['urlname'];?>">more...</a> </div>
          </div>
        </div>
		<div style="clear:both;"></div>
	<? }
	if($count > $limit)
	//echo $pagelist;
	?>
    <div style="clear:both"></div>
</div>
