<div class="content_inner" style="width:100%; text-align:justify;">
		        
 <?php
//mysql_connect('localhost','root','');
//mysql_select_db('nast');
if(isset($_POST[submit]))
{
	$username=$_POST[username];
	$check="select * from register where  username='$username'";
	$result=mysql_query($check);
	$total=mysql_num_rows($result);
	if($total==0)
	{
		$sql="insert into register values('$_POST[fullname]','$_POST[username]','$_POST[password]','$_POST[username]','$_POST[email]','$_POST[phone]',
		'$_POST[address]','$_POST[comments]')";
		mysql_query($sql);
		echo "<script>alert('Information Insert Successfully');</script>";
	}
	else
	{
		echo"<script>alert('$username Username already exist');</script>";
	echo"<script>window.location='register?fullname=$_POST[fullname]&username=$_POST[username]&password=$_POST[password]&email=$_POST[email]&phone=$_POST[phone]&address=$_POST[address]&comments=$_POST[comments]';</script>";
	}
}
?>      
<style>
input[type="text"] {
  padding: 5px;
  border: solid 1px #dcdcdc;
 
  transition: box-shadow 0.3s, border 0.3s;
}
input[type="password"] {
  padding: 5px;
  border: solid 1px #dcdcdc;
  transition: box-shadow 0.3s, border 0.3s;
}
input[type="email"] {
  padding: 5px;
  border: solid 1px #dcdcdc;
  transition: box-shadow 0.3s, border 0.3s;
}

input[type="textarea"] {
  padding: 5px;
  border: solid 1px #dcdcdc;
  transition: box-shadow 0.3s, border 0.3s;
}


</style>        		
<form  method="post">
<table><tr><td><h1>Register Page</h1></td></tr>
<tr><td>Full Name</td>
<td><input type="text" name="fullname" required="required" value=""  /></td>
</tr>
<tr><td>User Name</td>
<td><input type="text" name="username" value="" required="required"  /></td>
</tr>
<tr><td>Password</td>
<td><input type="password" name="password" value="" required="required"  /></td>
</tr>
<tr><td>E-mail</td>
<td><input type="email" name="email" value=""  required="required"  /></td>
</tr>
<tr><td>Phone</td>
<td><input type="text" name="phone" value="" required="required"  /></td>
</tr>
<tr><td>Address</td>
<td><input type="text" name="address" value="" required="required"   /></td>
</tr>
<tr><td>Comments</td>
<td><textarea name="comments" required ></textarea></td>
</tr>

<tr><td></td>
<td><input type="submit" name="submit" value="Submit"> <input type="reset" name="cancel" value="Cancel"></td>
</tr>
</table>
</form>
</div>