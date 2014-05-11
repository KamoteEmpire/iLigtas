<?php
/** save codes by loading database module */
include_once("db2.php");

/** these headers allow sending data from mobile */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

/** variables for different data received */
$email    = $_GET["email"];
$username = $_GET["username"];

$emailcode    = "";
$usernamecode = "";
/**checks if email already exists */
$sql          = "SELECT email FROM tblusers WHERE email = '" . $email . "'";
$select       = mysql_query($sql);
if (mysql_num_rows($select) > 0) {
    $emailcode = "exists";
} else {
    $emailcode = "notexists";
}
/**checks if username already exists */
$sql    = "SELECT email FROM tblusers WHERE username = '" . $username . "'";
$select = mysql_query($sql);
if (mysql_num_rows($select) > 0) {
    $usernamecode = "exists";
} else {
    $usernamecode = "notexists";
}
/** return a callback to the mobile app */
echo $_GET['callback'] . "(" . json_encode(array(
    "email" => $email,
    "eexists" => $emailcode,
    "username" => $username,
    "uexists" => $usernamecode
)) . ");";
?>