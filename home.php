<?php
session_start();
$main_page="Home";
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
            <table align="center" cellpadding="10" cellspacing="1">
            
            	<tr bgcolor="#cdcdcd" >
                	<td>&raquo;</td>
                    <td><a href="create_note.php" style="text-decoration:none;">Create Note</a></td>
                </tr>
              <tr bgcolor="#efefef" >
                	<td>&raquo;</td>
                    <td><a href="view_note.php" style="text-decoration:none;">View Note</a></td>
                </tr>
             <tr bgcolor="#cdcdcd	">
           	   <td>&raquo</td>
                <td><a href="logout_process.php">Logout</a></td>
             </tr>
            </table>
			<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>