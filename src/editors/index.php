<?php
//Filename: index.php
//Coded by Adam Humpherys
include("../includes/db.php");
$mode = $_REQUEST['mode'];
$userNameSession=$_SESSION["ffpuser"];
//if the user is logged in...
if ($userNameSession)
 {
   $sql6 = mysql_query("SELECT Editor FROM ". $tblpre ."authors WHERE AuthorName = '$userNameSession'",$connect);
   while($row6 = mysql_fetch_array($sql6))
     {
       $is_editor = $row6['Editor'];
     }
   if ($is_editor == "Yes")
     {
include("includes/header.inc");
if ($mode == "editmain")
   {
     include("update.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "editidx")
   {
     include("editupd.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "contact")
   {
     include("contact.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "rate")
   {
     include("rate.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "ficedit")
   {
     include("fic_edit.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "pick")
   {
     include("editor_pick.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "mail")
   {
     include("authoremail.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "rss")
   {
     include("rsscfg.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "rules")
   {
     include("rules.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "authors")
   {
     include("authorlist.php");
     include("includes/footer.inc");
     exit;
   }
if ($mode == "msgbrd")
   {
     include("msg.php");
     include("includes/footer.inc");
     exit;
   }
else
 {
  include( "includes/index.inc");
 }
include("includes/footer.inc");
exit;
}
if ($is_editor == "No")
  {
    include("includes/noeditorhead.inc");
    include("includes/editorerror.inc");
    include("includes/footer.inc");
    exit;
  }
 }
if (empty($userNameSession))
  {
    header("Location: ../login.php?u=editor");
  }
?>
