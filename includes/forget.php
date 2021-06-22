<h1 class="entry-title">Forget Password </h1>
<div style="clear:both"></div>
<br/>
<?php
		if (isset($_POST['forget']))
		{	
				
          
			extract($_POST);
			$sql="select * from register where username='$fullname'";
			$result=mysql_query($sql);
			$data=mysql_fetch_array($result);
			 $pass=$data['password'];
			$email=$data['email'];
			
	
			$msg='Username='.$fullname.'<br/>
			Password='.$pass.'<br/> ';
			
			$headers  = "";
			$headers .= "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			$headers .= "X-Priority: 1\r\n";
			
			$arrTo = array($email);
			$subject = "Forget Password :";
			//die($msg);
			$mail = mail($arrTo[0], $subject, $msg, $headers);	
	
	if($mail)
	{
		$err = "Your password has been sent to your mail address. Thank you.";
		
	}
	else
	{ 
		$err = "Error sending email.";
	
}		
			
		}
?>

<div class="wpcf7" id="wpcf7-f243-p53-o1">
  <?php if(!empty($err)){ ?>
  <div style="color:#CC0000;"><?php echo $err; ?></div>
  <br />
  <?php } ?>
  
  <style>
#SendMailForm span{
	font-size:12px;
	font-style:italic;
}
</style>
  <style>
#error123 {
color: rgb(3, 92, 25);
font-size: 13px;
display: block;
background: #E0FFDD;
padding: 8px;
width: 95%;
margin: 0px 0px 10px 0px;
border: 1px solid rgb(156, 248, 178);
}
#error1234{
color: rgb(226, 24, 24);
font-size: 13px;
 display:  block; 
background: #FFDDDD;
padding: 8px;
width: 95%;
margin: 0px 0px 10px 0px;
border: 1px solid rgb(248, 156, 156);	
}
</style>
<table>
  <form id="onlineForm1" name="form1" method="post" action="">

  
  
 <tr> <td>Username:</td><td>
  <input required type="text" name="fullname" id="fullname" style="width:70%;"/></td></tr>
  
  
  <br />
  
  <tr> <td></td><td><input type="submit" name="forget" id="apply" value="Forget Password" /></td></tr>
  
 
  
  
</form>
  </table>
  
</div>
</div>

<!-- #comments -->

</div>
<!-- #content -->
</div>
<!-- #primary -->