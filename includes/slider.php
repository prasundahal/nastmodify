
<div class="flexslider" >
        <ul class="slides">
         <?php
	 $slide=$groups->getByParentId(7); 
	 $i=0;
	 
	 while($slideGet=$conn->fetchArray($slide))
	 {
		 $i++;
	 ?>
          <li> <img src="<?=CMS_GROUPS_DIR.$slideGet['image'];?>" alt="" />
            <p class="flex-caption"><?=$slideGet['shortcontents']?>!</p>
          </li>
        <? } ?>
        </ul>
      </div>


