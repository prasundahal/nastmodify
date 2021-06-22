<style>
.table{
	width:100%;
	
	}
	 tr{
		  border:1px solid #666;}
</style>
<div id="contentsPage" style="min-height:200px;">
<h1 style="margin-bottom:0px;">Search Details</h1>
<table border="0px">
<?php 
 $fungus=$_POST['name'];
		
		$sql="select * from fung  where fungus like '$fungus%'";
		$result=mysql_query($sql);
		
		if($count=mysql_num_rows($result))
		{
while($data=mysql_fetch_assoc($result))
{
	?>
    <tr>
   		
		<td><a href="detailsearch/<?php echo $data['id'];?>"><?php echo $data['fungus'];?></a>  </td>
        </tr>
        
        
   
	<?php 
}?>  </table><?php
		}
		else{
			echo  "Result Not Found";
			}
?>
</div>