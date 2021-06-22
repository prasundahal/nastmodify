<?php
if(isset($_POST['btnFeedback']))
{
	if($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code']))
	{
		extract($_POST);
		
		if(!empty($txtname) && !empty($txtemail) && !empty($txtcomment) && !empty($security_code))
		{
			
			$feedbacks -> save($txtname, $txtaddress, $txtemail, $txtcountry, $txtcomment);
			
			$msg='Name='.$txtname.'<br/>Address='.$txtaddress.'<br/>Email='.$txtemail.'<br/>Country='.$txtcountry.'<br/>Comment='.$txtcomment;
			//include('includes/sendemail.php');
			$headers  = "";
			$headers .= "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			$headers .= "X-Priority: 1\r\n";
			//sendEmail("kh6ganesh@yahoo.com", "Inquiry", $msg, $name);
			
			$arrTo = array("info@nast.gov.np");
			$subject = "Inquiry Details :";
			//die($msg);
			$mail = mail($arrTo[0], $subject, $msg, $headers);
			
			if($mail){
				header("Location: index.php?action=contact-us&msg=Feedback posted successfully. Thanks!");
			}else{
				header("Location: index.php?action=contact-us&msg=Error while sending mail. Please try again later!");	
			}
	
		}	
		else
			$feedbackmsg = "Please enter all required fields";
	}
	else
			$feedbackmsg = "Please enter correct security code";
			
}


?>