<?php
  session_start();
  if(!(isset($_SESSION['stuid'])))
  {
    header("Location: index.php");
  }
  $_SESSION['lang'] = $_GET['alang'];
  $lng = $_SESSION['lang'];
  $_SESSION['afile'] = $lng."sample";
  header("Location: jssonc_home.php");
?>
