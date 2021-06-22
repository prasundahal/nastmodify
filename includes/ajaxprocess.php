<?php
session_start();

mysql_connect("localhost", "root", "");
mysql_select_db("delight");

require_once("../data/dbCls.php");
$mydb					=new mydb();
//require_once("../classes/call.php");

//$session_user_id = $mydb->ckeckLogin();

if (isset($_GET['for']) && $_GET['for'] == "polling") {
	echo "<h4 style=\"text-decoration: none;\">Thanks for your vote!!</h4>";
	//insert ip and option into tbl_vote_count
	$option = $_POST['option_value'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$poll_id = $_POST['poll_id'];

	$mydb->insert_sql("tbl_vote_count",	array("id", "q_id", "options", "ip"), array("", $poll_id, $option, $ip));
	
	
	//Retrive all the votes and divide them according to options in %
	$result = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id'");
	$totalVotes = $mydb->count_row($result);
	
	$result = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id' and options = 'option1'");
	$Option1 = $mydb->count_row($result);
	
	$result1 = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id' and options = 'option2'");
	$Option2 = $mydb->count_row($result1);
	
	$result2 = $mydb->select_sql(array("*"), "tbl_vote_count", " q_id = '$poll_id' and options = 'option3'");
	$Option3 = $mydb->count_row($result2);
	
	
	
	?>
    <table class="form-right">
        	<tr class="polloption" ><td><?php echo $mydb->OutString($mydb->select_field("option1", "tbl_polling", "id = '$poll_id'")); ?></td><td>:</td><td><?php echo $mydb->NumberDisplayTotwodigit((($Option1/$totalVotes)*100))." %"; ?></td></tr>
            <tr class="polloption" ><td><?php echo $mydb->OutString($mydb->select_field("option2", "tbl_polling", "id = '$poll_id'")); ?></td><td>:</td><td><?php echo $mydb->NumberDisplayTotwodigit((($Option2/$totalVotes)*100))." %"; ?></td></tr>
            <tr class="polloption" ><td><?php echo $mydb->OutString($mydb->select_field("option3", "tbl_polling", "id = '$poll_id'")); ?></td><td>:</td><td><?php echo $mydb->NumberDisplayTotwodigit((($Option3/$totalVotes)*100))." %"; ?></td></tr>
            
        </table>
    <?php
}
?>