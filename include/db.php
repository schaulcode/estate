<?php
$connection = mysqli_connect("localhost","root","","estate");
if(!$connection){
    die("connection failed" . mysqli_error($connection));
}