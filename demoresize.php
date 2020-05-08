<html>
<head>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<blockquote>
<table>
<tr>
<td>Photo
<td><input type="file" name="upload1" value="">
</tr>
</table>
 <input type="submit" name="submit" value="SignUp"/>
</fieldset>
 </form>
 </body>
</html>
<?php 
function imageResize($imageResourceId,$width,$height) {


    $targetWidth =200;
    $targetHeight =200;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}

?>