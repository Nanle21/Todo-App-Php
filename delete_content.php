<link href="styles.css" rel="stylesheet" type="text/css">
<?php
session_start();
include_once("dbconnect.php");
$title=$_GET['title'];

$result=mysql_query("delete content.* from content where (title='$title')");

if($result==FALSE)
{
	die("Delete Was not successful!!! ".mysql_error());
}
else
{
	$_SESSION['message']="Delete Was successfull!!!!";
	$_SESSION['messagetype']="sucessmessage";
	header("location: view_note.php");
    exit();
}
?>