<?php
session_start();
$main_page="Update Note";
include_once("dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>To Do App
<?php

if(isset($main_page))
{
	echo" : $main_page";
}
if(isset($sub_page))
{
	echo" : $sub_page";
}
?>

</title>
<!-- InstanceEndEditable -->
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div id="header">
	<h1>To Do Application</h1>
</div>
<div id="content">
			<?php
            	if($main_page!="login" && isset($_SESSION['current_user']))
				{
					?>
                    <p align="right" style="border-bottom:solid 1px #ccc; "><b>User:</b><?php echo $_SESSION['current_user']; ?></p>
                    <?php
				}
            ?>
            
      
     
  <h1 align="center"> <?php echo $main_page; ?> </h1>
    <?php
		if(isset($_SESSION['message']))
		{
			?>
  <p class="<?php echo $_SESSION['messagetype']; ?>"><?php echo $_SESSION['message']; ?></p>
            <?php
			unset($_SESSION['message'],$_SESSION['messagetype']);
		}
	?>
            <!-- InstanceBeginEditable name="mycontent" -->
			<p align="center"><a href="home.php">Home</a> | <a href="view_note.php">Back to View Note</a></p>
            <?php
			
			$id=isset($_GET['id']) ? ($_GET['id']) : "";
			
			$select_rec=mysql_query("select * from content where (id='$id')");
			if($select_rec==FALSE)
			{
				?>
                <p>Error Encountered Editing Note! <?php echo mysql_error(); ?></p>
                <?php
				die();
			}
			$total_rec=mysql_num_rows($select_rec);
			if($total_rec>0)
			{
				mysql_data_seek($select_rec,0);
				$rowp=mysql_fetch_assoc($select_rec);
				
				$title = isset($_POST['title']) ? $_POST['title'] : $rowp['title'];
				$content1 = isset($_POST['content1']) ? $_POST['content1'] : $rowp['content1'];
			}
			?>
            <form action="update_note_process.php" method="post" id="myform">
            <table cellpadding="10" cellspacing="1" align="center">
            <tr>
            	<td>Title</td>
                <td><input name="title" type="text" id="title" value="<?php echo $title; ?>" /></td> 
            </tr>
            <tr>
            	<td valign="top">Content</td>
                <td><textarea name="content1" id="content1" style="min-height:250px; min-width:500px; font-family:'Arial Black', Gadget, sans-serif ;"> <?php echo $content1; ?> </textarea></td>
            </tr>
            <tr>
            	<td colspan="2" align="center" onclick="post()"><a href="update_note_process.php">Post</a></td>
            </tr>
            </table>
            </form>
            <script language="javascript">
			document.getElementById("title").focus();
			function post()
			{
				if(document.getElementById("title").value=="")
				{
					alert("Please Put In your Title");
					document.getElementById("title").focus();
					return null;
				}
				if(document.getElementById("content1").value=="")
				{
					alert("Content Please!!!!");
					document.getElementById("content1").focus();
					return null;
				}
				document.getElementById("myform").submit();
			}
            </script>
            
            
  <!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>