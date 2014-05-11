<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library

$search            = "@dost_pagasa OR PanahonNgayon OR disasters_ph OR  #IMReadyPH OR #HelpPH OR #RescuePH OR #ReliefPH OR #FloodPH OR #safenow OR #FloodsPH OR @dpwhco OR ( @mmda AND traffic) OR (@rapplerdotcom AND weather) OR @phivolcs_dost OR @PhilCoast OR (@gmanews AND (Weather OR Disaster))";
$notweets          = 20;
$consumerkey       = "km6Yd6j3N2OrHVvxhUNSATlEY";
$consumersecret    = "enxBmLpnIdnEo3zh8FWE31FmvrMclRRZWspkeohu4kK68pMt9c";
$accesstoken       = "40880620-ZrTh1L4opJZVoOHKbGNjaNuGNT1HBumRGfehKqPLs";
$accesstokensecret = "s1PVtMwPnwbtY1XJLZ2tDZECrxiVnnDrDe8RsrsNuf30y";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret)
{
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$search = str_replace("#", "%23", $search);
$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=" . $search . "&count=" . $notweets);

echo json_encode($tweets);
?>