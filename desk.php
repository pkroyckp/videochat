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
  <div class="main">
  <a href="logout.php">Louout</a>
  <br>
<?php

include("database_connection.php");
session_start();
$username = strtolower($_SESSION['username']);
$query="SELECT * FROM login";		
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
 
  if($total>=1)
 {
	 while($result= mysqli_fetch_assoc($data))		 
	 	 {
			
			 if(strcmp($result['username'],$username)==0)
			 {
		echo" <a href='changephoto.php'> <img src='$result[photo]' alt='Avatar' style='width:100px' /> </a>";
echo "<b> <a href='update.php'> ".$sname=$result['name']."</a>";

	 if($result['status']==1)
			 {
			echo "<img src='green.jpg'alt='Avatar' style='width:10px'/> ";	 
			 }
		 else
		 {
		echo " <img src='gray.jpg'alt='Avatar' style='width:10px'/> "; 
		 }	 

echo "<a href='urlpage.php?toname=$result[username]'><button type='submit'>Live</button></a> ";
echo" </b> <br>";	
	}
			 
		
 }}
 	 
?>

<iframe src="display.php"width="350" height="180"></iframe>


<?php
$url="";



			 			
 	$query="SELECT * FROM login";		
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
 
  if($total>=1)
 {
	 echo"<table>";
	 while($result= mysqli_fetch_assoc($data))		 
	 	 {
			 if(strcmp($result['username'],$username)!=0)
			 {
				
				 	 
		echo" <tr> <td> <img src='$result[photo]'alt='Avatar' style='width:100px'/> ";	 
	echo "<td>".$result['name']."<td> <a href='msg.php?toname=$result[username]&live=$result[live]&name=$result[name]&sname=$sname&photo=$result[photo]'><button type='submit'>Send MSG</button></a> ";
			 
			 if($result['status']==1)
			 {
			echo "<td><img src='green.jpg'alt='Avatar' style='width:10px'/> ";	 
			 }
		 else
		 {
		echo " <td><img src='gray.jpg'alt='Avatar' style='width:10px'/>"; 
		 }
	// echo "<td> <a href='golive.php?toname=$result[username]&live=$result[live]&name=$result[name]&sname=$sname&photo=$result[photo]'><button type='submit'>Live</button></a> </tr>";
			 echo "<td> <a href='$result[live]'><button type='submit'>Live</button></a> </tr>";
			 }
 }}
 echo"</table>";

?>
</div>

</body>
</html>