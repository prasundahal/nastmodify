<?php
$i=0;
function createMenu($parentId, $groupType)
{
	global $groups;
	global $conn;
	

	if ($parentId == 0)
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	else
		$groupResult = $groups->getByParentId($parentId);
	
	if ($conn->numRows($groupResult) > 0){
		if($GLOBALS['i']=='0')
			echo '<ul>';
		else
			echo '<ul>';
	}

	while($groupRow = $conn->fetchArray($groupResult))
	{	
		$GLOBALS['i']++;
		if($groupRow['id']!=307)
		{
		echo '<li  class="selected">';
		?>
    		<a target="_parent" href="<?=$groupRow['urlname'];?>"><span><?=$groupRow['name'];?></span></a>
		<?
		if($groupRow['linkType'] == "Normal Group")
		{
			createMenu($groupRow['id'], $groupType);
		}
		echo "</li>\n";
		}
	}
	if ($conn->numRows($groupResult) > 0)
		echo '</ul>';
}
?>




<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>