<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);
  header('Content-Type: text/plain');

  $returnString = '';
  
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $returnString .= "{\"Type\":\"GET\",\"parameters\":";
    
    if (empty($_GET))
      $returnString .= "null}";
    else {
      $returnString .= "{";
      foreach ($_GET as $key => $value)
        $returnString .= "\"$key\":\"$value\",";
        $returnString = trim($returnString, ',');
        $returnString .= '}}';
    }
    
    echo $returnString;
    
      
  }
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $returnString .= "{\"Type\":\"POST\",\"parameters\":";
    
    if (empty($_POST))
      $returnString .= "null}";
    else {
      $returnString .= "{";
      foreach ($_POST as $key => $value)
        $returnString .= "\"$key\":\"$value\",";
        
        $returnString = trim($returnString, ',');
        $returnString .= '}}';
    }
    
    echo $returnString;
    
      
  }