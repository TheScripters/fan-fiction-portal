<?php
if ($_GET['p'] == "email")
  {
    include("../includes/db.php");
    include("includes/slashes.php");
    $message = $_REQUEST['message'];
    $subject = strip_gpc_slashes($_REQUEST['subject']);
    $emailForm = mysql_query("SELECT Author, AuthorEmail FROM ". $tblpre ."authors");
    while($row = mysql_fetch_array($emailForm))
      {
        $author = $row['Author'];
        $authoremail = $row['AuthorEmail'];
        mail("$author <$authoremail>", "Emailed From $sitename: $subject", strip_gpc_slashes($message), "From: $sitename Editors <$editorEM>\r\nReply-To: $editorEM\r\nX-Mailer: FanFiction Portal PHP Mailer\r\nMIME-Version: 1.0");
      }
    if ($_GET['toSelf'] == "True")
      {
        mail("$editorEM", "Emailed From $sitename: $subject", strip_gpc_slashes($message), "From: KPFF Editors <$editorEM>\r\nReply-To: $editorEM\r\nX-Mailer: FanFiction Portal PHP Mailer\r\nMIME-Version: 1.0");
      }
    header("Location: index.php?mode=mail");
  }
  else
  {
echo "<h2>Mass Email Authors</h2>
<center><form action=\"authoremail.php?p=email\" method=\"post\">
<b>Subject:</b> <input type=\"text\" name=\"subject\"><br><br>
<b>Send to editors:</b> <input type=\"checkbox\" name=\"toSelf\" value=\"True\"><br><br>
<b>Message:</b><br><textarea cols=\"50\" rows=\"6\"></textarea><br>
<input type=\"submit\" value=\"Email\"></form>";
  }
?>
