<?php

/** these headers allow sending data from mobile */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$tweetfeeds = file_get_contents('http://iligtas.gcccs.org/feeds.html');

/** return a callback to the mobile app */
echo $_GET['callback']."(".json_encode(array("feed"=>$tweetfeeds)).");";

?>