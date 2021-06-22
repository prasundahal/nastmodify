
<footer>
    
    <!-- ####################################################################################################### -->
    <div id="copyright">
      <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">Nast</a></p>
      <p class="fl_right">Template by <a href="http://www.okbiz.co.uk/" title="sandip chhetri">OK Nepal Inc</a></p>
      <br class="clear" />
    </div>
    <!-- ####################################################################################################### -->
  </footer>
<?php /*?><div id="footer">
		<div class="latestgallery">
        <h2 class="one">Gallery Views</h2>
        <?php
		 $gallview=$groups->getByParentIdWithLimit(5, 6); 
		 while($gallviewGet=$conn->fetchArray($gallview))
		 {
		 ?>
			
			<ul>
				<li><a rel="lightbox-gallery" href="<?= CMS_GROUPS_DIR . $gallviewGet['image'] ?>" title="Image 1"><img src="<?=CMS_GROUPS_DIR.$gallviewGet['image'];?>" alt="" /></a></li>
				<? } ?>
			</ul>
			<br class="clear" />
		</div>
		<div class="testimonial">
			<h2 class="two">What others say</h2>
			<ul id="ticker_02" class="ticker">
						 <?php
                     $testi=$groups->getByParentIdWithLimit(21, 20); 
                     $i=0;
                     while($testiGet=$conn->fetchArray($testi))
                     {
                        $i++;
                    ?>
                        <li <?php if($i==2)echo 'class="stripped"'; ?>>
                        <img src="<?=CMS_GROUPS_DIR.$testiGet['image'];?>" class=" fl_left" style="height:81px; width:81px; margin-right:5px;" />
							<div class="testimonial_thumb" >
									<p><a href="<?=$testiGet['urlname'];?>"> <?=$testiGet['name'];?>: -</a> <?=substr($testiGet['shortcontents'], 0, 90).'...';?></p>
								</div>
						</li>
						<? } ?>
                        
						
                        </ul>
			<script>
	function tick2(){
		$('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });
	}
	setInterval(function(){ tick2 () }, 3500);
</script>
            
		</div>
		<div class="footbox last">
			<h2 class="last">Keep In Touch</h2>
            <? 
			$kit=$groups->getById(9);
			$kitGet=$conn->fetchArray($kit);
		    ?>
			
			<address>
			<em>Beaumont International Education Pvt. Ltd.</em>
			<hr />
			<i><?=$kitGet['contents']?></i>
			</address>
		</div>
		<br class="clear" />
	</div><?php */?>