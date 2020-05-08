<?php
include("database_connection.php");
$tmp=0;
?><!DOCTYPE html>
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
<body style="font-family:Verdana;">
  <div class="main">
<meta http-equiv="refresh" content="5">
<?php
$fol="file/";
session_start();
$username=$_SESSION['username'];
$fromname=$_SESSION['fromname'];
$user_id=$_SESSION['user_id'];
$query="SELECT *FROM message order by time desc";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

  if($total>0)
 {

	 while($result= mysqli_fetch_assoc($data))		 
	 	 {
		if($result['sender']==$username &&$fromname==$result['touser'] )
		{
		if($result['msg']!="")
		{
		echo"<b> <p align='left'> To ".$result['tname']."  [".$result['time']."]</b> </p><br>";
        echo$result['msg']."<br>";
		 }
				if(strcmp($result['file'],$fol)>0)
		{

		echo"<b> <p align='left'> To ".$result['tname']."  [".$result['time']."] </p></b> <br>";
        echo" <a href='$result[file]' target='_blanck'> <img src='$result[file]'height='20' width='20'/> </a>";
		 }

		}
	
		if($result['touser']==$username &&$fromname==$result['sender'] )
		 
		 {
		if($result['msg']!="")
		{
		echo"<b> <p align='right'> From ".$result['sname']."  [".$result['time']."]</b> </p> <br>";
        echo"<p align='right'> ".$result['msg']."</p> <br>";
		 }
	
		 if(strcmp($result['file'],$fol)>0)
		{
		
		echo"<b> <p align='right'> From ".$result['sname']."  [".$result['time']."]</b> </p> <br>";
        echo" <p align='right'><a href='$result[file]' target='_blanck'> <img src='$result[file]'height='40' width='40'/> </a></p>";
		 } 
		 }		 
		 
		 
		 
		 }
	
	 }


	 ?>
	 </div>
	 </body>
	 </html>