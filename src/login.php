<?php
//Test Login Form v1
//session_start();
include("includes/db.php");
if ($_GET['u'] == "editor")
  {
    include("includes/header.inc");
    echo "<h2>Login</h2>";
    echo "<center><font size=\"+2\"><b>Login to access the ECP!</b></font>";
    echo "<form action=\"login.php?p=login&r=ecp\" method=\"post\" name=\"loginForm\">";
    echo "<b>Username:</b> <input type=\"text\" name=\"userName\"><br>";
    echo "<b>Password:</b> <input type=\"password\" name=\"userpass\"><br>";
    echo "<input type=\"submit\" value=\"Login!\"></form></center>";
    include("includes/footer.inc");
    exit;
  }
if ($_GET['p'] == "login")
  {
    if ($_GET['r'] == "ecp")
      {
        $redirect = "editors";
      }
    if (empty($_GET['r']))
      {
        $redirect = "index.php";
      }
    include("includes/slashes.php");
    $username = $_REQUEST['userName'];
    $username2 = strip_gpc_slashes($username);
    $userpass = $_REQUEST['userpass'];
    $md5pass = md5($userpass);
    $loginForm = mysql_query("SELECT * FROM ". $tblpre ."authors WHERE AuthorName = '$username2'",$connect);
    while($login = mysql_fetch_array($loginForm))
      {
        $userid = $login['AuthorId'];
        $sqluser = $login['AuthorName'];
        $sqlpwd = $login['Password'];
      }
    if ($md5pass == $sqlpwd && $sqluser == $username2)
      {
        $_SESSION["ffpuser"]=$username2;
        $_SESSION["ffpuserid"]=$userid;
      	header("Location: $redirect");
      }
    else
      {
       header("Location: login.php?p=err");
      }
  }
if ($_GET['p'] == "err")
  {
    include("includes/header.inc");
    echo "<h2>Login</h2>";
    echo "<center><font size=\"+2\"><b>Username/password incorrect!</b></font>";
    echo "<form action=\"login.php?p=login\" method=\"post\" name=\"loginForm\">";
    echo "<b>Username:</b> <input type=\"text\" name=\"userName\"><br>";
    echo "<b>Password:</b> <input type=\"password\" name=\"userpass\"><br>";
    echo "<input type=\"submit\" value=\"Login!\"></form></center>";
    include("includes/footer.inc");
    exit;
  }
 else
  {
    include("includes/header.inc");
    echo "<h2>Login</h2>";
    echo "<center><form action=\"login.php?p=login\" method=\"post\" name=\"loginForm\">";
    echo "<b>Username:</b> <input type=\"text\" name=\"userName\"><br>";
    echo "<b>Password:</b> <input type=\"password\" name=\"userpass\"><br>";
    echo "<input type=\"submit\" value=\"Login!\"></form></center>";
    include("includes/footer.inc");
    exit;
  }
?>
