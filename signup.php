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
<body style="font-family:Verdana;">
  <div class="main">
<?php
include("database_connection.php");
error_reporting(0);
?>
<?php
session_start();

	$query="SELECT * FROM login";
 
	 $data=mysqli_query($conn,$query);
	$tMP=mysqli_num_rows($data);
 $tMP=$tMP+1;
 $t=0;
?>

<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<blockquote>
<table>
<tr>
<td>Full Name
<td><input type="text" name="name" value="" />
</tr>
<tr>
<tr>
<td>
User ID (User ID contains only lellers and digits)
<td>
<input type="text" name="uname" value=""/>
<td>
</tr>
<tr>
<td>
Password
<td>
<input type="password" name="paw" value=""/>
<td>
</tr>
<tr>
<td>
Confirm Password
<td>
<input type="password" name="cpaw" value=""/>
</tr>
<tr>
<td>
Mobile No. 
<td>
<input type="text" name="mobileno" value=""/>
</tr>
<tr>
<td>Photo
<td><input type="file" name="upload1" value="">
	
</tr>
</table>
 <input type="submit" name="submit" value="SignUp"/>
</fieldset>
 </form>
 <a href="logout.php">Logout</a>
   <?php
 if($_POST['submit'])
	 {	 	 	 	 //***************** Upload Stundent's Photo
$_FILES["upload1"];
$filename1=$_FILES["upload1"]["name"];//copy file location
$tmpname1=$_FILES["upload1"]["tmp_name"];//address of a file
$folder1="user/".$filename1;// upload location
//**************Upload Scaned copy of Admission form
	$un=$_POST['uname'];
	$unam=$_POST['name'];
	$pw=$_POST['paw'];
	$cpw=$_POST['cpaw'];
	$mobileno=$_POST['mobileno'];
			if($pw!=$cpw)
		{
			echo "Incorrect Password";
		}
		else
		{
    if($un!="" && $pw!="" && $cpw!=""&&$mobileno!=""&&strcmp($folder1,"user/")>0&&$pw==$cpw&&ctype_alnum($un))
	{
 
	//***************** Upload Stundent's Photo 
	 if(is_array($_FILES)) {


$folder1="";

        $file = $_FILES['upload1']['tmp_name']; 
        $sourceProperties = getimagesize($file);
      $fileNewName = time();
        $folderPath = "user/";
		
        $ext = pathinfo($_FILES['upload1']['name'], PATHINFO_EXTENSION);
		$folder1=$folderPath.$fileNewName.".".$ext ;
        $imageType = $sourceProperties[2];

        switch ($imageType) {


            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName.".". $ext);
                break;


            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$folderPath. $fileNewName.".". $ext);
                break;


            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName.".". $ext);
                break;


            default:
                echo "Invalid Image type.";
                exit;
                break;
        }


        
    }



	 
	 

		$un=strtolower($un);

		
		 if(ctype_alnum($un))
		{
	$query="SELECT * FROM login";		
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
 
  if($total>=1)
 {
	 while($result= mysqli_fetch_assoc($data))		 
	 	 {
		if(strcmp($result['username'],$un)==0)
		{
			$t=1;
 }}}
		
		if($t==0)
		{			
		if($pw!=$cpw)
		{
			echo "Incorrect Password";
		}
		else
		{

		$inque="insert into login values('$tMP','$un','$unam','$pw','$mobileno','$folder1','','0')";
			$data=mysqli_query($conn,$inque);
			echo "User Name ".$un." is Registerd ";
			
		}
		}
		else{
			echo "The User Name ".$un." already registered. change the User Name";
			$t=0;
		}
		}
		else
		{
			echo "User Name contains only lellers and digits";
		}
	}
	else
	{
		echo "All fileds are required";
	}
	 }
			 if(ctype_alnum($un))
		{}
			else
		{
			echo "User Name contains only lellers and digits";
		}
	
	echo "<a href='index.php'>Login</a>";
	$tMP=0;
	$un="";
	$pw="";
	$cpw="";
	$mobileno="";
	$folder1="";
	$unam="";

}
function imageResize($imageResourceId,$width,$height) {
    $targetWidth =200;
    $targetHeight =200;
    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}
		if($pw!=$cpw)
		{
			echo "Incorrect Password";
		}
?>
</div>

</body>
</html>