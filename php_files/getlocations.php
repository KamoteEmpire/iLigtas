<?php

/** save codes by loading database module */
include_once("db2.php");

/** these headers allow sending data from mobile */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

/**Selects the distinct locations from the aid. */
$sql    = "SELECT distinct address FROM tbl_aid";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    $data[] = array(
        "location" => $row['address']
    );
}
echo $_GET['callback'] . "(" . json_encode($data) . ");";
?>