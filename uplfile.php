<?php
 session_start();
 $usrname = $_SESSION['stuid'];
 $udir = md5($usrname);
 $lang = $_SESSION['lang'];
 if(isset($_FILES['ucode']))
  {
   $errors= array();
   $file_name = $_FILES['ucode']['name'];
   $file_tmp = $_FILES['ucode']['tmp_name'];
   $file_type = $_FILES['ucode']['type'];
   $file_size = $_FILES['ucode']['size'];
   $file_ext = strtolower(end(explode('.',$_FILES['ucode']['name'])));    
   if($file_ext != $lang)
   {
   	$errors[]="Error : \"$file_ext\" this extension is not allowed";
   }
   if($file_size>256000)
   {
   	$errors[]="Error : Filesize too large (Greater than 250 kilobytes)";
   }    
   if (file_exists("code_dep/$udir/$lang/$file_name"))
    {
	$errors[]="Error : The file already exists, Please use a different name or edit/remove the existing file";
    }
   if(empty($errors)==true)
   {
    if(move_uploaded_file($file_tmp,"code_dep/$udir/$lang/$file_name"))
    {
     chmod("./code_dep/$udir/$lang/$file_name",0755);
     $_SESSION['com_resp']="File uploaded succesfully... You can now open the file for editing or compile it";
     header('Location:jssonc_home.php');
    }
   }
   else
   {
    $_SESSION['com_err']=implode(',',$errors);
    header('Location:jssonc_home.php');
   }
  }
 else
 {
  $_SESSION['com_err']="No File Selected, Please Select a file before clicking on the Submit Button";
  header('Location:jssonc_home.php');
 }
?> 
