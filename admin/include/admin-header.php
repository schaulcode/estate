<?php ob_start();?>
<?php session_start() ?>
<?php include("include/db.php");?>
<?php include 'include/functions.php';; ?>

<?php
    if(!isLoggedIn()){
      redirect("/Activity/index");
    }else {
      isVerified();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width">
    <title>Admin</title>
</head>
<body>
