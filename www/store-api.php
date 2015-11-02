<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $req = file_get_contents('php://input');
  $handler = fopen('/var/log/orders.log', 'a');
  fwrite($handler, $req . "\n");
  fclose($handler);
  echo("{'status': 'success'}");
?>
