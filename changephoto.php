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
$username = $_SESSION['username'];
 	$query="SELECT * FROM login where username='$username'";		
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
 
  if($total==1)
 {
	 while($result= mysqli_fetch_assoc($data))		 
	 	 {

			$photo=$result['photo'];
		 }
 }

?>
<body style="font-family:Verdana;">
<a href="desk.php">Back</a>
<div style="background-color:#f1f1f1;padding:15px;">
  <h1>Online Chat</h1>
  <h3>Chakradharpur</h3>
</div>

  <div class="main">
<img src="<?php echo $photo;?>" height="60" width="60" />


<form action="" method="post" enctype="multipart/form-data">


<fieldset>
<legend>Profile</legend>
<table>
<tr>
<td>Change Profile Photo
<td><input type="file" name="upload1" value="" />
<td><input type="Submit" name="submit" value="Update"/>
</tr>
</TABLE>

</fieldset>
</form>

 

 <?php
if(isset($_POST["submit"]))
	 {	 	 	 	 //***************** Upload Stundent's Photo
//**************Upload Scaned copy of Admission form

	//***************** Upload Stundent's Photo 
	 if(is_array($_FILES)) {


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
               echo imagepng($targetLayer,$folderPath. $fileNewName.".". $ext);
                break;


            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
               echo imagegif($targetLayer,$folderPath. $fileNewName.".". $ext);
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

       		$inque="update login set photo='$folder1' where username='$username'";	
			$data=mysqli_query($conn,$inque); 
			 header("location:changephoto.php");
    }

		
		
		
		

function imageResize($imageResourceId,$width,$height) {
    $targetWidth =200;
    $targetHeight =200;
    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);

     return $targetLayer;
}

 
 ?>
  </div>
 </body>
 </html>
