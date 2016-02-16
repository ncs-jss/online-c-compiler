<?php
//loadcode(\"code_dep/$usrname/$lang/$dirArray[$index]\",\"$dirArray[$index]\",\"$flname\")
session_start();
$dfile = $_GET['dfile'];
$usr = $_SESSION['stuid'];
$lang = $_SESSION['lang'];
$usrdir = md5($usr);
$path = "code_dep/$usrdir/$lang/$dfile.$lang";
if($_SESSION['afile'] = $dfile)
{
 unset($_SESSION['afile']);
 unset($_SESSION['ldfile']);
}
exec("rm $path");
$_SESSION['com_resp'] = "$dfile.$lang was successfully deleted";
header("Location: jssonc_home.php");
?>
