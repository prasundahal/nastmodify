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
 $fungus=$_GET['iddd'];
		
		$sql="select * from fung  where id='$fungus'";
		$result=mysql_query($sql);
		
		
$data=mysql_fetch_assoc($result);

	?> <table border="0px">
    <tr>
   		<td><b>Fungus </b></td></br></br>
		<td><?php echo $data['fungus'];?> </td>
        </tr>
        <tr>
        <td><b>Basonym </b></td>
		<td><?php echo $data['basonym'];?> </td>
        </tr>
         <tr>
        <td><b>Substrate Locality Author</b> </td>
		<td><?php echo $data['sla'];?> </td>
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
		<td><?php echo $data['rec'];?> </td>
        </tr>
       <tr>
        <td><b>Other Database</b></td>
		<td><a href="<?php echo $data['other_database'];?>" target="_blank"><?php echo $data['other_database'];?></a> </td>
        </tr>
         <tr>
        <td><b>Image</b></td>
		<td> <img src="fung_img/<?php echo $data['f_image']; ?>" width="70" height="70" /> </td>
        </tr>
    
        
    </table>
	<?php 

?>
</div>