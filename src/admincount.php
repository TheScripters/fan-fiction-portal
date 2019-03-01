<?
include("includes/slashes.php");
$dbname = "savedisn_sdsmain";
$dbuser = "savedisn_main";
$dbpass = "kmission";
$connect = mysql_connect("localhost",$dbuser,$dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db($dbname,$connect);

$sql1 = mysql_query("SELECT COUNT(*) AS adjlcount FROM kp_spoiler WHERE Show = 'adjl' AND Confirmation = 'False'");
$adjlcnt = mysql_fetch_array($sql1);
$sql2 = mysql_query("SELECT COUNT(*) AS kpcount FROM kp_spoiler WHERE Show = 'kp' AND Confirmation = 'False'");
$kpcnt = mysql_fetch_array($sql2);

mail("adam@savedisneyshows.org","Testing Mail Sending","There are $kpcnt totally unconfirmed submitted Kim Possible spoilers and $adjlcnt totally unconfirmed submitted Jake Long spoilers in the database.","From: adam@thescripters.com");
?>
