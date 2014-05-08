<?php 

include_once("db.php");

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$username = $_GET["txtUsername"]);
$lat = $_GET["txtLatitude"];
$lng = $_GET["txtLongitude"];
$currentAddress = $_GET["txtCurrentAddress"];
$dateTime = $_GET["txtDateTime"];
$bdayy = $_GET["bdayy"];
$mobile = $_GET["txtMobile"];
$username = $_GET["txtUsername"];
$password = $_GET["txtPass"];
$email = $_GET["txtEmail"];
$street = $_GET["txtStreet"];
$barangay = $_GET["txtBarangay"];
$city = $_GET["txtCity"];
$province = $_GET["txtProvince"];
$zipcode = $_GET["txtZipcode"];


$sql="INSERT INTO tbliata (fld_memberid,fld_firstname,fld_middlename, fld_lastname, fld_birthdate, fld_mobile, fld_username, fld_password,fld_email,fld_street,fld_barangay, fld_city, fld_province, fld_zipcode)
values(NULL, '".$firstname."', '".$middlename."', '".$lastname."', DATE '".$bdayy."-".$bdaym."-".$bdayd."', '".$mobile."', '".$username."', '".$password."', '".$email."',  '".$street."', '".$barangay."', '".$city."', '".$province."', '".$zipcode."' )";
if (!mysql_query($sql))
  {
  echo('Error: ' . mysql_error($link));
  }
else
{

echo $_GET['callback']."(".json_encode(array("firstname"=>$firstname)).");";
}
?>