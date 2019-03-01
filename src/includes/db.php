<?php
session_start ();

$dbname = "ffportal";
$dbuser = "";
$dbpass = "";
$tblpre = "ffp_";

$installed = "True";

$connect = mysql_connect("localhost",$dbuser,$dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db($dbname,$connect);

include("config.php");
?>
