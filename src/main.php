<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);
  session_start();
  if (!isset($_SESSION['username']))
    header("Location:login.php");
    
  $dbhost = 'oniddb.cws.oregonstate.edu';
    $dbname = 'gamblinr-db';
    $dbuser = 'gamblinr-db';
    $dbpass = 'A2q1yggF4h459bU9';
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($mysqli->connect_errno) {
          echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    if (!($stmt = $mysqli->prepare("SELECT username, message, date FROM Posts ORDER BY id"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
   
    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    
   
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Twitter+1!</title>
    <script src='main.js'></script>
  </head>
  <section>
  <?php
   $result = $stmt->get_result();
   while($row = $result->fetch_assoc()) {
    $message = $row['message'];
    $username = $row['username'];
    $date = $row['date'];
      echo "<br><div class = \"message\">$username $message $date<div>";
    }
   ?>
  </section>
  <section>Would you like to post? 
  <form method='post' action='main.php'id="messageForm">
  <input type='text' name='message'>
  <button type="button" onclick=newMessage()>Post</button>
  </section>
  <section>
    <p id="error"></p>
  </section>
  <section>
	<br><p>Click <a href="logout.php">here</a> to logout</p>
  </section>
</html>