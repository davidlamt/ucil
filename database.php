<?php

// Connecting to the MySQL database
$connection = mysqli_connect("localhost", "root", "", "ucil");

// Terminating code execution if connection fails
if (!$connection) {
    die();
}

?>