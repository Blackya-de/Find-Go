<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/signup.css">
    <title>Sign Up</title>
  </head>
  <body>
    <div class="signup-page">
      <div class="signup-form">
        <a href="search.php"><img src="img/wrong.svg" alt="" width="30px" height="30px" id="close_page"></a>
        <div class="login-form-title">
          <h1>Create Your Account</h1>
          <p><?php
<<<<<<< HEAD
            if (isset($_GET['error'])) {
=======
            if (isset($_GET)) {
>>>>>>> b7534ddd8c06487c95a4ae996a8ab3df2525fb71
              echo $_GET['error'];
            }?></p>
        </div>
        <div class="social-media">
          <img src="img/facebook.svg" alt="" width="40px" height="40px">
          <img src="img/gmail.svg" alt="" width="40px" height="40px">
          <img src="img/linkedin.svg" alt="" width="40px" height="40px">
        </div>
        <div class="login-form-form">
          <form action="signup.php" method="post" class="form">
            <div class="input-content-field">
              <div class="input-field">
                <input type="text" name="username" placeholder="Username">
              </div>
              <div class="input-field">
                <input type="text" name="email" placeholder="Email">
              </div>
            </div>
            <div class="input-content-field">
              <div class="input-field">
                <input type="password" name="password" placeholder="Password">
              </div>
              <div class="input-field">
                <input type="password" name="confirm-password" placeholder="Repeat password">
              </div>
            </div>
            <a href="#">Forget Password?</a>
            <input type="submit" name="" value="Login" >
          </form>
        </div>
      </div>
      <div class="signup-info">
        <div class="logo">
          <a href="#"><img src="img/Logo2.svg" alt="Logo" width="150px"></a>
        </div>
        <div class="signup-info-title">
          <h1>One Of Us?</h1>
        </div>
        <div class="signup-info-content">
          <h3>If you already have an account, just sign in. We've missed you!</h3>
          <a href="#" class="btn">Log In</a>
        </div>
      </div>
    </div>
  </body>
</html>
