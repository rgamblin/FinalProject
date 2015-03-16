<?php
  session_start()
  $dbhost = 'oniddb.cws.oregonstate.edu';
  $dbname = 'gamblinr-db';
  $dbuser = 'gamblinr-db';
  $dbpass = 'A2q1yggF4h459bU9';
  $username = 'Rodger';
  $message = 'Double Testing';
  
  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  if (!($stmt = $mysqli->prepare("INSERT INTO Posts (username, message) VALUES (?, ?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
  
  if (!$stmt->bind_param("ss", $username, $message/*$_SESSION["username"], $_POST["message"]*/)) {
       echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
   }
  
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    
  echo "success";
  }
  
  ?>