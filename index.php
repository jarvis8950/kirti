<?php
session_start();
if (isset($_SESSION['username'])) {
$_SESSION['msg'] = "you must login  first";
header("location : login.php");
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location : login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>home page</title>
  </head>
  <body>
<h1>welcome</h1>

  </body>
</html>
