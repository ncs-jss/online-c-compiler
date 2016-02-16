<!doctype html>
<html>

<head>
  <title>Nibble Online Compiler</title>
  <meta http-equiv="Content-Type" content="text/html;&gt;charset=iso-8859-1">
  <link rel="stylesheet" type="text/css" href="style/style.css">

</head>

<body>
<CENTER> 
<div id="content">
			<div>
				<div style="width: 850px; height: 50px;">
			<br><br>
			
	  <h3 style="text-align: center;">
		<u><strong><font face="Arial" >Login</font></strong></u> 
	  </h3>
	</div> 
	<?php 
		session_start(); 
		if(isset($_SESSION['stuid']))
		{
			header('Location:jssonc_home.php');
		}
		else
		unset($_SESSION['stuid']);
		if(isset($_SESSION['login_err']))
		{
			echo "<br> <br> <br>";			
			echo $_SESSION['login_err'];
			unset($_SESSION['login_err']);
		}
		else
		unset($_SESSION['login_err']);
	?>
<div id="login-box">
 <form action="common_code/login_act.php" method = "POST">
	<table align="center">
		<tr><td><b>Admission no </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type = "text" name="admission" placeholder="Enter your admission numnber" required onfocus="this.placeholder = ''" 
				pattern="^([0-9])([0-9])([A-Z]|[a-z])([A-Z]|[a-z])([A-Z]|[a-z])?[0-9][0-9][0-9]$"></td></tr>
		<tr><td></br></td>
				<td> </td><br/><br/></tr>
		<tr><td><b>Password </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type = "password" name="password" pattern=".{6,20}" placeholder="Enter your Password" required onfocus="this.placeholder = ''"></td></tr>
		<tr><td></br></td>
				<td> </td></tr>
		<tr><td colspan=1> <CENTER> <input type="submit" value ="ENTER"> </CENTER> </td>
			<td><a href="register.php">Register</a></td></tr>
		</table>
</div>
 </form> <br> <br> <br> 
		<br> <br> <br>
		</div>
		</div>
	
	
 </CENTER>
  </body> 
<CENTER> <div id="foot">&copy; NIBBLE COMPUTER SOCIETY</div> </CENTER>
</html>
