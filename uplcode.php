<?php
session_start();
if(!(isset($_SESSION['stuid'])))
 {
  header("Location: index.php");
 }			
if(isset($_POST))
{
  if((!empty($_POST['filename']))&&(!empty($_POST['lang'])))
  {
   $ext = $_POST['lang'];
   $data = $_POST['txtcode'];
   $filnm = $_POST['filename'];
   $usrname = $_SESSION['stuid'];
   $udir = md5($usrname);
   $file = "$filnm.$ext";
   $_SESSION['afile'] = $filnm;
   $_SESSION['lang'] = $ext;
   $fp = fopen("$file", "w+");
   fwrite($fp, $data) or die("Couldn't write values to file!"); 
   fclose($fp); 
   rename("./$file", "./code_dep/$udir/$ext/$file");
   chmod("./code_dep/$udir/$ext/$file",0755);
   $_SESSION['com_resp'] = "Saved to $file successfully!";
   $_SESSION['ldfile'] = "TRUE";
   header("Location: jssonc_home.php");
  }
  else
  {
   $_SESSION['com_err'] = "Please Select a language and enter a filename";
   header("Location: jssonc_home.php");
  }
}
else
{
   header("Location: jssonc_home.php");
}	
	
?> 		
