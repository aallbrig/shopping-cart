<?php

if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
  $user = $_SESSION['user'];
  $pass = $_SESSION['pass'];
  echo "Your username is $user and your password is $pass";
}
else
{
  $_SESSION['redirectMsg'] = "Redirected you to sign-in form";
  //header("Location: index.php");
  print("something went wrong");
}
?>