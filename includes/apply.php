<script language="javascript">
function validateform(fm){
	if(fm.name.value == ""){
		alert("Please type your Name.");
		fm.name.focus();
		return false;
	}	
	var goodEmail = fm.email.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);		
	if(fm.email.value == ""){
		alert("Please type your E-mail.");
		fm.email.focus();
		return false;
	}
	if (!goodEmail) {
		alert("The Email address you entered is invalid please try again!")
		fm.email.focus()
		return (false);
	}			
	if(fm.address.value == ""){
		alert("Please type your Address.");
		fm.address.focus();
		return false;
	}
	if(fm.security_code.value == ""){
		alert("Please enter security code.");
		fm.security_code.focus();
		return false;
	}
	else if(fm.security_code.value.length < 6)
	{
		alert("Please enter valid length security code.");
		fm.security_code.focus();
		return false;
	}
}
</script>

<h1 class="entry-title">Apply Online</h1>
<div style="clear:both"></div>
<br/>
<?php
		if (isset($_POST['apply']))
		{			
           if($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code']))
			{
			
			extract($_POST);
	
			$msg='Full Name='.$fullname.'<br/>
			Date Of Birth ( Day/Month/Year)='.$dob.'<br/>
			Gender='.$txtemail.'<br/>Country='.$gender.'<br/>
			
			Ward No.='.$txtemail.'<br/>Country='.$wardno.'<br/>
			VDC/ Municipality='.$txtemail.'<br/>Country='.$vdc.'<br/>
			District='.$txtemail.'<br/>Country='.$district.'<br/>
			Telephone='.$txtemail.'<br/>Country='.$telephone.'<br/>
			
			Mobile='.$txtemail.'<br/>Country='.$mobile.'<br/>
			Email='.$txtemail.'<br/>Country='.$email.'<br/>
			How did you know about us?='.$RadioGroup3.'<br/>
			
			Message='.$message;
			
			$headers  = "";
			$headers .= "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			$headers .= "X-Priority: 1\r\n";
			
			$arrTo = array($email);
			$subject = "Online Application Details :";
			//die($msg);
			$mail = mail($arrTo[0], $subject, $msg, $headers);	
	
	if($mail)
	{
		$err = "You Applicatoin submitted successfully. We will contact you as soon as possible. Thank you.";
		
	}
	else
	{ 
		$err = "Error sending email.";
	
}		
			}else{
				$err = "Please enter correct captch code.";	
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

  <form id="onlineForm1" name="form1" method="post" action="">

  <h3>Student Details</h3>
  
  Full Name:
  <input required type="text" name="fullname" id="fullname" style="width:70%;"/>
  <br />
  Date Of Birth ( Day/Month/Year):&nbsp;&nbsp;
  <input required type="text" name="dob" id="dob" size="20" />
  Gender:
  <input required type="radio" name="gender" value="Male" id="gender_0" /> Male
  <input type="radio" name="gender" value="Female" id="gender_1" /> Female
  
  
  <h3>Permanent Address</h3>
 
   Ward No.: <input type="text" name="wardno" id="wardno" style="width:50px;" />&nbsp;
   VDC/ Municipality: <input required type="text" name="vdc" id="vdc" />&nbsp;
   District: <input required type="text" name="district" id="district" />
   <br />
   Telephone: <input type="text" name="telephone" id="telephone" />
   Mobile: <input required type="text" name="mobile" id="mobile" />
   Email: <input required type="email" name="email" id="email" />


	<br />

    
    <h3>Message (If Any):</h3>
    <textarea name="message" id="message" style="width: 82%;height: 30%;"></textarea>

  
  
  
  <h3>How did you know about us?</h3>
  
  <label><input required type="radio" name="RadioGroup3" value="Recomended by friends/previous students/parents/relatives etc." id="RadioGroup3_1">Recomended by friends/previous students/parents/relatives etc.</label>
  
  <table>
  	<tr>
    	<td width="30%"><label><input type="radio" name="RadioGroup3" value="School" id="RadioGroup3_2">School</label></td>
        <td width="30%"><label><input type="radio" name="RadioGroup3" value="Teacher" id="RadioGroup3_3">Teacher</label></td>
        <td width="30%"><label><input type="radio" name="RadioGroup3" value="Newspaper Ads" id="RadioGroup3_4">Newspaper Ads</label></td>
    </tr>
    <tr>
    	<td width="30%"><label><input type="radio" name="RadioGroup3" value="TV/Radio" id="RadioGroup3_5">TV/Radio</label></td>
        <td width="30%"><label><input type="radio" name="RadioGroup3" value="Internet" id="RadioGroup3_6">Internet</label></td>
        <td width="30%"><label><input type="radio" name="RadioGroup3" value="Others" id="RadioGroup3_7">Others</label></td>
    </tr>
  </table>
  
  <table>
        <tr>
        <th align="left">Security Code : <span class="cmsAstriks">*</span></th>
        <td>
        <img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" style="margin-bottom:10px;" />&nbsp; 
        <a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;" class="captchaReload" style="position:relative; color:red;">[ Reload Image ]</a>
        </td>
        </tr>
        <tr>
        <th>&nbsp;</th>
        <td><input id="security_code" required="required" name="security_code" type="text" maxlength="6" class="securitycode cmsTxtField" /></td>
        </tr>
  </table>
  
  
  <br /><br />
  
  <label><input required type="checkbox" name="accept" id="accept" />The above form I have filled are true.</label>
  
  <br />
  
  <input type="submit" name="apply" id="apply" value="Submit" />
  
  &nbsp;&nbsp;
  
  <input type="reset" name="reset" id="reset" value="Reset" />
  
  
</form>
  
  
</div>
</div>

<!-- #comments -->

</div>
<!-- #content -->
</div>
<!-- #primary -->