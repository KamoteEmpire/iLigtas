<?php

/** save codes by loading database module */
include_once("db2.php");

/** these headers allow sending data from mobile */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$loc          = $_GET['loc'];

/**Fetch the data. Get count for each aid given in the filter and location */
$sql          = "SELECT * FROM tbl_aid where aid = 'medical' and address = '" . $loc . "'";
$result       = mysql_query($sql);
$medicalcount = mysql_num_rows($result);

$sql       = "SELECT * FROM tbl_aid where aid = 'food' and address = '" . $loc . "'";
$result    = mysql_query($sql);
$foodcount = mysql_num_rows($result);

$sql          = "SELECT * FROM tbl_aid where aid = 'shelter' and address = '" . $loc . "'";
$result       = mysql_query($sql);
$sheltercount = mysql_num_rows($result);

$sql               = "SELECT * FROM tbl_aid where aid = 'construction' and address = '" . $loc . "'";
$result            = mysql_query($sql);
$constructioncount = mysql_num_rows($result);

$sql         = "SELECT * FROM tbl_aid where aid = 'rescue' and address = '" . $loc . "'";
$result      = mysql_query($sql);
$rescuecount = mysql_num_rows($result);

/** return a callback to the mobile app */
echo $_GET['callback'] . "(" . json_encode(array(
    "medicalcount" => $medicalcount,
    "foodcount" => $foodcount,
    "sheltercount" => $sheltercount,
    "constructioncount" => $constructioncount,
    "rescuecount" => $rescuecount
)) . ");";
?>