<?php
include("init.php");
?>

<?Php
$in=$_GET['txt'];
if(!ctype_alnum($in)){
echo "Data Error";
exit;
}

$msg="";
$msg="<select id=s1 size='15'>";
if(strlen($in)>0 and strlen($in) <20 ){
$sql="select basonym,fungus,id from fung where basonym,fungus,distribution like '%$in%'";
foreach ($dbo->query($sql) as $nt) {
//$msg.=$nt[name]."->$nt[id]<br>";
$msg .="<option value=$nt[id]>$nt[basonym] => $nt[id]</option>";
$msg .="<option value=$nt[id]>$nt[fungus] => $nt[id]</option>";
//$msg .="<option value='$nt[name]'>";

}
}
$msg .='</select>';
echo $msg;
?>