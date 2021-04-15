<?php
$user = 'yacine';
$pass = "password";

try
{
  $db = new PDO('mysql:host=localhost;dbname=FINDGO' , $user , $pass ,array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
}
catch(Exception $db)
{
  die('Erreur : '.$bd->getMessage());
}
$reponse = $db->query('SELECT * FROM business');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Login</title>
  </head>
  <body>
    <div class="login-page">
      <div class="login-info">
        <div class="logo">
          <a href="#"><img src="img/Logo2.svg" alt="Logo" width="150px"></a>
        </div>
        <div class="login-info-title">
          <h1>Welcome Back!</h1>
        </div>
        <div class="login-info-content">
          <h3>Sign Up and discover a great amount of new opportunities !</h3>
          <a href="#" class="btn">Sign In</a>
        </div>
      </div>
      <div class="login-form">
        <img src="img/wrong.svg" alt="" height="30px" width="30px" id="close_page">
        <div class="login-form-title">
          <h1>Login To Your Account</h1>
        </div>
        <div class="social-media">
          <img src="img/facebook.svg" alt="" width="40px" height="40px">
          <img src="img/gmail.svg" alt="" width="40px" height="40px">
          <img src="img/linkedin.svg" alt="" width="40px" height="40px">
        </div>
        <div class="login-form-form">
          <form action="index.html" method="post" class="form">
            <div class="input-field">
              <i><img src="img/profile.svg" alt="" width="25px" height="25px"></i>
              <input type="text" name="username" placeholder="Username">
            </div>
            <div class="input-field">
              <i><img src="img/password.svg" alt="" width="25px" height="25px"></i>
              <input type="password" name="password" placeholder="Password">
            </div>
            <a href="#">Forget Password?</a>
            <input type="submit" name="" value="Login" >
          </form>
        </div>
      </div>
    </div>
  </body>
</html>