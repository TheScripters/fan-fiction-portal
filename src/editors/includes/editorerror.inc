<center><font size="+2" color="#FF0000">You do not have permission to access this page!<br><br>Your username and IP have been logged.<br><br></font>Click <a href="../index.php">here</a> to return</center>

<?
$ip = $_SERVER['REMOTE_ADDR'];
$user = $_SESSION['ffpuser'];
$sql = mysql_query("INSERT INTO ". $tblpre ."BadEcp VALUES ('', '$user', '$ip')",$connect);
?>
