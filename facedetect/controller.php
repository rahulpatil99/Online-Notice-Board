<?php

include "../config.php";
include "../session.php";

$app_id = '65c5e877';
$app_key = '86896bae836fd173a12298486cd1694d';
$phpMethod = $_POST["phpMethod"];
$args = $_POST["args"];

if ($args == null) {
	$args = "";
}

include('Kairos.php');

$Kairos  = new Kairos($app_id, $app_key);


$response = $Kairos->$phpMethod($args);

//echo $response;
 
$arr =json_decode($response);
	
$arr =json_decode($response);

$subarr = $arr->images['0']->candidates['0'];
	
//print_r($subarr->subject_id);

$id = $subarr->subject_id;

echo "ID of Image: ".$id;

$q = mysql_query("select * from faculty where faculty_id = '$id'")or die(mysql_error());

$info = mysql_fetch_assoc($q);

$n = mysql_num_rows($q);


if($n>0)
{
	echo "<table class='table table-bordered'>";
	echo "<th>Id</th><th>Name</th><th>Email</th><th>Qualification</th>";
	echo"<tr><td>$info[faculty_id]</td><td>$info[name]</td><td>$info[email]</td><td>$info[qualification]</td></tr>";
}

?>