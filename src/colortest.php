<?php
if (!empty($_REQUEST['color']))
  {
    $color = $_REQUEST['color'];
  }
 else
  {
    $color = "#FFFFFF";
  }
?>
<html>
<head>
<title>HTML Color Test</title>
<style>
<!--
H1 {background: #FFFFFF; text-align: center; color: #000000}
-->
</style>
</head>

<body bgcolor="<?echo$color?>">
<br><h1>HTML Color Test</h1><br>
<center>
<br>
<form action="colortest.php" method="post">
<input type="text" name="color" size="10" value="<?echo$color?>" maxlength="10"><br>
<input type="submit" value="Test Color!"></form>
<br>

</body>
</html>
