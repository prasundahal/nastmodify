<style>
.innershow h3{
	font-size: 1.2em;
color: #FFF;
padding: 10px;
background: #B81D22;
text-transform: uppercase;
font-family: 'ambleregular';
}
</style>

<div class="innershow">


  <?php $catId=$_GET['catId'];
 $pid=$groups->getById($catId);
			  $pidGet=$conn->fetchArray($pid);
			  echo "<h3>".$pidGet['name']."</h3>";?>
			 
              
       <?php 
			
			  	$product=$groups->getByParentId($catId);
          	while($productGet=$conn->fetchArray($product))
           	{?>
           		<div style="padding:5px; padding-left:20px; margin-bottom:20px; height:210px; width:210px; float:left;">
                  	<a href="<?=$productGet['urlname'];?>" style=" color:#8A8A79; font-size:15px; font-weight:bold;">
                     	<?=$productGet['name'];?>
                   	</a>
                  	<p><?php /*?><?=substr($productGet['shortcontents'],0,270);?><?php */?>
                    <img height="210" width="210" style="padding-right:10px; float:left;" src="<?=CMS_GROUPS_DIR.$productGet['image'];?>"/>
                    	<a style=" color:red;float:left; font-size:15px;margin-left:140px;" href="<?=$productGet['urlname'];?>">
                        	More...
                     	</a>
                  	</p>
              	</div>
          	<?php } ?>
			
            </div>