<?php 
//Server Logic
// $_POST['username'] = 'Pirate';
// $_POST['password'] = 'Apple';
session_start();
global $flash;

//Don't forget 'lil bobby tables.
function sanitizeString($var)
{
  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripslashes($var);
  return $var;
}

//Check the submitted form data... If redirected, output that to user.
if(isset($_POST['username']) && isset($_POST['password']))
{
  $user = sanitizeString($_POST['username']);
  $pass = sanitizeString($_POST['password']);
  echo("user: $user pass: $pass"); //Debug

  if($user == "" || $pass == "")
  {
    $flash = '<div class="alert alert-danger flash"><p>You didn\'t enter anything in!</p></div>';
  }
  elseif($user == "Pirate" && $pass == "Apple")
  {
    $flash = "<div class='alert alert-success'><p>Success!</p></div>";
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['pass'] = $_POST['password'];
    header('Location: shopping-cart.php');
  }
  else 
  {
    $flash = '<div class="alert alert-danger flash"><p>Wrong username or password</p></div>';
  }
}
elseif(isset($_SESSION['redirectMsg']))
{
  $flash = '<div class="alert alert-danger flash"><p>You\'ve been redirected to this page...!</p></div>';
  unset($_SESSION['redirectMsg']);
}
else
{
  $flash = '<div class="alert alert-info flash"><p>Please enter in your username & password</p></div>';
}

?>

<!-- Template -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shopping Cart</title>
  <!-- bootstap 3 snippet -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <!-- end bootstrap 3 snippet -->
</head>
<body>
  <div class="container" style="">
    <nav></nav>
    <div class="jumbotron">
      <h1>Shopping Cart login</h1>
      <p>awww snap</p>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <!-- for some reason col-4 offset-4 doesn't work... this is my work around -->
      </div>
      <div class="col-sm-6">
        <?php print($flash); ?>
        <form action="" method="post" role="form">
          <fieldset>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="The username is Pirate" name="username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" placeholder="The password is Apple" name="password">
            </div>
            <br>
            <button type="submit" class="btn btn-default btn-lg btn-block">Submit</button>
          </fieldset>
        </form>
      </div>
      <div class="col-8">
        <p></p>
      </div>
      <div class="col-4">
        <p></p>
      </div>
    </div>
  </div>
</body>
</html>