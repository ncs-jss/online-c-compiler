<!DOCTYPE HTML>

<html lang = "en">
<head>
	<title> JSS On C - Beta </title>
	<meta charset = "UTF-8" />
	<script type="text/javascript" src="scripts/jquery.js"> </script>
	<meta http-equiv="Content-Type" content="text/html;&gt;charset=iso-8859-1">
  	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel=stylesheet href="codemirror/lib/codemirror.css">
	<script src="codemirror/lib/codemirror.js"></script>
	<script src="codemirror/mode/clike/clike.js"></script>
	<script src="codemirror/addon/edit/matchbrackets.js"></script>

	<script src="js/out_load.js"></script>
	<script src="js/fload.js"></script>
	<script src="js/dyn.js"></script>
	
        <?php
 		 session_start();
 		 if(!(isset($_SESSION['stuid'])))
		 {
		  header("Location: index.php");
		 }
		 else
		 {
		  $usrname = $_SESSION['stuid'];
		  $usrdir = md5($usrname);
		 }
		 if(isset($_SESSION['just_in']))		//To initialise the default value for language
		 {
		  $_SESSION['lang'] = "c";
		  $_SESSION['afile'] = "csample";
 		  $_SESSION['ldfile'] = "TRUE";
		  unset($_SESSION['just_in']);
		 }
		 if(isset($_SESSION['lang']))			//To check for and change the value for language
		 {
 		  $lang = $_SESSION['lang'];
		 }
		 if(isset($_SESSION['afile']))			//To check for and change the name of active file
		 {
		  $afile = $_SESSION['afile']; 
		 }
		 if(isset($_SESSION['codex']))			//To detect a code execution request and load outputs
 		 {
  		  echo("<script>view_out(\"$usrdir\",\"$usrname\",\"$lang\"); </script>");
 		  unset($_SESSION['codex']);
 		 }
		 if(isset($_SESSION['ldfile']))			//To load the active file 
 		 {
  		  echo("<script>loadafile(\"$usrdir\",\"$lang\",\"$afile\"); </script>");
 		  //unset($_SESSION['ldfile']);
 		 }		
 		?>
	
</head>
<body>
 <div id="ceiling">
 	<CENTER> JSS On C - Beta</CENTER>
 </div>
 <div id="abt_user">
 <table width=100%>
 <tr>
	<td width=90%> Logged In as : <?php echo $_SESSION['stuid']?>
	<td width=10%> <div>
		<a href="logout.php"> LOGOUT </a>
	</div> </td>
 </tr>
 </table>
 </div>  
 <table id="mtable">
 <tr>
	<td>
 		<div class="cblock" id="codediv">
		</br>
 		<form  name="txtcode" action="uplcode.php" method="POST">
  		<table class="intab">
      		<tr>
		<CENTER> Select Language : <select name="lang" size="1" OnChange=changeLang(this.value)>
  				<option value="c" <?php if($_SESSION['lang'] == "c") echo "selected=\"selected\"";?>>C</option>
  				<option value="cpp"<?php if($_SESSION['lang'] == "cpp") echo "selected=\"selected\"";?>>C++</option>
		</select>	</CENTER>
		</tr> </br>
		<table class="intab">
		<tr> &nbsp File Name: <input type="text" name="filename" OnChange=show_both() id="fname"> (without extension) </tr>
		<tr> <br> </tr>		
		<tr> <textarea name="txtcode" id="thecode" spellcheck="false" rows="20" cols="40" onFocus="this.value=''; this.onfocus=null;">
		</textarea>
		<script>
    		var editor = CodeMirror.fromTextArea(document.getElementById("thecode"), 
		{
      		 lineNumbers: true,
      		 mode: "text/x-csrc",
      		 matchBrackets: true 
    		});
		editor.setSize(550,300);
		editor.on('change',function hide_compe()
				   {
					document.getElementById('sub_code').style.visibility = 'visible'; 					
					document.getElementById('run_code').style.visibility = 'hidden';
				   });
 		</script>  </tr>
		
		<tr>	<td width="50%"> <CENTER> <input type="submit" name="sub_code" OnClick=show_compe() id="sub_code" value="(1) Save To Server"> </CENTER> </td> </form>
			<form name="runc" action="chk-compact.php"> <td width="50%"> <CENTER> <input type="submit" name="run_code" id="run_code" value="(2) Compile and Execute"> </CENTER> </td> </form>
   		</tr>
		</table> 	
		</div>
	</td>
	<td> 
		<div class="fipblock" id="code_sub">
 			<form name="txtcode" action="uplfile.php" method = "POST" enctype="multipart/form-data">
			<table align="center" style="margin: 0cm 0.25cm 0.25cm 0.25cm">
				<tr>
					<td class="filtable" >Upload a <?php echo $_SESSION['lang']?> Source File:</b>&nbsp;&nbsp;</td>
					<td class="filtable" ><input type = file name="ucode" id="cfile"></td><br/>
				</tr>
				<tr><td colspan=2 class="filtable" > <CENTER> <input type="submit" name="sub_file" value ="Submit"> </CENTER> </td></tr>
				
			</table> </form>	
 		</div>
		<div class="fipblock" id="inp_sub">
 			<form name="codeips" action="usrinps.php" method = "POST" enctype="multipart/form-data">
			<table align="center" style="margin: 0cm 0.25cm 0.25cm 0.25cm">
				<tr>
					<td class="filtable" >Upload Input File :</b>&nbsp;&nbsp;</td>
					<td class="filtable" ><input type = file name="usrinp" id="ifile"></td><br/>
				</tr>
				<tr><td colspan=2 class="filtable" > <CENTER> <input type="submit" name="sub_infle" value ="Submit"> </CENTER> </td></tr>
			</table> </form>
 		</div>
		<div class="opblock">
		 &nbsp&nbsp<u>Output  </u> </br>
		 <textarea name="outcode" id="opcode"> 
		 </textarea>
		 &nbsp&nbsp<u>Errors  </u> </br>
		 <textarea  name="outerrs" id="operrs"> 
		 </textarea>
 		</div>
	</td>
 	<td>
		<div class="dirblock" id="dir_str">
		<br>
		<CENTER> <b> <u> Saved <?php echo $_SESSION['lang']?> codes </u> </b> </CENTER> <br>
		<table id="dtable">
		<?php					//PHP Script To List Directory Structure
		//$usrname = "piyush";
		//$lang = "c";
		$myDirectory = opendir("code_dep/$usrdir/$lang/");
		while($entryName = readdir($myDirectory)) 
		{
		 $dirArray[] = $entryName;
		}
		closedir($myDirectory);
		$indexCount	= count($dirArray);
		sort($dirArray);
		for($index=0; $index < $indexCount; $index++) 
		{
	         if (substr("$dirArray[$index]", 0, 1) != ".")
		 { // don't list hidden files
		  $fext = strtolower(end(explode('.',$dirArray[$index])));
		  $flname =  strtolower(reset(explode('.',$dirArray[$index])));
		  if ($fext == $lang)
		  {	   
			print("<tr> <td width=90%> <a href=\"code_open.php?opfile=$flname\">$dirArray[$index]</a> </td>
					<td width=10%> <a OnClick=conf_del(\"$flname\",\"$fext\")>(x)</a> </td> </tr>");
		  // print("&nbsp&nbsp<text color:\"red\" onclick=delfile(\"$dirArray[$index]\")> (x) </text>"); 
		  }
		 }
		}
		?>
		</table>
		</div>	
 	</td>
 </table>
 <div id="com_response">
 <table width=100%>
 <tr>
	<td width=90%> <div>
	<?php
	 if(isset($_SESSION['com_resp']))
	 {
	  echo $_SESSION['com_resp'];
	  unset($_SESSION['com_resp']);
	 }
	 if(isset($_SESSION['com_err']))
	 {
	  $cmerr=$_SESSION['com_err'];
	  echo "<font color=\"red\"> $cmerr </font>";
	  unset($_SESSION['com_err']);
	 }
	?> </td> </div> 
 </tr>
 </table>
 </div>  
 <CENTER> <div id="foot">&copy; NIBBLE COMPUTER SOCIETY</div> </CENTER>
</body>
</html>
