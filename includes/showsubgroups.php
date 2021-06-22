<?php //include("includes/breadcrumb.php"); ?>

<div class="content_inner" style="width:100%; text-align:justify;">
		<?php
        $pagename = "index.php?id=". $pageId ."&";
        include("includes/pagination.php");
		
		?>
        
        <?php $pid=$groups->getById($pageId);
			  $pidGet=$conn->fetchArray($pid);?>
       <?php 
	   if($pageId=="208")
	   {?>		
			<div class="contentHdr">
				<h2 style="padding-top:5px;"><?php echo $pageName; ?></h2>
          	</div>
				 
			<style>.prod:hover{ opacity:0.6;}</style>
           	<?php
             
          	$product=$groups->getByParentId($pageId);
          	while($productGet=$conn->fetchArray($product))
           	{?>
           		<div style="padding:5px; padding-left:20px; margin-bottom:20px;">
                  	<a href="<?=$productGet['urlname'];?>" style=" color:#8A8A79; font-size:15px; font-weight:bold;">
                     	<?=$productGet['name'];?>
                   	</a>
                  	<p><?=substr($productGet['shortcontents'],0,270);?>
                    	<a style=" color:red;float:left; font-size:15px;margin-left:140px;" href="<?=$productGet['urlname'];?>">
                        	See more...
                     	</a>
                  	</p>
              	</div>
          	<?php }
     	}
		else if($pageId=="357")
		{?>
			<div class="contentHdr">
				<h2 style="padding-top:5px;"><?php echo $pageName; ?></h2>
          	</div>
            <? 
			$report=$groups->getByParentId(357);
			while($reportGet=$conn->fetchArray($report))
			{?>
            
            	<table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family: 'Times New Roman';">
    			<tbody>
    
        			<tr>
            			<td bgcolor="#FFFFF2" class="textheading02" style="font-family: 'Trebuchet MS', Arial; font-size: 13pt; 
                        color: rgb(9, 115, 20); font-weight: bold; text-shadow: rgb(255, 255, 255) 0px 1px 0px;"><strong>&gt;&gt; 
							<?=$reportGet['name'];?></strong>
                     	</td>
        			</tr>
        
        			<tr>
            			<td valign="top">
            				<table width="100%" border="0" cellpadding="4" cellspacing="4">
                			<tbody>
                    			<tr valign="bottom">
                        			<td width="268" style="border-bottom-color: rgb(204, 204, 204); border-bottom-style: solid;">
                        				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            			<tbody>
                                        	<? $list=$groups->getByParentId($reportGet['id']);
											while($listGet=$conn->fetchArray($list))
											{?>
                                        
                                			<tr>
                                    			<td width="310" height="40px;" valign="middle" class="text003">
                                                	<p style="margin-left:20px; margin-bottom:10px;">
                                                	<strong class="textheading02" style="font-family:'Trebuchet MS', Arial; font-size: 13pt; 
                                                    color: rgb(9, 115, 20); text-shadow: rgb(255, 255, 255) 0px 1px 0px;">
                                                		<font size="3"><?=$listGet['name'];?></font>
                                                  	</strong>
                                                    </p>
                                             	</td>
                                    
                                    			<td width="195" valign="middle" class="textlink01" style="font-family: Verdana; font-weight: bold
                                                ; font-size: 7.5pt; color: rgb(255, 255, 255);">
                                                	<strong><font color="#006600">&raquo;</font></strong>
                                               		<font color="#006600">
                                                    	&nbsp;Click on an icon to download&nbsp;<strong>&raquo;</strong>
                                                  	</font>
                                             	</td>
                                    
                                    			<td width="41" valign="middle">
                                                	<? 
													$lfResult = $listingFiles->getByListingId($listGet['id']);
													$lfRow = $conn->fetchArray($lfResult);
													?>
                                                	<a href="<?=CMS_LISTING_FILES_DIR . $lfRow['filename'];?>" title="Download PDF 
                                                    format" target="_blank"><img src="images/pdf.gif" 
                                                    width="32" height="34" border="0" alt="" />
                                                	</a>
                                               	</td>
                                           	</tr>
                                            
                                            <? }?>
                            			</tbody>
                        				</table>
                        			</td>
                    			</tr>
                			</tbody>
            			</table>
            		</td>
        		</tr>
    
   		 		</tbody>
				</table>
				<br /><br />
			
			<? }?>
            
            
		<?php }
		else
		{?>
			<div class="contentHdr">
			<h2 style="padding-top:5px;"><?php echo $pageName; ?></h2></div>
			<?php $image=$groups->getById($pageId);
			$imageGet=$conn->fetchArray($image);
			if($imageGet['image']!="")
			{?>
					<img height="210" width="210" style="padding-right:10px; float:left;" src="<?=CMS_GROUPS_DIR.$imageGet['image'];?>" />
			<?php }
			echo Pagination($pageContents, "content");
			?>
            
		<?php }?>

</div>

