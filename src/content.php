<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);
  session_start();
  if ((!isset($_POST['username'])) && (!isset($_SESSION['username']))) 
    header("Location:login.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>login.php</title>
  </head>
<?php
  if (($_POST['username'] == '') || is_null($_POST['username'])) {
    echo "A username must be entered. Click <a href=login.php>here</a> to return to the login screen.";
  } else {
      $username = $_POST['username'];
      $_SESSION['username'] = $username;
      if(!isset($_SESSION['visits']))
        $_SESSION['visits'] = 0;
      $_SESSION['visits']++;
      
      $visits = $_SESSION['visits'];
      
      echo "Hello $username, you have visited the page $visits times. Click <a href=logout.php>here</a> to logout";
    }
?>
</html>