<link href="styles.css" rel="stylesheet" type="text/css">
<?php
session_start();
include_once("dbconnect.php");

	$title=(isset($_POST['title'])) ? $_POST['title'] : "";
	$content1=(isset($_POST['content1'])) ? $_POST['content1'] : "";
	
	$_SESSION['title']=$title;
	$_SESSION['content1']=$content1;
	
	if($title=="" || $content1=="")
	{
		$_SESSION['message']="Please Fill In the following Form";
		$_SESSION['messsagetype']="errormessage";
		header("location: create_note.php");
		exit();
	}

	$insert_rec=mysql_query("insert into content set title='$title', content1='$content1'");
	if($insert_rec==FALSE)
	{
		$_SESSION['message']="Error Encountered adding Content";
		$_SESSION['messagetype']="errormessage";
		header("location: create_note.php");
		exit();
	}
	unset($_SESSION['title'],$_SESSION['content1']);
	$_SESSION['message']="Content Don Enter OOOO!!!!!";
	$_SESSION['messagetype']="successmessage";
	header("location: view_note.php");
	
?>