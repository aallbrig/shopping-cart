<?php
session_start();

// Debug
// if(isset($_SESSION['user'])) echo("User sesh: " . $_SESSION['user']);
// else echo("Username is not set /n");
// if(isset($_SESSION['pass'])) echo("Pass sesh: " . $_SESSION['pass']);
// else echo("Username is not set /n");

//Check session to see if user can see
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
  $user = $_SESSION['user'];
  $pass = $_SESSION['pass'];
}
else
{
  $_SESSION['redirectMsg'] = "Redirected you to sign-in form";
  //header("Location: index.php");
  print("something went wrong");
}

/*Check if user clicked logout.  When scaling up,
**consider moving this into a function... logout.php?
**functions.php?logout ?  Anyways, it's fine for now.
*/
if(isset($_POST['logout']))
{
  unset($_SESSION['user']);
  unset($_SESSION['pass']);
  session_destroy();
  header("Location: index.php");
}
?>

<!-- Template -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kickstarted bootstrap project</title>
  <!-- bootstap 3 snippet -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
  <!-- end bootstrap 3 snippet -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container" style="">
    <nav></nav>
    <div class="jumbotron">
      <h2>Look at those goodies!</h2>
    </div>
    <div class="row">
      <div class="col-12">
        <form action="" method="post">
          <h4>Logout</h4>
          <button type="submit" name="logout" class="btn btn-default btn-lg btn-block">Logout</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>