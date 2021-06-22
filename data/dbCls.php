<?php
class mydb{

	function opendb(){
		mysql_connect(DBSERVER,DBUSER,DBPASSW);
		mysql_select_db(DBNAME);
	}
	
	function query($sql)
	{
		$result = mysql_query($sql);
		if($result)
		{
			return $result;
		}
		else
		{
			echo mysql_error();
		}
	}

	function fetch_array($result)
	{
		return mysql_fetch_array($result);
	}
	
	function count_row($result)
	{
		return mysql_num_rows($result);
	}
	
	function insert_id()
	{
		return mysql_insert_id();
	}
	
	function redirect($url)
	{
		echo "<script language='javascript'>document.location='".$url."';</script>";
	}
	
	
	function select_sql($field_names="*", $table_name, $where_clause="" , $limit_clause="", $getsql=""){		
		$i=0;
		$field_part = "";
		//$sql = "";
		foreach($field_names as $field_name){
			if($field_name=="*"){
				$field_part .=$field_name.", ";
			}else{
				$field_part .="'".$field_name."', ";
			}
			
			$i++;
		}
		$field_part=substr($field_part,0,strlen($field_part)-2);
		
		if($where_clause == "" && $limit_clause == "")
		{
			$sql = "SELECT ".$field_part." FROM ".$table_name;
		}
		if($where_clause == "" && $limit_clause != "")
		{
			$sql = "SELECT ".$field_part." FROM ".$table_name." LIMIT ".$limit_clause;
		}
		
		if($where_clause != "" && $limit_clause == "")
		{
			$sql="SELECT ".$field_part." FROM ".$table_name." WHERE ".$where_clause;
		}
		if($where_clause != "" && $limit_clause != "")
		{
			$sql="SELECT ".$field_part." FROM ".$table_name." WHERE ".$where_clause." LIMIT ".$limit_clause;
		}
		//echo $sql;
		if($getsql == "")
			return mysql_query($sql); 
		else
			return $sql; 
	}
	
	function select_field($field_names, $table_name, $where_clause=""){		
		
		if($where_clause==""){
			$sql="SELECT ".$field_names." FROM ".$table_name.";";
		}else{
			$sql="SELECT ".$field_names." FROM ".$table_name." WHERE ".$where_clause.";";
		}
		//echo $sql;
		$rs=mysql_query($sql); 
		$row=mysql_fetch_array($rs);
		return($row[$field_names]);
	}
	
		
	function update_sql($table_name, $field_names, $field_values, $which_record){
		$i=0;
		$set_part='';
		
		foreach($field_names as $field_name){
			$set_part .=$field_name."='".$field_values[$i]."', ";
			$i++;
		}
		$set_part=substr($set_part,0,strlen($set_part)-2);
		$sql="UPDATE ".$table_name." SET ".$set_part." WHERE ".$which_record.";";
		return mysql_query($sql);
	}
	
	function insert_sql($table_name, $field_names, $field_values){
		$i=0;
		$field_part='';
		$val_part='';
		foreach($field_names as $field_name){
			$field_part .=$field_name.", ";
			$val_part   .="'".$field_values[$i]."', ";
			$i++;
		}
		$field_part=substr($field_part,0,strlen($field_part)-2);
		$val_part=substr($val_part,0,strlen($val_part)-2);
		$sql="INSERT INTO ".$table_name." (".$field_part.") VALUES (".$val_part.");";
		
		return mysql_query($sql);
	}
	
	function delete_sql($table_name, $which_record=""){
		if($which_record==""){
			$sql="DELETE FROM ".$table_name.";";
		}else{
			$sql="DELETE FROM ".$table_name." WHERE ".$which_record.";";
		}
		return mysql_query($sql);
	}
	
	//Get status	
	function GetStatus($id)
	{
		if($id == 1)
		return("Publish");
		else
		return("Unpublish");
	}
	
	function changeStatus($table,$field,$id,$st)
	{
		
		if($st == 0)
			$status = 1;
		else
			$status = 0;
			
		$sql="update $table set
										$field = '$status'
										where id = '$id'
										 ";
		$result=$this->query($sql);
		return($result);
	}
	
	function getminfromtable($table,$field,$condition)
	{
		if($condition == '')
			$sql="select min($field) as minsort from $table";
		else
			$sql="select min($field) as minsort from $table where $condition";
		$result= $this->query($sql);
		$row= $this->fetch_array($result);
		return($row['minsort']);
	}
	function getmaxfromtable($table,$field,$condition)
	{
		if($condition == '')
			$sql="select max($field) as maxsort from $table";
		else
			$sql="select max($field) as maxsort from $table where $condition";
		$result= $this->query($sql);
		$row= $this->fetch_array($result);
		return($row['maxsort']);
	}
	function getnextid($table,$field,$limit,$condition)
	{
		
		$lt=$limit;
		$var2 = 0;
		if($condition == '')
			$sql="SELECT * FROM $table ORDER BY $field LIMIT 0,$lt";
		else
			$sql="SELECT * FROM $table where $condition ORDER BY $field LIMIT 0,$lt";
		//echo $sql;exit;
		$result=$this->query($sql);
		$cnt=0;
		while($row = $this->fetch_array($result))
		{
			$cnt++;
			$var1	= $row[$field];
			if($var1>$var2)
			{
				$var2 = $var1;	
			}
			
		}
		//echo $var2;exit;
			return($var2);
		
	}
	function getpreviousid($table,$field,$limit,$condition)
	{
		
		$lt=$limit-2;
		$var2 = 0;
		if($condition == '')
			$sql="SELECT * FROM $table ORDER BY $field LIMIT 0,$lt";
		else
			$sql="SELECT * FROM $table where $condition ORDER BY $field LIMIT 0,$lt";
		
		$result=$this->query($sql);
		
		while($row = $this->fetch_array($result))
		{
			
			$var1	= $row[$field];
			if($var1>$var2)
			{
				$var2 = $var1;	
			}
			
			
		}
			
		while($row = $this->fetch_array($result))
		{	
			
			$var3	= $row[$field];
			if($var2 < $var3)
			{
				$var2 = $var3;	
			}
			
		}
		return($var2);
		
	}
	function swapingproductsortby($table,$field,$pid,$sortby,$nextpid,$nextsortby)
	{
		
		$sql="update $table set $field = '$nextsortby' where id = '$pid'";
		$result= $this->query($sql);
		
		$sql="update $table set $field = '$sortby' where id = '$nextpid'";
		$result= $this->query($sql);
		
		
	}
	
	
	function getSortby($table,$id,$sortby)
	{
		$sql="select $sortby from $table where id = '$id'";
		$result= $this->query($sql);
		$row= $this->fetch_array($result);
		return($row[$sortby]);
	}
	
	function logout($what,$flag)
	{
		for($i=0;$i<count($what);$i++)
		{
			unset($_SESSION[$what[$i]]);
		}
		
		if($flag == 1)
			session_destroy();
			
		return(true);
	}
	// Display Description 	
	function displaydescription($des,$number)
	{
		$string = strip_tags($des);
		$count=strlen($string);
		$count1=$count -1;
		if($number < $count)
		{
			$str=substr($string,0,$number);//."...".substr($string,$count1,$count);
		}
		else
		{
			$str=$string;
		}
		return($str);

	}
	//Display Number in two digits	
	function NumberDisplayTotwodigit($number)
	{
		return number_format($number, 2, '.', '');
	}
	function doone($onestr) 
	{
		$tsingle = array("","one ","two ","three ","four ","five ",
		"six ","seven ","eight ","nine ");
	
		return $tsingle[$onestr] . $answer;
	}	
	
	function dotwo($twostr) 
	{
		$tdouble = array("","ten ","twenty ","thirty ","fourty ","fifty ",
		"sixty ","seventy ","eighty ","ninety ");
		$teen = array("ten ","eleven ","twelve ","thirteen ","fourteen ","fifteen ",
		"sixteen ","seventeen ","eighteen ","nineteen ");
	
		if ( substr($twostr,1,1) == '0') {
		$ret = doone(substr($twostr,0,1));
		}
		else if (substr($twostr,1,1) == '1') {
		$ret = $teen[substr($twostr,0,1)];
		}
		else {
		$ret = $tdouble[substr($twostr,1,1)] . doone(substr($twostr,0,1));
		}
		return $ret;
	}

// Number to text
	function numtotext($num) 
	{
		$tdiv = array("cents ","dollars and ","hundred ","thousand ", "hundred ", 
		"million ", "hundred ","billion ");
		$divs = array( 0,0,0,0,0,0,0);
		$pos = 0; // index into tdiv;
		//make num a string, and reverse it, because we run through it backwards
		$num=strval(strrev(number_format($num,2,'.',''))); 
		$answer = ""; // build it up from here
		while (strlen($num)) {
		if ( strlen($num) == 1 || ($pos >2 && $pos % 2 == 1))  {
		$answer = doone(substr($num,0,1)) . $answer;
			$num= substr($num,1);
		}
		else {
		$answer = dotwo(substr($num,0,2)) . $answer;
		$num= substr($num,2);
		if ($pos < 2)
			$pos++;
		}
		if (substr($num,0,1) == '.') {
		if (! strlen($answer))
			$answer = "zero ";
		$answer = "dollars and " . $answer . "cents";
		$num= substr($num,1);
		// put in "zero" dollars if there are none
		if (strlen($num) == 1 && $num == '0') {
			$answer = "zero " . $answer;
			$num= substr($num,1);
		}
		}
		// add separator
		if ($pos >= 2 && strlen($num)) {
		if (substr($num,0,1) != 0  || (strlen($num) >1 && substr($num,1,1) != 0
			&& $pos %2 == 1)  ) {
			// check for missed millions and thousands when doing hundreds
			if ( $pos == 4 || $pos == 6 ) {
				if ($divs[$pos -1] == 0)
					$answer = $tdiv[$pos -1 ] . $answer;
			}
			// standard
			$divs[$pos] = 1;
			$answer = $tdiv[$pos++] . $answer;
		}
		else {
			$pos++;
		}
		}
		}
		return $answer;
	}
	
	function dateDiff($dformat, $endDate, $beginDate)
	{
	$date_parts1=explode($dformat, $beginDate);
	$date_parts2=explode($dformat, $endDate);
	$start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
	$end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
	return $end_date - $start_date;
	}
	
	
	function CleanString($str)
	{
		$st = htmlentities(mysql_escape_string(trim($str)));
		return $st;
	}
	function OutString($str)
	{
		$st = html_entity_decode(stripslashes($str));
		return $st;
	}
	
	//ENCRYPTION/DECRYPTION
    function get_rnd_iv($iv_len){
	   $iv = '';
	   while ($iv_len-- > 0) {
		   $iv .= chr(mt_rand() & 0xff);
	   }
	   return $iv;
    }
	
	//ENCRYPTION
    function md5_encrypt($plain_text, $password, $iv_len = 16){
	   $plain_text .= "\x13";
	   $n = strlen($plain_text);
	   if ($n % 16) $plain_text .= str_repeat("\0", 16 - ($n % 16));
	   $i = 0;
	   $enc_text = $this->get_rnd_iv($iv_len);
	   $iv = substr($password ^ $enc_text, 0, 512);
	   while ($i < $n) {
		   $block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
		   $enc_text .= $block;
		   $iv = substr($block . $iv, 0, 512) ^ $password;
		   $i += 16;
	   }
	   return base64_encode($enc_text);
   }
   //DECRYPTION
   function md5_decrypt($enc_text, $password, $iv_len = 16)
   {
	   $enc_text = base64_decode($enc_text);
	   $n = strlen($enc_text);
	   $i = $iv_len;
	   $plain_text = '';
	   $iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
	   while ($i < $n) {
		   $block = substr($enc_text, $i, 16);
		   $plain_text .= $block ^ pack('H*', md5($iv));
		   $iv = substr($block . $iv, 0, 512) ^ $password;
		   $i += 16;
	   }
	   return preg_replace('/\\x13\\x00*$/', '', $plain_text);
	}
	
	function string2url($string)
	{
		$string = preg_replace('/[äÄ]/', 'ae', $string);
		$string = preg_replace('/[üÜ]/', 'ue', $string);
		$string = preg_replace('/[öÖ]/', 'oe', $string);
		$string = preg_replace('/[ß]/', 'ss', $string);
		$specialCharacters = array(
		'#' => 'sharp',
		'$' => 'dollar',
		'%' => 'prozent', //'percent',
		'&' => 'und', //'and',
		'@' => 'at',
		'.' => 'punkt', //'dot',
		'€' => 'euro',
		'+' => 'plus',
		'=' => 'gleich', //'equals',
		'§' => 'paragraph',
		);
		while (list($character, $replacement) = each($specialCharacters)) {
			$string = str_replace($character, '-' . $replacement . '-', $string);
		}
		$string = strtr($string,
		"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
		"AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn"
		);
		$string = preg_replace('/[^a-zA-Z0-9\-]/', '-', $string);
		$string = preg_replace('/^[\-]+/', '', $string);
		$string = preg_replace('/[\-]+$/', '', $string);
		$string = preg_replace('/[\-]{2,}/', '-', $string);
		$string = strtolower($string);
		$string = str_replace('_','-',$string);
		return $string;
	}
	
	function findexts ($filename)
	{
		$filename = strtolower($filename) ;
		$exts = split("[/\\.]", $filename) ;
		$n = count($exts)-1;
		$exts = $exts[$n];
		return $exts;
	}
	
	function createThumbnail($img, $filetype, $imgPath, $suffix, $newWidth, $newHeight, $quality)
	{
	  // Open the original image.
	  switch($filetype){
			case "image/jpg":
  			case "image/jpeg":
  			case 'image/pjpeg':
				$original = imagecreatefromjpeg("$imgPath/$img") or die("Error Opening original");
				break;
            case "image/JPG":
                $original = imagecreatefromJPG("$imgPath/$img") or die("Error Opening original");
				break;
			case 'image/png':
			case "image/x-png":
				$original = imagecreatefrompng("$imgPath/$img") or die("Error Opening original");
				break;
			case 'image/gif':
				$original = imagecreatefromgif("$imgPath/$img") or die("Error Opening original");
				break;
			default:
				echo "Invalid file type.";die();
	  }
	  //$original = imagecreatefromjpeg("$imgPath/$img") or die("Error Opening original");
	  list($width, $height, $type, $attr) = getimagesize("$imgPath/$img");
	 
	  // Resample the image.
	  $tempImg = imagecreatetruecolor($newWidth, $newHeight) or die("Cant create temp image");
	  imagecopyresized($tempImg, $original, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height) or die("Cant resize copy");
	 
	  // Create the new file name.
	  //$newNameE = explode(".", $img);
	  $newName = $img;//''. $newNameE[0] .$suffix .'.'. $newNameE[1] .'';
	  
	  // Save the image.
	  imagejpeg($tempImg, SAVEPICTHUMB."$newName", $quality) or die("Cant save image");
	 
	  // Clean up.
	  imagedestroy($original);
	  imagedestroy($tempImg);
	  return true;
	}
	
	function UploadVideoSM($name,$picname,$tmppicname,$unlinkpicname,$savepath)
	{
		$exp = explode(".",$picname);
		$cnt = count($exp);
		$pic1 = $tmppicname;
		$picture = rand()."_".time().$name.".".$exp[$cnt-1];
		$copy = copy($pic1,$savepath.$picture);
		
		/***************NOTE**********/
		
		//upload_max_filesize = 5M in php.ini
		//http://php.net/manual/en/features.file-upload.errors.php
		
		/***************NOTE**********/
		
		//$copy = move_uploaded_file($tmppicname, $savepath.$picture);
		if($unlinkpicname != '')
		{
			if(file_exists($savepath.$unlinkpicname))
				@unlink($savepath.$unlinkpicname);
		}
		
		//echo "TempPicName: ".$tmppicname.", Save Path: ".$savepath.$picture;
		if($copy)
			return $picture;
		else
			return false;
		
	}
	
	function UploadFileAdds($picname,$tmppicname,$unlinkpicname)
	{
		$exp = explode(".",$picname);
		$cnt = count($exp);
		$pic1 = $tmppicname;
		$picture = rand()."_".time().".".$exp[$cnt-1];
		$copy = copy($pic1,SAVEADDS.$picture);
		if($unlinkpicname != '')
		{
			if(file_exists(SAVEADDS.$unlinkpicname))
				@unlink(SAVEADDS.$unlinkpicname);
		}
			
		if($copy)
			return $picture;
		else
			return false;
		
	}
	
	function UploadFileSM($picname,$tmppicname,$unlinkpicname)
	{
		$exp = explode(".",$picname);
		$cnt = count($exp);
		$pic1 = $tmppicname;
		$picture = rand()."_".time().".".$exp[$cnt-1];
		$copy = copy($pic1,SAVEPIC.$picture);
		if($unlinkpicname != '')
		{
				//delete image
			if(file_exists(SAVEPIC.$unlinkpicname))
				@unlink(SAVEPIC.$unlinkpicname);
				//delete thumb
			if(file_exists(SAVEPICTHUMB.$unlinkpicname))
				@unlink(SAVEPICTHUMB.$unlinkpicname);
		}
			
		if($copy)
			return $picture;
		else
			return false;
		
	}
	function CheckUserSession($userid)
	{
		if(!isset($userid) && empty($userid))
			$this->redirect("./");
	}
	
	    
        function date_diff($dateFrom, $dateTo)
        {
            $diff = abs(strtotime($dateFrom) - strtotime($dateTo));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - ($years * 365 * 60 * 60 * 24)) / (365 * 60 * 60 * 24));
            $days = floor(($diff - ($years * 365 * 60 * 60 * 24) - ($months * 30 * 60 * 60 * 24)) / (60 * 60 * 24));
            
            $data = array(
                'years' => $years,
                'months' => $months,
                'days' => $days
            );
            //$years.",".$months.",".$days;
            return($data);
        }
		
		function ckeckLogin(){
			if(isset($_COOKIE[USERID])){
				$user_id = $_COOKIE[USERID];
			}else if (isset($_SESSION[USERID])){
				$user_id = $_SESSION[USERID];
			}else{
				$user_id = NULL;
			}
			//echo $user_id;die();
			return($user_id);
		}
		
		function userCkeck(){
			if(isset($_COOKIE[USERID])){
				$user_id = $_COOKIE[USERID];
			}else if (isset($_SESSION[USERID])){
				$user_id = $_SESSION[USERID];
			}else{
				$user_id = NULL;
			}
			if($user_id == '' or $user_id == NULL){
					$this->redirect('index.php');
			}else{
				return true;	
			}
		}
		
		function AdminCheck(){
			if (isset($_SESSION[ADMINID])){
				$admin_id = $_SESSION[ADMINID];
			}else{
				$admin_id = NULL;
			}
			if($admin_id == '' or $admin_id == NULL){
					$this->redirect('login.php');
			}else{
				return true;	
			}
		}
		
		function GetAllSubMenus($counter1, $counter2, $mainid){
				
				$submenu = '<ul class="sub">';	
			
			//$submenu .= '<li>sub</li>';
			if($counter1 > '0'){
				$sql = $this->select_sql(array("*"), "tbl_hierarchical_menu", " sub_id ='".$mainid."' and visible = '1'", "", "sql");
            	$result = $this->query($sql);
				$counter1 = $this->count_row($result);
				while($data = mysql_fetch_assoc($result)){
					$submenu .= '
					<li>
						<a href="'.SITEROOT.$this->OutString($data['title']).'/'.$this->OutString($data['id']).'">'.$this->OutString($data['title']).'</a>
					</li>';
				}
			}
			
			if($counter2 > '0'){
				$sqls = $this->select_sql(array("*"), "tbl_menu", " menu_id ='".$mainid."'", "", "sql");
            	$results = $this->query($sqls);
				$datas = mysql_fetch_assoc($results);
				//$subcounterNext = $this->count_row($results);
				$subids = $datas['sub_menu_id'];
				$arr = explode(",", $subids);
				$counter2 = count($arr);
				
				for($i=0; $i<$counter2; $i++){
				$individualID = $arr[$i];
				$sqlSUB = $this->select_sql(array("*"), "tbl_hierarchical_menu", " id ='".$individualID."' and visible = '1'", "", "sql");
				$resultSUB = $this->query($sqlSUB);
					if($this->count_row($resultSUB)>0){
						$dataSUB = mysql_fetch_assoc($resultSUB);
						
						$submenu .='
							<li>
								<a href="'.SITEROOT.$this->OutString($dataSUB['title']).'/'.$this->OutString($dataSUB['id']).'">'.$this->OutString($dataSUB['menu_name']).'</a>
							</li>';
						
					}
				}
				
				
			}
			
			$submenu .= '</ul>';
			
			return $submenu;
				
		}
		
	
}
?>