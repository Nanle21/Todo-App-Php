<?php
session_start();
$main_page="View List Of Notes";
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
            <p align="center"><a href="home.php">Home</a></p>
            <?php
			$select_content=mysql_query("select * from content");
			if($select_content==FALSE)
			{
				?>
                <p class="errormessage">Error Encounter Accessing Content!!! <?php echo mysql_error(); ?></p>
                <?php
				die();
			}
			
			$total_content=mysql_num_rows($select_content);
			if($total_content<=0)
			{
				?>
                <p class="errormessage">No Content Found!!!!! </p>
                <?php
			}
			else
			{
				?>
                   <table align="center" cellpadding="5" cellspacing="0" border="0">
                    	<tr class="tableheading">
                        	<td>Title</td>
                        	<td>Delete</td>
                    	</tr>
                <?php
				$bgcolor="#cdcdcd";
				
				for($count_content=0; $count_content<$total_content; $count_content++)
				{
					
									if($bgcolor=="#cdcdcd")
									{
										$bgcolor="#efefef";
									}
									else
									{
										$bgcolor="#cdcdcd";
									}
						mysql_data_seek($select_content, $count_content);
						$row_select_content=mysql_fetch_assoc($select_content);
						?>
                        	<tr bgcolor="<?php echo $bgcolor; ?>">
    <td><a href="notes.php?id=<?php echo $row_select_content['id']; ?>"><?php echo $row_select_content['title'] ?></a></td>
                			
                            <td><a href="delete_content.php?title=<?php echo $row_select_content['title'] ?>">Delete</a></td>
                            
            				</tr>
                        <?php
				}
			}
		?>
            

            
            </table>
            
  <!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>