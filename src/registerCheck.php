<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);
  header('Content-Type: text/plain');
  
  $dbhost = 'oniddb.cws.oregonstate.edu';
  $dbname = 'gamblinr-db';
  $dbuser = 'gamblinr-db';
  $dbpass = 'A2q1yggF4h459bU9';
  
  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  
   if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }
   if (!($stmt = $mysqli->prepare("SELECT id FROM UserAccounts WHERE username=?"))) {
     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
   }
   
   if (!$stmt->bind_param("s", $_POST["username"])) {
       echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
   }
   
   if (!$stmt->execute()) {
     echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
   }
   
   if($stmt->num_rows > 0) {
     echo "nameTaken";
     $stmt->close();
   }
   else
   {
    $stmt->close();
    
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    if (!($stmt = $mysqli->prepare("INSERT INTO UserAccounts(username, password) VALUES (?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
  
    if (!$stmt->bind_param("ss", $_POST["username"], $_POST["password"])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    if (!$stmt->execute()) {
      echo "nameTaken";
    }
    else 
      echo "success";
      
    $stmt->close();
   }