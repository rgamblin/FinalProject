<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>register.php</title>
    <script src='register.js'></script>
  </head>
  <section>
    <form action="content.php" method="post">
      Username<input type="text" name="username">
      Password<input type="password" name="password">
      <button type="button" onclick=registerNewUser()>Register</button>
    </form>
  </section>
  <section>
    <p id="error"></p>
  </section>
  <section>
  <br> Already Registered? Head on over to our <a href="login.php">login page</a>
  </section>
</html>