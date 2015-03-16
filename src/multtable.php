<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Assignment 5</title>
  </head>
  
  <section>
  <?php
    $checks = 0;
    
    if (!isset($_GET['min-multiplicand'])) {
        echo 'Missing parameter min-multiplicand<br>';
    } else if (!is_integer($_GET['min-multiplicand'] + 0)) {
        echo 'min-multiplicand must be an integer<br>';
    } else
        $checks++;
   
    if (!isset($_GET['max-multiplicand'])) {
        echo 'Missing parameter max-multiplicand<br>';
    } else if (!is_integer($_GET['max-multiplicand'] + 0)) {
        echo 'max-multiplicand must be an integer<br>';
    } else
        $checks++;
    
    if (!isset($_GET['min-multiplier'])) {
        echo 'Missing parameter min-multiplier<br>';
    } else if (!is_integer($_GET['min-multiplier'] + 0)) {
        echo 'min-multiplier must be an integer<br>';
    } else
        $checks++;
    
    if (!isset($_GET['max-multiplier'])) {
        echo 'Missing parameter max-multiplier<br>';
    } else if (!is_integer($_GET['max-multiplier'] + 0)) {
        echo 'max-multiplier must be an integer<br>';
    } else
        $checks++;
        
    if (isset($_GET['min-multiplicand'], $_GET['max-multiplicand']) && is_integer($_GET['min-multiplicand'] + 0) && is_integer($_GET['max-multiplicand'] + 0) && $_GET['min-multiplicand'] > $_GET['max-multiplicand']) {
      echo 'Minimun multiplicand larger than maximum<br>';
    }
    else
      $checks++;
      
    if (isset($_GET['min-multiplier'], $_GET['max-multiplier']) && is_integer($_GET['min-multiplier'] + 0) && is_integer($_GET['max-multiplier'] + 0) && $_GET['min-multiplier'] > $_GET['max-multiplier']) {
      echo 'Minimun multiplier larger than maximum<br>';
    }
    else
      $checks++;
    
    if ($checks == 6)
      {
        echo '<table border=1> <thead> <tr> <th>';
        
        for($i = 0; $i <= $_GET['max-multiplier'] - $_GET['min-multiplier']; $i++) {
          $sum = $_GET['min-multiplier'] + $i;
          echo "<th> $sum"; 
        }
        
        for($i = 0; $i <= $_GET['max-multiplicand'] - $_GET['min-multiplicand']; $i++) {
          $sum = $_GET['min-multiplicand'] + $i;
          echo "<tr> <td> $sum";
          
          for($j = 0; $j <= $_GET['max-multiplier'] - $_GET['min-multiplier']; $j++) {
            $product = $sum * ($_GET['min-multiplier'] + $j);
            echo "<td> $product";
          }
        }
      }
    
      
  ?>
  </section>
</html>  