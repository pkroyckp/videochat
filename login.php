<!--
//login.php
!-->

<?php

include("database_connection.php");

session_start();

$message = '';



if(isset($_POST["login"]))
{

	 echo $username = $_POST['username'];
	 echo$query="SELECT * FROM login WHERE username = '$username'";
 
	 $data=mysqli_query($conn,$query);
	echo $total=mysqli_num_rows($data);

 }
  echo" <br>";
  if($total==1)
 {

	 while($result= mysqli_fetch_assoc($data))		 
	 	 {
			 	 echo$result['password'];
        echo$result['username'];

      if($_POST['password']== $result['password'] && $_POST['username']==$result['username'])
      {
        echo$_SESSION['user_id'] = $result['user_id'];
        echo$_SESSION['username'] = $result['username'];
        
			 echo$query= "
        INSERT INTO login_details 
        (user_id) 
        VALUES (''".$result['user_id']."'')
        ";
 $data=mysqli_query($conn,$query);



        $_SESSION['login_details_id'] = $result['username'];
        header("location:index.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
     }
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
 }



?>

<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
    </head>  
    <body>  

   




     <form method="post">
       <label>Enter Username</label>
       <input type="text" name="username" value=""  />

       <label>Enter Password</label>
       <input type="password" name="password" value=""  />

       <input type="submit" name="login" class="btn btn-info" value="Login" />

     </form>

    </body>  
</html>