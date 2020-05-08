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

if(isset($_POST['login']))
{

	 $username = strtolower($_POST['username']);
	$query="SELECT * FROM login WHERE username = '$username'";
 
	 $data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
 
  if($total==1)
 {

	 while($result= mysqli_fetch_assoc($data))		 
	 	 {
		$result['username'];

      if($_POST['password']== $result['password'] && $username==$result['username'])
      {
		$_SESSION['user_id'] = $result['user_id'];
        $_SESSION['username'] = $username;
        $query= "
        INSERT INTO login_details 
        (user_id) 
        VALUES (''".$result['user_id']."'')";
 $data=mysqli_query($conn,$query);
 
 		$inque="update login set status='1' where username='$username'";	
			$data=mysqli_query($conn,$inque);
        header("location:desk.php");
      }
      else
      {
       echo"<label>Wrong Password</label>";
      }
     }
 }
 else
 {
	  echo"<label>Wrong ID</label>";
 }
}
 ?>

<body style="font-family:Verdana;">

<div style="background-color:#f1f1f1;padding:15px;">
  <h1>Online Chat</h1>
  <h3>Chakradharpur</h3>
</div>

  <div class="main">
  <body bgcolor="#ffccff">
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>LOGIN</legend>
<table>
<td>User ID
<td><input type="text" name="username" value="" />
</tr>
<tr>
<td>password
<td><input type="password" name="password" value="" />
</tr>
</table>
</fieldset>
<input type="Submit" name="login" value="Login"/>
For New User <a href='signup.php'>SignUp</a>

</div>



</body>

</body>
</html>