<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
img{border-radius:50%;}
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
<meta http-equiv="refresh" content="15">
<a href="logout.php">Louout</a><br>
  <div class="main">
<?php

include("database_connection.php");

session_start();
$username = $_SESSION['username'];
$_SESSION['fromname']=$_GET['toname'];
//status
	$query="SELECT * FROM login WHERE username = '$username'";
 	 $data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
   if($total==1)
 {
	 while($result= mysqli_fetch_assoc($data))		 
	 	 {
	$status=$result['status'];
 }}
echo$url= $_GET['live'];

//status block end

$toname= $_GET['toname'];

//to recever name
echo "<img src='".$_GET['photo']."' alt='Avatar' style='width:100px' />";
echo $name= $_GET['name'];
			 if($status==1)
			 {
			echo "<td><img src='green.jpg'alt='Avatar' style='width:10px'/> </tr>";	 
			 }
		 else
		 {
		echo " <td><img src='gray.jpg'alt='Avatar' style='width:10px'/> </tr>"; 
		 }
	$sname= $_GET['sname'];
	echo"<br>";
if(isset($_POST["send"]))
{


	 $msg=$_POST['msg'];
	 	 //***************** Upload Stundent's Photo
$_FILES["upload1"];
$filename1=$_FILES["upload1"]["name"];//copy file location
$tmpname1=$_FILES["upload1"]["tmp_name"];//address of a file
$folder1="file/".$filename1;// upload location
//**************Upload Scaned copy of Admission form
	 $date=date("Y-m-d h:i:sa");
	 if($msg!="")
	 {
$query="insert into message values('$toname','$name','$username','$sname','$msg','','$date')";
mysqli_query($conn,$query);
	 }
	 if(strcmp($folder1,$fol)>0)
	 {
move_uploaded_file($tmpname1,$folder1);
$query="insert into message values('$toname','$name','$username','$sname','','$folder1','$date')";
mysqli_query($conn,$query);
	 }


}
$toname="";
$name="";
$username="";
$sname="";
$msg="";
$date="";
$folder1="";
 ?>
 <html>
<head>
<style>
div{
	width:400;
	height:70;
}
</style>
</head>

<body bgcolor="#ffccff">


  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

  <!-- Your embedded video player code -->
  <div class="fb-video" data-href="<?php echo $url;?>" data-width="500" data-show-text="false">
    <div class="fb-xfbml-parse-ignore">
      <blockquote cite="<?php echo $url;?>">
        <a href="<?php echo $url;?>">How to Share With Just Friends</a>
        <p>How to share with just friends.</p>
        Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> </blockquote>

<iframe src="displaypri.php"width="350" height="180"></iframe>
<div>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Message</legend>
<table>
<tr>
<td>
<textarea rows="2" cols="20"  wrap="hard" name="msg"
type="text" value="" size="30"  style="font-size:8pt;height:100px; width:300px;" >
</textarea>
</tr>
<tr>
<td>Attach File
</tr>
<tr>
<td><input type="file" name="upload1" value="">
	
</tr>
</table>
</fieldset>
<input type="Submit" name="send" value="Send"/>
</div>
</div>
</body>
</html>