<style>
.table{
	width:100%;
	
	}
	 tr{
		  border:1px solid #666;}
</style>
<div id="contentsPage" style="min-height:200px;">
<h1 style="margin-bottom:0px;">Search Details</h1>

<?php 
 $fungus=$_GET['alp'];
		
		$sql="select * from fung  where fungus like '$fungus%'";
		$result=mysql_query($sql);
		
		if($count=mysql_num_rows($result))
		{
			?> <table border="0px">
    <tr>
   		<td><b>Fungus </b></td></br></br>
		
        </tr>
       <?php
while($data=mysql_fetch_assoc($result))
{
	?> 
    <tr>
   		
		<td><a href="detailsearch/<?php echo $data['id'];?>"><?php echo $data['fungus'];?></a> </td>
        </tr>
       <?php /*?> <tr>
        <td><b>Basonym </b></td>
		<td><?php echo $data['basonym'];?> </td>
        </tr>
         <tr>
        <td><b>Aubstrate Locality Author</b> </td>
		<td><?php echo $data['aubstrate_locality_author'];?> </td>
        </tr>
         <tr>
        <td><b>Classification</b></td>
		<td><?php echo $data['classification'];?> </td>
        </tr>
        <tr>
        <td><b>Distribution</b></td>
		<td><?php echo $data['distribution'];?> </td>
        </tr>
        <tr>
        <td><b>Edibility</b></td>
		<td><?php echo $data['edibility'];?> </td>
        </tr>
         <tr>
        <td><b>Local Names</b></td>
		<td><?php echo $data['local_names'];?> </td>
        </tr>
       
      <tr>
        <td><b>References</b></td>
		<td><?php echo $data['references'];?> </td>
        </tr>
       <tr>
        <td><b>Other Database</b></td>
		<td><?php echo $data['other_database'];?> </td>
        </tr>
         <tr>
        <td><b>Image</b></td>
		<td> <img src="fung_img/<?php echo $data['f_image'];?>" width="70" height="70" /> </td>
        </tr><?php */?>
    
        
    
	<?php 
}
?>
    
        
    </table>
	<?php 
		}
		else{
			echo  "Result Not Found";
			}
?>
</div>