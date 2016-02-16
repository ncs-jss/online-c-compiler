<?php
	session_start();
	if(isset($_SESSION['stuid']))
	{
	 header("Location: ../jssonc_home.php");
	}
	$admission = strtolower($_POST['admission']);
	$password = $_POST['password'];
	$pass = md5($password);
	require("dbcon.php");
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db);
	if ($mysqli->connect_errno) 
	{
	    $_SESSION['login_err']="Failed to connect to MySQL: " . $mysqli->connect_error;
	}
	$query = "SELECT * FROM register WHERE admission = '$admission' AND password= '$pass'";
	$res = $con->query($query);
	$resnum = $res->num_rows;
	if($resnum==1)
	{
		$_SESSION['stuid']=$admission;
		$_SESSION['just_in']="TRUE";
		header('Location: ../jssonc_home.php');
	}
	else if($resnum==0)
	{
		$_SESSION['login_err']="Invalid Id or Password";
		header('Location: ../index.php');
	}
	$con->close();
?>
