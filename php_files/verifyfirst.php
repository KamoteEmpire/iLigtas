<?php
/** save codes by loading database module */
include_once("db2.php");

/** these headers allow sending data from mobile */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

/** variables for different data received */
$username = $_GET["username"];
$pass     = $_GET["pass"];

/** verification code variable */
$verifycode = "";

$sql    = "SELECT * FROM tblusers WHERE username = '" . $username . "'"; /** checks if profile exists */
$select = mysql_query($sql);
if (mysql_num_rows($select) > 0) {
    $sql    = "SELECT * FROM tblusers WHERE username = '" . $username . "' AND password = '" . $pass . "'"; /** checks if Password matches with the username given */
    $select = mysql_query($sql);
    if (mysql_num_rows($select) > 0) {
        $verifycode = "v1";
        /** v1 = Profile Verified */
    } else {
        $verifycode = "in";
         /** in = Password does not matches with the username given */
    }
} else {
    $verifycode = "pnf";
    /** pnf = Profile not found */
}

/** return a callback to the mobile app */
echo $_GET['callback'] . "(" . json_encode(array(
    "username" => $username,
    "verified" => $verifycode
)) . ");";
?>