<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);
  session_start();
  if (isset($_SESSION['username']))
    header("Location:main.php");
  else if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
    header("Location:main.php");
  }
    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>login.php</title>
    <script src='login.js'></script>
  </head>
  <section>
    <form action="login.php" method="post" id="loginForm">
      Username<input type="text" name="username">
      Password<input type="password" name="password">
      <button type="button" name='loginButton' onclick=login()>Login</button>
    </form>
  </section>
  <section>
    <p id="error"></p>
  </section>
  <section>
    Don't have an account? <a href='register.php'>Register here!</a>
  </section>
</html>