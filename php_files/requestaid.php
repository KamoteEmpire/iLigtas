<?php
/** save codes by loading database module */
include_once("db2.php");

/** these headers allow sending data from mobile */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$name     = $_GET['username'];
$address  = $_GET['currentaddress'];
$lat      = $_GET['latitude'];
$lng      = $_GET['longitude'];
$aid      = $_GET['aidtype'];
$aidnote  = $_GET['aidnote'];
$datetime = $_GET['datetime'];

$sql = "INSERT INTO `tbl_aid` (id, username,address,lat,lng,aid,aidnote,datetime) values (NULL,'" . $name . "', '" . $address . "', '" . $lat . "', '" . $lng . "', '" . $aid . "', '" . $aidnote . "', '" . $datetime . "' )";
mysql_query($sql);

/** return a callback to the mobile app */
echo $_GET['callback'] . "(" . json_encode(array(
    "fname" => $name
)) . ");";

?>