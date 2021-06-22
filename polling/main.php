<div class="form">
    <h4><?php 
	echo $mydb->select_field("question", "tbl_polling", "visible = '1'"); 
	$poll_id = $mydb->select_field("id", "tbl_polling", "visible = '1'");
	?></h4>
    <?php 
	$result = $mydb->select_sql(array("*"), "tbl_vote_count", "ip='".$_SERVER['REMOTE_ADDR']."' and q_id = '$poll_id'");
	if ($mydb->count_row($result) > 0) {
		//Retrive all the votes and divide them according to options in %
		$result = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id'");
		$totalVotes = $mydb->count_row($result);
		
		$result = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id' and options = 'option1'");
		$Option1 = $mydb->count_row($result);
		
		$result1 = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id' and options = 'option2'");
		$Option2 = $mydb->count_row($result1);
		
		$result2 = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id' and options = 'option3'");
		$Option3 = $mydb->count_row($result2);
		
		$result3 = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id' and options = 'option4'");
		$Option4 = $mydb->count_row($result3);
		?>
        
        <table class="form-right">
        	<tr class="polloption" ><td><?php echo $mydb->select_field("option1", "tbl_polling", "id = '$poll_id'"); ?></td><td>:</td><td><?php echo $mydb->NumberDisplayTotwodigit((($Option1/$totalVotes)*100))." %"; ?></td></tr>
            <tr class="polloption" ><td><?php echo $mydb->select_field("option2", "tbl_polling", "id = '$poll_id'"); ?></td><td>:</td><td><?php echo $mydb->NumberDisplayTotwodigit((($Option2/$totalVotes)*100))." %"; ?></td></tr>
            <tr class="polloption" ><td><?php echo $mydb->select_field("option3", "tbl_polling", "id = '$poll_id'"); ?></td><td>:</td><td><?php echo $mydb->NumberDisplayTotwodigit((($Option3/$totalVotes)*100))." %"; ?></td></tr>
            <tr class="polloption" ><td><?php echo $mydb->select_field("option4", "tbl_polling", "id = '$poll_id'"); ?></td><td>:</td><td><?php echo $mydb->NumberDisplayTotwodigit((($Option4/$totalVotes)*100))." %"; ?></td></tr>
        </table>
        
        <?php
	}else{
	?>
    <div id="poll" >
    <form action="" method="post" name="forms" class="poll-form">
      <ul class="form-right">
        <li style="list-style:none;"><div id="loading0" style="display: none;" class="vote-loading0">Counting your vote ... <img src="<?php echo SITEROOT; ?>images/loading.gif"/></div></li>
        <li class="polloption" >
          <input checked="checked" type="radio" name="polling" value="option1" id="polling_0" /><?php echo $mydb->select_field("option1", "tbl_polling", "id = '$poll_id'"); ?>
        </li>
        <li class="polloption" >
          <input type="radio" name="polling" value="option2" id="polling_0" /><?php echo $mydb->select_field("option2", "tbl_polling", "id = '$poll_id'"); ?>
        </li>
        <li class="polloption" >
          <input type="radio" name="polling" value="option3" id="polling_0" /><?php echo $mydb->select_field("option3", "tbl_polling", "id = '$poll_id'"); ?>
        </li>
        <li class="polloption" >
          <input type="radio" name="polling" value="option4" id="polling_0" /><?php echo $mydb->select_field("option4", "tbl_polling", "id = '$poll_id'"); ?>
        </li>
        <li>&nbsp;</li>
        <li style="list-style:none;">
          <input onclick="VoteNow('includes/ajaxprocess.php?for=polling', 'poll', this.form, '<?php echo $poll_id; ?>'); " type="button" name="submit" class="poll-submit" value="SUBMIT" />
        </li>
      </ul>
   </form>
   </div>
    <?php } ?>
    <p style="padding: 2px 0px 8px 230px;"><a href="<?php echo SITEROOT; ?>polls-0.html">Previous Polling</a></p>
  </div>