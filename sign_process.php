<link href="styles.css" rel="stylesheet" type="text/css" />
<?php
session_start();
include_once("dbconnect.php");

	$username=isset($_POST['username']) ? trim($_POST['username']) : "";
	$password=isset($_POST['password']) ? md5(hash($_POST['password'])) : "";

	echo crypt(md5($password));
	
	if($username=="" || $password=="")
	{
		$_SESSION['message']="Please fill In the required Field";
		$_SESSION['messagetype']="errormessage";
		header("location: sign_up.php");
		exit();
	}
	
	$select_user=mysql_query("select * from users where(username='$username')");
	if($select_user==FALSE)
	{
		$_SESSION['message']="Error encourted accessing user information!" .mysql_error();
		$_SESSION['messagetype']="errormessage";
		header("location: sign_up.php");
		exit();
	}
	
	$total_users=mysql_num_rows($select_users); //Get the total Numebr of Records Returnd. 
	if($total_users>0)
	{
		$_SESSION['message']="This username ($username) already exist. please enter a different username! ";
		$_SESSION['messagetype']="errormessage";
		header("location: sign_up.php");
		exit();
	}
	$insert_rec=mysql_query("insert into users set username='$username', password='$password'");
	if($insert_rec==FALSE)
	{
		$_SESSION['message']="Error Encounterd adding user information! " .mysql_error();
			$_SESSION['messagetype']="errormessage";
			header("location: sign_up.php");
			exit();
	}
	
	$_SESSION['message']="User ($username) has been succesfully added.";
	$_SESSION['messagetype']="successmessage";
	header("location: home.php");
?>