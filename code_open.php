<?php
//loadcode(\"code_dep/$usrname/$lang/$dirArray[$index]\",\"$dirArray[$index]\",\"$flname\")
session_start();
$_SESSION['afile'] = $_GET['opfile'];
$_SESSION['ldfile'] = "TRUE";
echo $_GET['opfile'];
header("Location: jssonc_home.php");
?>
