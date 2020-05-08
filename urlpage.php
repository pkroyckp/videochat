<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}
.menu {
  float: left;
  width: 20%;
}
.menuitem {
  padding: 8px;
  margin-top: 7px;
  border-bottom: 1px solid #f1f1f1;
}
.main {
  float: left;
  width: 60%;
  padding: 0 20px;
  overflow: hidden;
}
.right {
  background-color: lightblue;
  float: left;
  width: 20%;
  padding: 10px 15px;
  margin-top: 7px;
}

@media only screen and (max-width:800px) {
  /* For tablets: */
  .main {
    width: 80%;
    padding: 0;
  }
  .right {
    width: 100%;
  }
}
@media only screen and (max-width:500px) {
  /* For mobile phones: */
  .menu, .main, .right {
    width: 100%;
  }
}
</style>
</head>
<?php

include("database_connection.php");

session_start();

echo $username = $_SESSION['username'];
?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Live URL</legend>
<table>
<tr>
<td>URL//<td><input type="text" name="url" value="" />
<td><input type="Submit" name="golive" value="Save"/>
</tr>
</table>
</fieldset>


<?php
	if(isset($_POST['golive']))
{
	$url=$_POST['url'];
	$inque="update login set live='$url' where username='$username'";	
$data=mysqli_query($conn,$inque);
   header("location:Displaylive.php");
}	
		

?>