<?php
session_start();
$main_page="View Notes";
require_once("dbconnect.php");
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
            
            <p align="center"><a href="home.php">Home</a> | <a href="view_note.php">Back to list Of Note</a></p>
            
            <?php
			$id=isset($_GET['id']) ? ($_GET['id']) : "";
			$select_rec=mysql_query("select * from content where (id='$id')");
			if($select_rec==FALSE)
			{
				?>
                <p class="errormessage">Error Encountered viewing Note! <?php echo mysql_error(); ?></p>
                <?php
				die();
			}
			
			$total_rec=mysql_num_rows($select_rec);
			if($total_rec>0)
			{
				mysql_data_seek($select_rec,0);
				$rowp=mysql_fetch_assoc($select_rec);
				
				
				$title=isset($_POST['title']) ? $_POST['title'] : $rowp['title'];
				$content1=isset($_POST['content1']) ? $_POST['content1'] : $rowp['content1'];
			}
			?>
            
            
            <table align="center" cellpadding="5" border="" cellspacing="">
            	<tr bgcolor="efefef">
                	<td>Title: <?php echo $title ?></td>
                </tr>
                <tr bgcolor="#cdcdcd">
                	<td>Content: <?php echo $content1 ?></td>
                </tr>
                <tr>
   <td colspan="2" align="center"><a href="update_note.php?id=<?php echo $rowp['id']; ?>">Update / Edit Note</a></td>
   
  
                </tr>
            </table>
            
  <!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>