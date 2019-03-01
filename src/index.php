<?php
//Filename: index.php
//Coded by Adam Humpherys
error_reporting(E_ALL ^ E_NOTICE);
$mode = $_REQUEST['mode'];
include("includes/db.php");
if ($installed != "True")
  {
    header("Location: install.php");
  }
include("includes/header.inc");
/*if (is_writable("includes/db.php"))
  {
    echo "<font size=\"+2\" color=\"#FF0000\">Please chmod includes/db.php to 644!</font>";
    include("includes/footer.inc");
    exit;
  }*/
if (!file_exists("install.php"))
  {
if(isset ($_GET['mode']))
 {
  if ($_GET['mode'] == "submit")
   {
    include("includes/dbsubmit.inc");
   }
  if ($_GET['mode'] == "register")
   {
     include("includes/register.inc");
   }
  if ($_GET['mode'] == "rules")
   {
     include("rules.php");
   }
  if ($_GET['mode'] == "latest")
   {
     include("latest.php");
   }
  if ($_GET['mode'] == "links")
   {
     include("links.php");
   }
 }
else
 {
  include( "includes/index.inc");
 }
  }
  else
  {
    echo "<font size=\"+2\" color=\"#FF0000\">Please delete install.php before continuing!</font>";
  }
include("includes/footer.inc");
?>
