<?php
ob_start();//Turn on output buffering
session_start();

$timezone = date_default_timezone_set("Europe/London");
$con = mysqli_connect('localhost', 'root', '12345', 'social');//Connection variable

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_error();
}


?>