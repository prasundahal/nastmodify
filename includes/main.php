 
  <!-- ####################################################################################################### -->
  
  <div class="recentwork">
              		<div class="recent_works_left">
                  <h2>Our Projects</h2>
		</div>
		<div class="recent_works_arrows">
			<a href="#" class="prev_item"></a><a href="#" class="next_item"></a>
		</div>
		
		<div class="clear"></div>
		<div class="line"></div>
		<div class="clear padding20"></div>
					

			<div class="recent_works">
				<ul id="work">
                <?php
                     $comp=$groups->getByParentIdWithLimit(22, 20); 
                     $i=0;
                     while($compGet=$conn->fetchArray($comp))
                     {
                        $i++;
                ?>
					<!-- START PORTFOLIO COLUMN #1 -->
					<li id="id-1" class="app">
						<span class="recent_image">
							<center><a href="#" data-rel="prettyPhoto" class="img-thumb">
                            <img class="portfolio_image" src="<?= CMS_GROUPS_DIR . $compGet['image'] ?>" alt="" /></a></center>
						</span>
						<span class="title"><a href="<?=$compGet['urlname'] ?>"><?=$compGet['name']; ?></a></span>
						
						<span class="clear padding15"></span>
					</li>
                    <? } ?>
					
				</ul>
			</div>
    </div>

  <!-- ####################################################################################################### -->

<?php /*?><div id="footer">
      <div class="footbox">
      <?php
	$contact=$groups->getById(32);
	$contactGet=$conn->fetchArray($contact);
	?> 
        <h2>Contact us</h2>
        <ul>
          <li><a><?=$contactGet['shortcontents'];?></a></li>
        </ul>
      </div>
      <div class="footbox">
        <h2>Our Projects</h2>
        <ul>
        <?php
        $compn=$groups->getByParentIdWithLimit(22, 20); 
        $i=0;
        while($compnGet=$conn->fetchArray($compn))
        {
        $i++;
       ?>

          <li style="border-bottom:1px solid #ccc"><a><?=$compnGet['name']; ?></a></li>
         
      <? } ?>
        </ul>
      </div>
      <div class="footbox">
    <?php
	$contact=$groups->getById(5);
	$contactGet=$conn->fetchArray($contact);
	?> 
        <h2>Contact us</h2>
        <ul>
          <li><a><?=$contactGet['shortcontents'];?></a></li>
        </ul>
      </div>
      <div class="footbox last">
        <h2>News & Events</h2>
        <?php
        $nae=$groups->getByParentIdWithLimit(33, 20); 
        $i=0;
        while($naeGet=$conn->fetchArray($nae))
        {
        $i++;
       ?>

        <ul>
          <li style="border-bottom:1px solid #ccc"><a href="<?=$naeGet['urlname']; ?>"><?=$naeGet['name']; ?></a></li>
       <? } ?>
        </ul>
      </div>
      <br class="clear" />
    </div><?php */?>
  