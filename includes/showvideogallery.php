<link rel="stylesheet" href="css/jqvideobox.css" type="text/css" />
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/jqvideobox.js"></script>
<?php include("includes/breadcrumb.php"); ?>

<h3><?php echo $pageName; ?></h3>
<?php
$i = 0;
$pagename = $pageUrlName."/";
$sql = "SELECT * FROM groups WHERE parentId = '$pageId' ORDER BY id DESC";

$newsql = $sql;

$limit = PAGING_LIMIT;

include("includes/pagination.php");
$return = Pagination($sql, "");


$arr = explode(" -- ", $return);

$start = $arr[0];
$pagelist = $arr[1];
$count = $arr[2];

$newsql .= " LIMIT $start, $limit";

$result = mysql_query($newsql);

while($row = $conn -> fetchArray($result))
{
	$i++;
	?>
	<object <?php if($i>4){?> style="margin-top:5px;"<?php }?> width="168" height="130" data="<?=$row['contents']?>" type="application/x-shockwave-flash">
              			<param name="src" value="<?=$videoGet['contents']?>" />
            		</object>  
	<?php
	if($i%4 == 0)
		echo '<div class="CB"></div>';
}
?>
<br clear="all">
<?php
if($count > $limit)
	echo $pagelist;
?>
<script> 
jQuery(document).ready(function(){
	jQuery(".vidbox").jqvideobox();
});
</script>