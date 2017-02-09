<link href="styles.css" rel="stylesheet" type="text/css">
<?php
session_start();
include_once("dbconnect.php");

	$id=isset($_POST['id']) ? $_POST['id'] : "";
	$title=isset($_POST['title']) ? $_POST['title'] : "";
	$content1=isset($_POST['content1']) ? $_POST['content1'] : "";
	
	$_SESSION['title']=$title;
	$_SESSION['content1']=$content1;
	

	
	$update_sql=mysql_query("update into content set title='$title', content1='$content1', where (id='$id')");
	if($update_sql==FALSE)
	{
		$_SESSION['message']="Error Encountered Updating Content";
		$_SESSION['messagetype']="errormessage";
		header("location: update_note.php");
		exit();
	}
	else
	unset($_SESSION['title'],$_SESSION['content1']);
	$_SESSION['message']="Content Don Update OOOO!!!!!";
	$_SESSION['messagetype']="successmessage";
	header("location: notes.php");
	
?>