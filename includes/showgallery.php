
<!--jquery for gallery light box end-->
<!--jquery for gallery light box end-->
<?php //include("includes/breadcrumb.php"); ?>
<h2 style="font-size:20px; margin-top:2px; margin-left:12px; padding-top:10px;"><?php echo $pageName; ?></h2>
<div style="margin-bottom:15px; margin-left:12px;">
  <?php 
		$i = 0;
		$pagename = $pageUrlName."/";
		$sql = "SELECT * FROM groups WHERE parentId = $pageId ORDER BY id DESC";
		
		$newsql = $sql;	
		$limit = PAGING_LIMIT;

		include("includes/pagination.php");
		$return = Pagination($sql, "");

		$arr = explode(" -- ", $return);

		$start = $arr[0];
		$pagelist = $arr[1];
		/*$count = $arr[2];*/

		$newsql .= " LIMIT $start, 15";

		$result = mysql_query($newsql);
		$displayPerRow = 5;
		while ($galleryRow = $conn->fetchArray($result))
		{
				++$i;
		?>
  <div class="imageRow" style="background:none; margin:0px; padding:0px; width:200px; float:left; padding-top:5px; padding-bottom:5px;">
    <div class="set" style="background:none; margin:0px; padding:0px; width:200px">
      
      
      <div class="single" style="float:left; margin-left:12px; margin-bottom:0px; background:none; float:left; width:200px;
		<?php if($i%$displayPerRow != 0) echo ' margin-right:5px;'; ?> line-height:75px;">
         
        <a style="" rel="lightbox-gallery" href="<?= CMS_GROUPS_DIR . $galleryRow['image'] ?>" 
                title="<?php echo $galleryRow['shortcontents']; ?>">
                 
                <img src="<?php echo imager($galleryRow['image'], 175, 120, "fix"); ?>" border="0" 
                        alt="<?= $galleryRow['shortcontents']; ?>"  title="<?= $galleryRow['shortcontents']; ?>" style=" margin-top:8px; margin-bottom:8px;border-color:#333; 	
                        " />
                        
        </a> 
        
      </div>
      
      
      <?php if($i%$displayPerRow ==0){ ?>
      <!--<div style="clear:both;"></div>-->
      <?php } ?>
    </div>
  </div>
  <?php }?>
  <div style=" clear:both;"></div>
</div>
<?php
			if($count > $limit)
			echo $pagelist;
	?>
<div style="clear:both;"></div>
