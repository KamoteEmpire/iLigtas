<?php
/** save codes by loading database module */
include_once("db2.php");

/** these headers allow sending data from mobile */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

/** variables for different data received */
$fname     = ucwords($_GET["fullname"]);
$org       = ucwords($_GET["org"]);
$numstreet = ucwords($_GET["numstreet"]);
$city      = ucwords($_GET["city"]);
$mobile    = $_GET["mobile"];
$email     = $_GET["email"];
$username  = $_GET["username"];
$password  = $_GET["pass"];
$gender    = $_GET["gender"];
$bdaym     = $_GET["bdaym"];
$bdayd     = $_GET["bdayd"];
$bdayy     = $_GET["bdayy"];

/** sql statements go here */
$sql = "INSERT INTO tblusers (fullname,organization,numstreet,city,mobile,username,password,email,gender,birthdate,verificationcode,status)
values('" . $fname . "','" . $org . "','" . $numstreet . "','" . $city . "','" . $mobile . "', '" . $username . "', '" . $password . "', '" . $email . "', '" . $gender . "', DATE '" . $bdayy . "-" . $bdaym . "-" . $bdayd . "','bypass','v')";
mysql_query($sql);
/** bypass account verification for the meantime */

/** return a callback to the mobile app */
echo $_GET['callback'] . "(" . json_encode(array(
    "fname" => $fname
)) . ");";

?>