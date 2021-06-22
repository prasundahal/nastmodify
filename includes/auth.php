<? session_start();
//mysql_connect('localhost','root','');
//mysql_select_db('nast');
$username=$_POST['username'];
$password=$_POST['password'];
 $sql="select * from register where username = '$username' and password = '$password'";


$result=mysql_query($sql);
$num=mysql_fetch_assoc($result);

if($num)
{
		//echo $num['username'];
	
		?>
<?
		    $_SESSION['username'] = $num['username'];
    $_SESSION['password'] = $num['password'];
	
   // $_SESSION['role'] = $num[3];
	//header("location:list_employee.php");
	 echo"<script>window.location='addfung';</script>";
}
else
{
   
echo"<script>alert('username and password doesnot match'); </script>";
	
  echo"<script>window.location='login';</script>";
}
?>
