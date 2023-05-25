<?php
/*
    Variables
*/

  $password = "Insert a password";
  $combinationsPerSecond = 1000;

  $combinations = 0;

  if (preg_match('/[a-z]/', $password)) {
      $combinations += 26;
  }

  if (preg_match('/[A-Z]/', $password)) {
      $combinations += 26;
  }

  if (preg_match('/[0-9]/', $password)) {
      $combinations += 10;
  }

  if (preg_match('/[\W]/', $password)) {
      $combinations += 32;
  }

  if (preg_match('/[\x{1F600}-\x{1F64F}]/u', $password)) {
      $combinations += 3664;
  }

  $total_combinations = bcpow($combinations, strlen($password));
  $cracking_time = bcdiv($total_combinations, $combinationsPerSecond);

  echo 'Estimated time to crack the password: '.$cracking_time.' seconds';
?>
