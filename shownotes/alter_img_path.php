<?php
  $file = $argv[1];
  $data = file_get_contents($file);
  $code = substr($file, 0, strpos($file, "."));
  $data = str_replace("<img src=\"figure/", "<img src=\"figure_" . $code . "/", $data);
  $f = fopen($file, 'w');
  fwrite($f, $data);
  fclose($f);
?>
