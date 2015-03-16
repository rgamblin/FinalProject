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
    if (!($stmt = $mysqli->prepare("SELECT username, password FROM UserAccounts WHERE username=?"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    
    if (!$stmt->bind_param("s", $_POST["username"])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    $result = $stmt->get_result()->fetch_assoc();
    if ($result['username'] != $_POST['username']) {
      echo "doesntExist";
    } 
    else if ($result['password'] != $_POST['password'])
      echo "wrongPassword";
    else 
      echo "success";