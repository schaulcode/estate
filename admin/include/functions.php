<?php
include 'db.php';

function checkQuery($result){
  global $connection;
  if (!$result) {
    die("Query Failed". mysqli_error($connection));
  }
}


 ?>
