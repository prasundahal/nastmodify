<? include('clientobjects.php'); ?>
<?php /*?><?php
 $mydb=mysql_select_db("nast"); 
	  //-query  the database table 
	  $sql="SELECT  ID, FirstName, LastName FROM fung WHERE FirstName LIKE '%" . $name .  "%' OR LastName LIKE '%" . $name ."%'"; 
	  //-run  the query against the mysql query function 
  $result=mysql_query($sql); 
	  //-create  while loop and loop through result set 
	  while($row=mysql_fetch_array($result)){ 
	          $FirstName  =$row['FirstName']; 
	          $LastName=$row['LastName']; 
	          $ID=$row['ID']; 
	  //-display the result of the array 
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n"; 
  echo "</ul>"; 
	  } 
	  
?> 
<?php */?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title><?=PAGE_TITLE ?>
    <?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}?>
</title>
	<? include('baselocation.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/all-in-one-min.js"></script>
<script type="text/javascript" src="js/setup.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">
$(window).load(function(){
	$('#demo-side-bar').removeAttr('style');
});
</script>

 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
        <script type="text/javascript" src="jquery-1.3.2.js"></script>
</head>
<?
session_start();?>

<body id="top">

<div>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

        <div class="header"></div>
        <div class="scroll"></div>
        <ul id="navigation">
            <li class="home" style="padding-top:10px;"><a href="" title="facebook">
            
<div class="fb-page" data-href="https://www.facebook.com/facebook" data-width="200" data-height="250" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div></a></li>
           
        </ul>

      

        <script type="text/javascript">
            $(function() {
                $('#navigation a').stop().animate({'marginLeft':'-170px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-170px'},200);
                    }
                );
            });
        </script>
        </div>





<div class="wrapper">
  <!-- ####################################################################################################### -->
  <div id="header">
  <div style="height: 25px;">
      <div style="float:right; padding:2px; margin:2px;">
	  
	 
      
      </div>
      <div style=" float:right; padding:2px; margin:2px;"> 
      <a href="register" style="  width: 50px;  height: 20px;   padding: 5px;  color: #fff;  background: #3B9E0A;  border-radius: 13px;">Sign Up</a>
	  <? if($_SESSION['username']){ ?>
      
      <a href="logout" ><input style="  width: 60px;  height: 27px;  padding: 5px;  color: #fff;  background: #3B9E0A;
  border-radius: 13px;" type="button"  value="Logout" > </a>
      <? } 
      
      else
	  {
		 ?><a href="login" style="  width: 60px;
  height: 27px;
  padding: 5px;
  color: #fff;
  background: #3B9E0A;
  border-radius: 13px;">Sign In</a><?
		  
		 }
		
		 
      ?>
      </div>
      </div>
  
     <?php
	$logo=$groups->getById(6);
	$logoGet=$conn->fetchArray($logo);
	?> 

    <img src="<?=CMS_GROUPS_DIR.$logoGet['image'];?>" style="margin:0 auto;" >
  </div>
      <!-- search -->
      <!--<div style=" float:right; margin-bottom:2px; font:#ccc;">
    <form  method="post" action="search"  id="searchform"> 
      <input  type="text" name="name" required="required" placeholder="Type Fungus Name"> 
	      <input  type="submit" distribution="submit"  value="GO"> 
    </form> 
    </div>-->

      <!-- ENDS search --> 
      
  <!-- ####################################################################################################### -->
  <div id="topbar">
    <div id="topnav">
         <? if(isset($_GET['pageId'])){ $pageId=$_GET['pageId']; }?>
  		 <? createMenu(0, "Header", $pageId); ?>
           
    </div>
    <br class="clear" />
  </div>
  <!-- ####################################################################################################### -->
  
   <? if(!isset($pageLinkType) and !isset($_GET['action'])){?>
                <? include('includes/slider.php');?>
  <? }?>
            
            
            <div class="clear"></div>
             <? if(!isset($pageLinkType) and !isset($_GET['action'])){?>
            <?php /*?><div id="intro">
  <? 
			$welcomemess=$groups->getById(12);
			$welcomemessGet=$conn->fetchArray($welcomemess);
  ?>
         
    <div class="fl_left"> <a href="<?=$welcomemessGet['urlname']; ?>"><img src="<?=CMS_GROUPS_DIR.$welcomemessGet['image'];?>" alt="" style="height:150px; width:175px;" /></a> </div>
    <div class="fl_right">
      <h2><?=$welcomemessGet['name']; ?></h2>
      <p style="text-align:justify;"><?=substr($welcomemessGet['shortcontents'], 0, 390).'...';?></p>
       <p style="float:right;"><a href="<?=$welcomemessGet['urlname']; ?>">[Read More]</a></p>
    </div>
    <br class="clear" />
  </div><?php */?>
  
  			<div style="width:960px;">
 <div id="intro" style="width:635px; float:left;">
 
  <? 
			$welcomemess=$groups->getById(12);
			$welcomemessGet=$conn->fetchArray($welcomemess);
  ?>
       <h2><?=$welcomemessGet['name']; ?></h2>   
      <p style="text-align:justify; font-size:12px; line-height:22px;">
      <img src="<?=CMS_GROUPS_DIR.$welcomemessGet['image'];?>" alt="" style="height:150px; width:175px; float:left; margin-right:10px;" /> 
        
     
     <?=substr($welcomemessGet['shortcontents'], 0, 490).'...';?></p>
       <p style="float:right;"><a href="<?=$welcomemessGet['urlname']; ?>">[Read More]</a></p>
    
    <br class="clear" />
  </div>
  
  <div class="footbox last" style="width:240px; float:left;">
        <h2 style="margin-left:24px; background: #04615D;
  border-radius: 0 10px 10px 0;
  color: #fff;
  display: inline-block;
  font-size: 18px;
  line-height: 28px;
  margin: 8px 0 0 22px;
  padding: 0 15px;">News & Events</h2>
        <ul>
        <?php
        $nae=$groups->getByParentIdWithLimit(33, 7); 
        $i=0;
        while($naeGet=$conn->fetchArray($nae))
        {
        $i++;
       ?>

        
          <li style="border-bottom:1px solid #ccc; padding-top:10px;"><a href="<?=$naeGet['urlname']; ?>"><?=$naeGet['name']; ?></a></li>
       <? } ?>
       <a href="news-and-events" style="float:right; color:#C00" >[more..]</a>
        </ul>
      </div> 
      
     <div class="clear"></div>
      
      </div>
      
             <? }?>
             <div style="width:993px;">
            <div style=" width:675px; background:#FFFCE2; border:10px solid #70D8CF; margin-top:3px; border-radius:10px; float:left;">
 
 <style type="text/css">
	#tfheader{
		background-color:#c3dfef;
	}
	#tfnewsearch{
		float:right;
		padding:20px;
	}
	.tftextinput{
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
	}
	.tfbutton {
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		border: solid 1px #0076a3; border-right:0px;
		background: #0095cd;
		background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
		background: -moz-linear-gradient(top,  #00adee,  #0078a5);
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
	}
	.tfbutton:hover {
		text-decoration: none;
		background: #007ead;
		background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
		background: -moz-linear-gradient(top,  #0095cc,  #00678e);
	}
	/* Fixes submit button height problem in Firefox */
	.tfbutton::-moz-focus-inner {
	  border: 0;
	}
	.tfclear{
		clear:both;
	}
	.alp a
	{
		padding-left:4px;
		padding-right:4px;
		text-decoration:underline;
	}
</style>
<div style="margin:0 auto; width:598px; padding-top:10px; padding-bottom:10px;">
                <form id="searchform" method="post" action="search" >
		        <input type="text" class="tftextinput" name="name" size="21" maxlength="120" placeholder="Enter Search Term" required="required">
                <input type="submit" value="Search" class="tfbutton">
                <input type="reset" value="Reset" class="tfbutton">
                 <a href="addfung" class="tfbutton">+[Add New Record]</a>
                  <? if($_SESSION['username']){ ?>
      
      <a href="logout"><input type="button"  value="Logout" class="tfbutton"> </a>
      <? } 
      
      else
	  {
		 ?><!--<a href="login">login </a>--><?
		  
		 }
		
		 
      ?>
		</form>
        
        
        </div>
    <div class="alp" style="height:40px; margin:0 auto; width:645px;">
    Search By Alphabet:
        	 <a href="alpsearch/a">A</a>
             <a href="alpsearch/b">B</a>
             <a href="alpsearch/c">C</a>
             <a href="alpsearch/d">D</a>
             <a href="alpsearch/e">E</a>
             <a href="alpsearch/f">F</a> 
             <a href="alpsearch/g">G</a>
             <a href="alpsearch/h">H</a> 
             <a href="alpsearch/i">I</a>
             <a href="alpsearch/j">J</a>
         	 <a href="alpsearch/k">K</a>
             <a href="alpsearch/l">L</a>
             <a href="alpsearch/m">M</a>
             <a href="alpsearch/n">N</a>
             <a href="alpsearch/o">O</a> 
             <a href="alpsearch/p">P</a>
             <a href="alpsearch/q">Q</a> 
             <a href="alpsearch/r">R</a>
             <a href="alpsearch/s">S</a>
             <a href="alpsearch/t">T</a>
             <a href="alpsearch/u">U</a>
             <a href="alpsearch/v">V</a>
             <a href="alpsearch/w">W</a>
             <a href="alpsearch/x">X</a> 
             <a href="alpsearch/y">Y</a>
             <a href="alpsearch/z">Z</a> 
            
        </div>
        <div style="margin:0 auto; text-align:justify; padding:3px;">
        <?php
	$notes=$groups->getById(57);
	$notesGet=$conn->fetchArray($notes);
	?>
    <p><?=$notesGet['shortcontents']; ?> </p>
        
        </div>  
 </div>
            <div style="width:240px;  overflow:hidden">
      <?php
	$contact=$groups->getById(5);
	$contactGet=$conn->fetchArray($contact);
	?> 
        <h2 style="margin-left:24px; background: #04615D;
  border-radius: 0 10px 10px 0;
  color: #fff;
  display: inline-block;
  font-size: 18px;
  line-height: 28px;
  margin: 1px 0 0 22px;
  padding: 0 15px;">Contact us</h2>
        <ul>
          <li style="list-style:none"><a><?=$contactGet['shortcontents'];?></a></li>
        </ul>
      </div>
       <div class="clear"></div>
 	      </div>
  <!-- ####################################################################################################### -->
     <?php 
		if(isset($_GET['action']))
		{
				$action = $_GET['action'];
				$action = str_replace(".","", $action);
				include("includes/".$action.".php");			
		}				
		else if(isset($pageLinkType))
		{
				if ($pageLinkType == "") 
				{
					//nothing to display
				} 
				else 
				{
					include("includes/cmspage.php");
				}
		}
		else 
		{
				include("includes/main.php");
		}
		?>

  <!-- ####################################################################################################### -->
  
  
<span class='st_sharethis_large' displayText='ShareThis'></span>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_netlog_large' displayText='Netlog'></span>
<span class='st_email_large' displayText='Email'></span>
<span class='st_messenger_large' displayText='Messenger'></span>
<span class='st_googleplus_large' displayText='Google +'></span>
<span class='st_whatsapp_large' displayText='WhatsApp'></span>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "4c5c395b-a056-4b12-b1ea-f673d424fba7", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


  
   <!-- ####################################################################################################### -->
 
  
  
  <? include('includes/footer.php'); ?>
  <br class="clear" />
</div>

<link rel="stylesheet" href="lightbox/lightbox.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>
<!--<script src="lightbox/jquery-1.7.2.min.js"></script>
<script src="lightbox/jquery-ui-1.8.18.custom.min.js"></script>-->
<script src="lightbox/jquery.smooth-scroll.min.js"></script>
<script src="lightbox/lightbox.js"></script>

<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2196019-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>