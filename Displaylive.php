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
//status
	$query="SELECT * FROM login WHERE username = '$username'";
 	 $data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
   if($total==1)
 {
	 while($result= mysqli_fetch_assoc($data))		 
	 	 {
	$url=$result['live'];
 }}

?>

<body style="font-family:Verdana;">
  <div class="main">
  <a href="logout.php">Louout</a><br>
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
		
    </div>
  </div>

</body>
</html>