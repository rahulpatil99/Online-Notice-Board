<?php

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

echo $response;

?>