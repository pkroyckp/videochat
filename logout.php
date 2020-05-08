<?php

//logout.php
include("database_connection.php");
session_start();
$username = strtolower($_SESSION['username']);
$inque="update login set status='0' where username='$username'";	
$data=mysqli_query($conn,$inque);
session_destroy();

header('location:index.php');

?>