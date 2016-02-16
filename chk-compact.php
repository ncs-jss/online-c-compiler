<!DOCTYPE HTML>
<?php
 ini_set('max_execution_time', 5);
 session_start();
 $usrname = $_SESSION['stuid'];
 $udir = md5($usrname);
 $lang = $_SESSION['lang'];
 $filnm = $_SESSION['afile'];
 $file = "$filnm.$lang";
 echo $file;
 $commd = "cd srv_scripts; ./complr-act.sh $udir $lang $file $usrname;";
 exec($commd,$ret);
 $_SESSION['com_resp'] = ("Code Compiled Successfully");
 $_SESSION['codex'] = "TRUE"; 
 $_SESSION['ldfile'] = "TRUE"; 
 header("Location: jssonc_home.php"); 
?>

